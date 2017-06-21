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
 * App\Models\Cheat
 *
 * @property int $id
 * @property int $cheat_group_id
 * @property string $description
 * @property bool $layout
 * @property string $usage
 * @property string $source
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereCheatGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereLayout($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereSource($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cheat whereUsage($value)
 * @mixin \Illuminate\Database\Eloquent\
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CheatContent[] $cheatContents
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Note[] $notes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 */
class Cheat extends Model
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function cheatContents()
    {
        return $this->hasMany(CheatContent::class);
    }

    public function notes()
    {
        return $this->belongsToMany(Note::class);
    }

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
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param bool $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param string $usage
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
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
     * @param CheatContent[] $cheatContents
     */
    public function setCheatContents($cheatContents)
    {
        $this->cheatContents = $cheatContents;
    }

    /**
     * @param Note[] $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @param Tag[] $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }


}