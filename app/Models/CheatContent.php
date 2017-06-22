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
 * App\Models\CheatContent
 *
 * @property int $id
 * @property int $cheat_id
 * @property string $content
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatContent whereCheatId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatContent whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatContent whereId($value)
 * @mixin \Illuminate\Database\Eloquent\
 */
class CheatContent extends BaseModel
{
    public $timestamps = false;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $cheat_id
     */
    public function setCheatId($cheat_id)
    {
        $this->cheat_id = $cheat_id;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}