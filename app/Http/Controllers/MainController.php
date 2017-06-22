<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 12:20
 */

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Serializers\FractalDataSerializer;
use App\Models\Transformers\CategoryTransformer;
use Illuminate\Http\Request;
use JsonMapper;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Mockery\Exception;

class MainController extends Controller
{
    public function index(Request $request)
    {
        //echo 'Hello world';

        /*        $model = Category::with('cheatSheets')->get();
                return $model[0]->test();*/
        //return json_encode($model->relations);


        //return json_decode($request->getContent(), true);

        ini_set('max_execution_time', 0);

        $content_my = $request->getContent();

        $mapper = new JsonMapper();
        $mapper->bIgnoreVisibility = true;
        $contact = $mapper->mapArray(json_decode($content_my), [], Category::class);

        \DB::beginTransaction();
        try {
            foreach ($contact as $con) {
                $con->push();
            }
        } catch (Exception $e) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }


        //return json_encode($contact);


        $resource = new Collection($contact, new CategoryTransformer());
        //dd($resource);

        $manager = new Manager();
        $manager->setSerializer(new FractalDataSerializer());
        return $manager->createData($resource)->toArray();
    }
}