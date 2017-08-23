<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 22-8-2017
 * Time: 10:40
 */

namespace API\Repositories;


use App\Helpers\AppHelper;
use App\Models\Category;
use App\Models\CheatSheet;
use App\Models\PDF;

class CategoryRepository
{


    public function getCategories($version = AppHelper::DEFAULT_VERSION, $beta = false)
    {
        $sql = Category::with(['cheat_sheets' => function ($query) use ($beta, $version) {
            $query = $query->orderBy('title', 'asc');
            $query = $this->applyBeta($query, $beta);
            if ($version <= AppHelper::VERSION_1) {
                $query = $query->where('ctype', CheatSheet::TYPE_NATIVE);
            }
            return $query;
        }, 'cheat_sheets.tags']);
        $data = $this->applyBeta($sql, $beta)->get();
        $data = $data->filter(function ($value) {
            return !empty($value->cheat_sheets) && count($value->cheat_sheets) > 0;
        })->all();

        return Category::transformArray($data);
    }

    public function getCheatSheet($id)
    {
        $data = CheatSheet::with('tags', 'cheat_groups', 'cheat_groups.tags', 'cheat_groups.notes',
            'cheat_groups.cheats', 'cheat_groups.cheats.cheat_contents', 'cheat_groups.tags')->find($id);
        if (empty($data)) return null;
        return CheatSheet::transform($data);
    }

    public function getPDF($id)
    {
        return PDF::whereCheatSheetId($id)->first();
    }

    private function applyBeta($sql, $beta = false)
    {
        if(empty($beta)) {
            \Log::debug('Applying beta' . empty($beta));
            $sql = $sql->where(['beta' => false]);
        }
        return $sql;
    }
}