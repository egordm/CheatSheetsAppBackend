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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CheatGroup[] $cheatGroups
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 */
class CheatSheet extends Model
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function cheatGroups()
    {
        return $this->hasMany(CheatGroup::class);
    }
}