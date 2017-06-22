<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 12:20
 */

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use JsonMapper;

class MainController extends Controller
{
    public function index(Request $request) {
        //echo 'Hello world';

/*        $model = Category::with('cheatSheets')->get();
        return $model[0]->test();*/
        //return json_encode($model->relations);



        //return json_decode($request->getContent(), true);

        $content_my = $request->getContent();

        $mapper = new JsonMapper();
        $mapper->bIgnoreVisibility = true;
        $contact = $mapper->map(json_decode($content_my)[0], new Category());

        $contact->push();
        return json_encode($contact);
    }
}