<?php


namespace Src\Application\UseCase;


use Illuminate\Http\JsonResponse;
use Src\Application\Repository\ProductRepositoryInterface;

class GetAllProductsUseCase
{
    public function __construct(private ProductRepositoryInterface $productRepository){}

    public function execute(): JsonResponse
    {
        return $this->productRepository->all();
    }
}
