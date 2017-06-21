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
 * App\Models\CheatGroup
 *
 * @property int $id
 * @property int $cheat_sheet_id
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatGroup whereCheatSheetId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatGroup whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatGroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatGroup whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatGroup whereUpdatedAt($value)
 * @mixin \Illuminate\Database\Eloquent\
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cheat[] $cheats
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 */
class CheatGroup extends Model
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function cheats()
    {
        return $this->hasMany(Cheat::class);
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $cheat_sheet_id
     */
    public function setCheatSheetId($cheat_sheet_id)
    {
        $this->cheat_sheet_id = $cheat_sheet_id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param \Carbon\Carbon $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @param \Carbon\Carbon $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @param Cheat[] $cheats
     */
    public function setCheats($cheats)
    {
        $this->cheats = $cheats;
    }

    /**
     * @param Tag[] $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }
}