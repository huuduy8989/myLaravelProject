<?php

namespace App\Http\Service\Category;

use App\Http\Respositories\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Session;

class CategoryService
{
    protected CategoryRepositoryInterface $categoryRepository;

    /**
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show($id)
    {
        return $this->categoryRepository->find($id);
    }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function create($request)
    {
        try {
            $this->categoryRepository->insert($request->all());
            Session::flash('success', 'Your new category have created');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
    }

    public function destroy($id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function update($request, $categoryId)
    {
        return $this->categoryRepository->update($request->all(), $categoryId);
    }
}
