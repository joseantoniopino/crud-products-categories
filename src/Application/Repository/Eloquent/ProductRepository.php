<?php


namespace Src\Application\Repository\Eloquent;



use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Src\Application\Repository\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected Model $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}
