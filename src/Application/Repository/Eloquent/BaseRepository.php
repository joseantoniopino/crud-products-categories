<?php


namespace Src\Application\Repository\Eloquent;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Src\Application\Repository\EloquentRepositoryInterface;

class BaseRepository implements EloquentRepositoryInterface
{

    public function __construct(protected Model $model){}

    /**
     * @inheritDoc
     */
    public function all(array $columns = ['*'], array $relations = []): JsonResponse
    {
        return datatables()
            ->eloquent($this->model::query()->orderBy('updated_at', 'desc'))
            ->addColumn('btn', 'partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    /**
     * @inheritDoc
     */
    public function findById(string $modelId, array $columns = ['*'], array $relations = [], array $appends = []): ?Model
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }

    /**
     * @inheritDoc
     */
    public function create(array $payload): ?Model
    {
        $model = $this->model->create($payload);

        return $model->fresh();
    }

    /**
     * @inheritDoc
     */
    public function update(string $modelId, array $payload): bool
    {
        $model = $this->findById($modelId);

        return $model->update($payload);
    }

    /**
     * @inheritDoc
     */
    public function deleteById(string $modelId): bool
    {
        return $this->findById($modelId)->delete();
    }
}
