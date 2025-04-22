<?php

namespace App\Repositories\Api;

use App\Models\Category;
use App\Models\FaqCategory;
use App\Models\PostHarvestServicesDepartment;
use Illuminate\Http\Request;
use App\Repositories\Api\BaseRepository;


class FaqCategoryRepository extends BaseRepository
{
    /**
     * Configure Repository the Model
     *
     * @return string
     */
    public function model() : string
    {
        return FaqCategory::class;
    }
}
