<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Src\Application\Repository\Eloquent\ProductRepository;

class ProductController extends Controller
{
    private Collection $categories;

    public function __construct(protected ProductRepository $repository)
    {
        $this->categories = Category::pluck('name', 'id');
    }


    public function index(): View
    {
        return view('products.index');
    }


    public function create(): View
    {
        return \view('products.create')->with([
            'categories' => $this->categories,
            'product' => new Product()
        ]);
    }


    public function store(SaveProductRequest $request): RedirectResponse
    {

        $fields = $request->validated();

        $product = new Product($fields);
        $product->image = $request->file('image')->store('/', 'products');
        $this->repository->create($product->toArray());

        return redirect()->route('products.show', $product->id)->with('status', 'Product created!');
    }


    public function show(Product $product): View
    {
        return \view('products.show')->with('product', $product);
    }


    public function edit(Product $product): View
    {
        return \view('products.edit')->with([
            'product' => $product,
            'categories' => $this->categories
        ]);
    }


    public function update(SaveProductRequest $request, Product $product): RedirectResponse
    {
        $imagePath = public_path() . '/images/products/' . $product->image;
        $product->fill($request->validated());

        if ($request->hasFile('image')){
            File::delete($imagePath);
            $product->image = $request->file('image')->store('/', 'products');
        }

        $this->repository->update($product->id, $product->toArray());


        return redirect()->route('products.show', $product->id)->with('status', 'Product updated!');

    }


    public function destroy(Request $request): JsonResponse
    {
        $id = $request->id;

        $data = [
            'success' => false,
            'message' => "The product with id $id dot not exist",
            'status' => 500
        ];

        if ($product = $this->repository->findById($id)){
            $imagePath = public_path() . '/images/products/' . $product->image;
            $product->delete();
            File::delete($imagePath);
            $data = [
                'success' => true,
                'message' => "Product has been removed",
                'status' => 200
            ];
        }


        return response()->json($data, $data['status']);
    }
}
