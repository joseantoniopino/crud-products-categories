<?php


namespace Src\Application\Repository\Eloquent;



use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Src\Application\Repository\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected Model $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}
