<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 16:54
 */

namespace API\Controllers;


use App\Constants;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CheatSheet;
use App\Models\Serializers\FractalDataSerializer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;

class MainController extends Controller
{

    public function index()
    {
        $beta = Input::get('beta', false);
        if(!$beta) {
            $ret = \Cache::remember(Constants::CACHE_KEY_CATEGORIES, 20000, function () {
                $raw_data = Category::with(['cheat_sheets' => function ($query) {
                    $query->where(['beta' => false]);
                }, 'cheat_sheets.tags'])->get();
                $data = Category::transformArray($raw_data);
                return $this->getManager()->createData($data)->toArray();
            });
        } else {
            $ret = \Cache::remember(Constants::CACHE_KEY_CATEGORIES, 20000, function () {
                $raw_data = Category::with(['cheat_sheets', 'cheat_sheets.tags'])->get();
                $data = Category::transformArray($raw_data);
                return $this->getManager()->createData($data)->toArray();
            });
        }
        return JsonResponse::create($ret);
    }


    public function cheatsheet($id)
    {
        $ret = \Cache::remember(Constants::CACHE_KEY_PREFIX_CHEATSHEET.$id, 40000, function () use ($id) {
            $raw_data = CheatSheet::with('tags', 'cheat_groups', 'cheat_groups.tags', 'cheat_groups.notes',
                'cheat_groups.cheats', 'cheat_groups.cheats.cheat_contents', 'cheat_groups.tags')->find($id);
            //TODO: dont cache the 404 page :S
            if (empty($raw_data)) return JsonResponse::create(['message' => 'Cheat sheet not found!'], 404);
            $data = CheatSheet::transform($raw_data);
            return $this->getManager('cheat_groups')->createData($data)->toArray();
        });
        return JsonResponse::create($ret);
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
}