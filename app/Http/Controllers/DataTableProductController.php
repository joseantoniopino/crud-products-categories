<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Application\Repository\Eloquent\ProductRepository;
use Src\Application\UseCase\GetAllProductsUseCase;

class DataTableProductController extends Controller
{

    public function __construct(protected ProductRepository $repository){}

    public function __invoke(): JsonResponse
    {
        return (new GetAllProductsUseCase($this->repository))->execute();
    }
}
