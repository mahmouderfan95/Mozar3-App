<?php
namespace App\Http\Controllers\Api;

use App\Enums\CategoryLevels;
use App\Http\Resources\Api\CategoryResources\CategoryHomeResource;
use Illuminate\Http\JsonResponse;
use App\Services\Api\CategoryService;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\Api\ServiceCategoryHomeResource;
use App\Http\Resources\Api\CategoryWithProductsResource;
use App\Http\Resources\Api\FaqCategoryResource;
use App\Services\Api\FaqCategoryService;
use App\Services\Api\ServiceCategoryService;

class FaqCategoryController extends ApiController
{
    public function __construct(public FaqCategoryService $service) {}

    public function index()
    {
        $categories = $this->service->allCategories();
        return $this->setApiResponse(true, 200,FaqCategoryResource::collection($categories), __("api.categories-return-success"));
    }

    public function show($category_id) : JsonResponse
    {
        $category = $this->service->getCategoryUsingID(intval($category_id));
        if(!$category){
            return $this->setApiResponse(true,200,[], __("api.categories-return-success"));
        }
        return $this->setApiResponse(true, 200, new FaqCategoryResource($category), __('api.category-return-success'));
    }

}
