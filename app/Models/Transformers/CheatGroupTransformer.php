<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 14:48
 */

namespace App\Models\Transformers;


use App\Models\CheatGroup;
use App\Models\Serializers\ContentDataSerializer;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

class CheatGroupTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'cheats'
    ];

    public function transform(CheatGroup $cheatGroup)
    {
        return [
            'title' => $cheatGroup->title,
            'description' => $cheatGroup->description,
            'tags' => ContentDataSerializer::serialize($cheatGroup->tags),
            'notes' => ContentDataSerializer::serialize($cheatGroup->notes),
        ];
    }

    public function includeCheats(CheatGroup $cheatGroup)
    {
        return $this->collection($cheatGroup->cheats, new CheatTransformer());
    }
}