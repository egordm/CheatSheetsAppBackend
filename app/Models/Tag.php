<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 13:04
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Tag
 *
 * @property int $id
 * @property int $content
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereId($value)
 * @mixin \Illuminate\Database\Eloquent\
 */
class Tag extends Model
{
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}