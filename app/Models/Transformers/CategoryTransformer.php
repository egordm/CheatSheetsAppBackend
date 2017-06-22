<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 14:20
 */

namespace App\Models\Transformers;


use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'cheat_sheets'
    ];

    public function transform(Category $category)
    {
        return [
            'title' => $category->title,
            'description' => $category->description
        ];
    }

    public function includeCheatSheets(Category $category)
    {
        return $this->collection($category->cheat_sheets, new CheatSheetTransformer());
    }
}