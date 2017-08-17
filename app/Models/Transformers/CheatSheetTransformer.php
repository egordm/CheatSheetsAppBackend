<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 14:20
 */

namespace App\Models\Transformers;


use App\Models\Category;
use App\Models\CheatSheet;
use App\Models\Serializers\ContentDataSerializer;
use League\Fractal\TransformerAbstract;

class CheatSheetTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'cheat_groups'
    ];

    public function transform(CheatSheet $cheatSheet)
    {
        return [
            'id' => $cheatSheet->id,
            'type' => $cheatSheet->ctype,
            'title' => $cheatSheet->title,
            'subtitle' => $cheatSheet->subtitle,
            'description' => $cheatSheet->description,
            'tags' => ContentDataSerializer::serialize($cheatSheet->tags)
        ];
    }

    public function includeCheatGroups(CheatSheet $cheatSheet)
    {
        return $this->collection($cheatSheet->cheat_groups, new CheatGroupTransformer());
    }
}