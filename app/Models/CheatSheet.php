<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 13:04
 */

namespace App\Models;
use Admin\Models\BaseModel;
use App\Models\Transformers\CheatSheetTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


/**
 * App\Models\CheatSheet
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatSheet whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatSheet whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatSheet whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatSheet whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatSheet whereSubtitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatSheet whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CheatSheet whereUpdatedAt($value)
 * @mixin \Illuminate\Database\Eloquent\
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CheatGroup[] $cheat_groups
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property int|null $beta
 * @property int $ctype
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CheatSheet whereBeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CheatSheet whereCtype($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PDF[] $pdf
 */
class CheatSheet extends BaseModel
{
    const TYPE_NATIVE = 0;
    const TYPE_PDF = 1;

    public $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function cheat_groups()
    {
        return $this->hasMany(CheatGroup::class);
    }

    public function pdf() {
        return $this->hasMany(PDF::class);
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
     * @param int $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string|null $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
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
     * @param CheatGroup[] $cheatGroups
     */
    public function setCheatGroups($cheatGroups)
    {
        if(empty($this->relations['cheat_groups'])) $this->relations['cheat_groups'] = [];
        $this->relations['cheat_groups'] = array_merge($this->relations['cheat_groups'], $cheatGroups);
    }

    /**
     * @param Tag[] $tags
     */
    public function setTags($tags)
    {
        if(empty($this->relations['tags'])) $this->relations['tags'] = [];
        $this->relations['tags'] = array_merge($this->relations['tags'], $tags);
    }

    /**
     * @param CheatSheet $data
     * @return \League\Fractal\Resource\Item
     */
    public static function transform($data)
    {
        return new Item($data, new CheatSheetTransformer());
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection|array $data
     * @return \League\Fractal\Resource\Collection
     */
    public static function transformArray($data)
    {
        return new Collection($data, new CheatSheetTransformer());
    }
}