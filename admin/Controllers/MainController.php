<?php

namespace Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BaseModel;
use App\Models\Category;
use App\Models\CheatGroup;
use App\Models\CheatSheet;
use App\Models\Serializers\FractalDataSerializer;
use App\Models\Transformers\CategoryTransformer;
use App\Models\Transformers\CheatSheetTransformer;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JsonMapper;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 19:25
 */
class MainController extends Controller
{
    public function index()
    {
        return 'Hello world!';
    }

    public function massAdd(Request $request)
    {
        ini_set('max_execution_time', 0);

        /*** @var $categories Category[] */
        $categories = $this->jsonToModels($request->getContent(), Category::class);


        if($this->tryPush($categories))
            return JsonResponse::create(['success'=>false]);

        return JsonResponse::create(['success'=>true]);
    }

    public function addCheatSheet(Request $request, $cat_id)
    {
        ini_set('max_execution_time', 0);

        /*** @var $cheatsheet CheatSheet */
        $cheatsheet = $this->jsonToModel($request->getContent(), new CheatSheet());
        $cheatsheet->category_id = $cat_id;

        if($this->tryPush($cheatsheet))
            return JsonResponse::create(['success'=>false]);

        return JsonResponse::create(['success'=>true]);
    }

    public function addGroup(Request $request, $cheatsheet_id)
    {
        ini_set('max_execution_time', 0);

        /*** @var $cheat_group CheatGroup */
        $cheat_group = $this->jsonToModel($request->getContent(), new CheatGroup());
        $cheat_group->cheat_sheet_id = $cheatsheet_id;

        if($this->tryPush($cheat_group))
            return JsonResponse::create(['success'=>false]);

        return JsonResponse::create(['success'=>true]);
    }

    /**
     * @param $models BaseModel|BaseModel[]
     * @return Exception|null
     */
    private function tryPush($models) {
        $ret = null;
        \DB::beginTransaction();
        try {
            if(!is_array($models)) $models = [$models];
            foreach ($models as $model) {
                $model->push();
            }
        } catch (Exception $e) {
            \DB::rollback();
            $ret = $e;
        } finally {
            \DB::commit();
        }
        return $ret;
    }

    private function jsonToModels($raw_data, $class) {
        return $this->getMapper()->mapArray(json_decode($raw_data), [], $class);
    }

    private function jsonToModel($raw_data, $class_instance) {
        return $this->getMapper()->map(json_decode($raw_data), $class_instance);
    }

    private function getMapper() {
        $mapper = new JsonMapper();
        $mapper->bIgnoreVisibility = true;
        return $mapper;
    }
}