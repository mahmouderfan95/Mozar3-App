<?php

namespace App\Services\Api;


use App\Models\FaqCategory;
use App\Repositories\Api\FaqCategoryRepository;

class FaqCategoryService
{
    public function __construct(public FaqCategoryRepository $repository) {}


    public function allCategories()
    {
        return FaqCategory::active()->orderBy('created_at','asc')->get();
    }

    public function getCategoryUsingID(int $id) : FaqCategory | null
    {
        return $this->repository->getModelUsingID($id);
    }

}
