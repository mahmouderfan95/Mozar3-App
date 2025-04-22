<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqCategories\Store;
use App\Services\Admin\FaqCategoriesService;
use App\Services\Admin\PostHarvestDepartmentServices;

class FaqCategoriesController extends Controller
{
    public function __construct(public FaqCategoriesService $FaqCategoriesService){}
    public function index()
    {
        return $this->FaqCategoriesService->index();
    }
    public function create()
    {
        return $this->FaqCategoriesService->create();
    }
    public function store(Store $request)
    {
        return $this->FaqCategoriesService->store($request->validated());
    }
    public function edit($id)
    {
        return $this->FaqCategoriesService->edit($id);
    }
    public function show($id)
    {
        return $this->FaqCategoriesService->show($id);
    }
    public function update(Store $request,$id)
    {
        return $this->FaqCategoriesService->update($request,$id);
    }
    public function destroy($id)
    {
        return $this->FaqCategoriesService->destroy($id);
    }
}
