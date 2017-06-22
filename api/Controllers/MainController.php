<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 16:54
 */

namespace API\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CheatSheet;
use App\Models\Serializers\FractalDataSerializer;
use Illuminate\Http\JsonResponse;
use League\Fractal\Manager;

class MainController extends Controller
{

    public function index()
    {
        $raw_data = Category::with('cheat_sheets', 'cheat_sheets.tags')->get();
        $data = Category::transformArray($raw_data);
        return JsonResponse::create($this->getManager()->createData($data)->toArray());
    }

    /**
     * @param string|array|null $include
     * @return Manager
     */
    private function getManager($include = null)
    {
        $manager = new Manager();
        $manager->setSerializer(new FractalDataSerializer());
        if ($include != null) $manager->parseIncludes($include);
        return $manager;
    }

    public function cheatsheet($id)
    {
        $raw_data = CheatSheet::with('tags', 'cheat_groups', 'cheat_groups.tags', 'cheat_groups.notes',
            'cheat_groups.cheats', 'cheat_groups.cheats.cheat_contents', 'cheat_groups.tags')->find($id);
        if (empty($raw_data)) return JsonResponse::create(['message' => 'Cheat sheet not found!'], 404);
        $data = CheatSheet::transform($raw_data);
        return JsonResponse::create($this->getManager('cheat_groups')->createData($data)->toArray());
    }


}