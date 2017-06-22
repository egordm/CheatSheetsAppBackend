<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 13:04
 */

namespace App\Models;


/**
 * App\Models\Note
 *
 * @property int $id
 * @property int $cheat_group_id
 * @property string $content
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereCheatGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereId($value)
 * @mixin \Illuminate\Database\Eloquent\
 */
class Note extends BaseModel
{
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $cheat_group_id
     */
    public function setCheatGroupId($cheat_group_id)
    {
        $this->cheat_group_id = $cheat_group_id;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}