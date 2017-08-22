<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 16:54
 */

namespace API\Controllers;


use API\Helpers\AppHelper;
use API\Repositories\CategoryRepository;
use API\Requests\ApiRequest;
use App\Constants;
use App\Http\Controllers\Controller;
use App\Models\CheatSheet;
use App\Models\PDF;
use App\Models\Serializers\FractalDataSerializer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainController extends Controller
{
    private $repository;

    /**
     * MainController constructor.
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index(ApiRequest $request)
    {
        $retrieve_data = function () use ($request) {
            $data = $this->repository->getCategories($request->getVersion(), $request->getBeta());
            return $this->getManager()->createData($data)->toArray();
        };

        if (!$request->getBeta()) {
            $ret = \Cache::remember($request->getCacheKey(Constants::CACHE_KEY_CATEGORIES), 20000, function () use ($retrieve_data) {
                return $retrieve_data();
            });
        } else {
            $ret = $retrieve_data();
        }

        return JsonResponse::create($ret);
    }


    public function cheatsheet(ApiRequest $request, $id)
    {
        $retrieve_data = function () use ($request, $id) {
            $data = $this->repository->getCheatSheet($id);
            if ($data == null) return $data;
            return $this->getManager('cheat_groups')->createData($data)->toArray();
        };

        if (!$request->getBeta()) {
            $ret = \Cache::remember(Constants::CACHE_KEY_PREFIX_CHEATSHEET . $id, 40000, function () use ($retrieve_data) {
                return $retrieve_data();
            });
        } else {
            $ret = $retrieve_data();
        }

        if(empty($ret)) return JsonResponse::create(['message' => 'Cheat sheet not found!'], 404);
        return JsonResponse::create($ret);
    }

    public function pdf($id)
    {
        $pdf = $this->repository->getPDF($id);
        if ($pdf == null) throw new NotFoundHttpException();
        return redirect($pdf->url);
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