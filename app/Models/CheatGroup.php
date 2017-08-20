<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 13:04
 */
namespace App\Models;

use Admin\Models\BaseModel;


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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Note[] $notes
 * @property-read \App\Models\CheatSheet $cheat_sheet
 */
class CheatGroup extends BaseModel
{
    public $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function cheats()
    {
        return $this->hasMany(Cheat::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function cheat_sheet()
    {
        return $this->belongsTo(CheatSheet::class);
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
        $this->exists = true;
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
     * @param string|null $description
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
     * @param Note[] $notes
     */
    public function setNotes($notes)
    {
        if (empty($this->relations['notes'])) $this->relations['notes'] = [];
        $this->relations['notes'] = array_merge($this->relations['notes'], $notes);
    }

    /**
     * @param Cheat[] $cheats
     */
    public function setCheats($cheats)
    {
        if (empty($this->relations['cheats'])) $this->relations['cheats'] = [];
        $this->relations['cheats'] = array_merge($this->relations['cheats'], $cheats);
    }

    /**
     * @param Tag[] $tags
     */
    public function setTags($tags)
    {
        if (empty($this->relations['tags'])) $this->relations['tags'] = [];
        $this->relations['tags'] = array_merge($this->relations['tags'], $tags);
    }
}