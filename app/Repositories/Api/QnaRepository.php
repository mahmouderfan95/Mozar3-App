<?php

namespace App\Repositories\Api;

use App\Models\Qna;
use Illuminate\Http\Request;
use App\Repositories\Api\BaseRepository;


class QnaRepository extends BaseRepository
{
    /**
     * Configure Repository the Model
     *
     * @return string
     */
    public function model() : string
    {
        return Qna::class;
    }

    public function newQuery()
    {
        return Qna::query(); // Replace Qna with your actual model class
    }
}
