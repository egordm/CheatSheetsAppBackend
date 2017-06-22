<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 14:51
 */

namespace App\Models\Transformers;


use App\Models\Cheat;
use App\Models\Serializers\ContentDataSerializer;
use League\Fractal\TransformerAbstract;

class CheatTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
    ];

    public function transform(Cheat $cheat)
    {
        $ret =  [
            'description' => $cheat->description,
            'layout' => $cheat->layout,
            'usage' => $cheat->usage,
            'source' => $cheat->source,
            'cheat_contents' => ContentDataSerializer::serialize($cheat->cheat_contents),
            'tags' => ContentDataSerializer::serialize($cheat->tags)
        ];

        return $ret;
    }
}