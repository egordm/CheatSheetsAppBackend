<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 12:20
 */

namespace App\Http\Controllers;


use App\Models\Category;

class MainController extends Controller
{
    public function index() {
        //echo 'Hello world';
        return Category::all();
    }
}