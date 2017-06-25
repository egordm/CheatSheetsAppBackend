<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 13:04
 */

namespace App\Models;


/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $content
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereId($value)
 * @mixin \Illuminate\Database\Eloquent\
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cheat[] $cheat
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CheatGroup[] $cheat_group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CheatSheet[] $cheat_sheet
 */
class Tag extends BaseModel
{
    public $timestamps = false;

    public function cheat_sheet()
    {
        return $this->belongsToMany(CheatSheet::class, 'cheat_sheet_tag');
    }

    public function cheat_group()
    {
        return $this->belongsToMany(CheatGroup::class, 'cheat_group_tag');
    }

    public function cheat()
    {
        return $this->belongsToMany(Cheat::class, 'cheat_tag');
    }


    /**
     * @return CheatSheet[]
     */
    public function getCheatSheets() {
        $ret = [];
        if(!empty($this->cheat_sheet)) {
            foreach ($this->cheat_sheet as $cheatSheet) {
                array_push($ret, $cheatSheet);
            }
        }
        if(!empty($this->cheat_group)) {
            foreach ($this->cheat_group as $group) {
                array_push($ret, $group->cheat_sheet);
            }
        }
        if(!empty($this->cheat)) {
            foreach ($this->cheat as $cheat) {
                array_push($ret, $cheat->cheat_sheet);
            }
        }
        return $ret;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}