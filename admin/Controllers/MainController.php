<?php
namespace Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Serializers\FractalDataSerializer;
use App\Models\Transformers\CategoryTransformer;
use Exception;
use Illuminate\Http\Request;
use JsonMapper;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 19:25
 */
class MainController extends Controller
{
    public function index() {
        return 'Hello world!';
    }

    public function massAdd(Request $request) {
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

        $resource = new Collection($contact, new CategoryTransformer());

        $manager = new Manager();
        $manager->setSerializer(new FractalDataSerializer());
        return $manager->createData($resource)->toArray();
    }
}