<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Src\Application\Repository\Eloquent\CategoryRepository;

class CategoryController extends Controller
{

    public function __construct(protected CategoryRepository $repository){}

    public function index(): view
    {
        $categories = Category::with('products')->get();
        return view('categories.index')->with('categories', $categories);
    }


    public function create(): View
    {
        return view('categories.create')->with([
            'category' => new Category()
        ]);
    }


    public function store(SaveCategoryRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $category = new Category($fields);
        $this->repository->create($category->toArray());

        return redirect()->route('categories.index')->with('status', 'Category created!');
    }


    public function edit(Category $category): View
    {
        return view('categories.edit')->with([
            'category' => $category,
        ]);
    }


    public function update(SaveCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->fill($request->validated());

        $this->repository->update($category->id, $category->toArray());

        return redirect()->route('categories.index')->with('status', 'Category updated!');
    }


    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.index')->with('status', 'Category deleted!');
    }
}
