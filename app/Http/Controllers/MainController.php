<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 12:20
 */

namespace App\Http\Controllers;


use App\Models\Category;
use JsonMapper;

class MainController extends Controller
{
    const TEST_DATA = '[{"id":1,"title":"Hello world","description":"Desc","created_at":"2017-06-21 22:04:15","updated_at":"2017-06-21 22:04:17","cheat_sheets":[{"id":1,"category_id":1,"title":"Hello","subtitle":"World","description":"Hee","created_at":"2017-06-21 22:18:46","updated_at":"2017-06-21 22:18:47","tags":[{"id":1,"content":"Hello","pivot":{"cheat_sheet_id":1,"tag_id":1}}]}]}]';

    public function index() {
        //echo 'Hello world';

        $mapper = new JsonMapper();
        $mapper->bIgnoreVisibility = true;
        $contact = $mapper->map(json_decode(self::TEST_DATA)[0], new Category());

/*        $mapper = new JsonMapper();
        $contactsArray = $mapper->mapArray(
            json_decode(self::TEST_DATA), array(), Category::class
        );*/

        //$cat = Category::with('cheatSheets', 'cheatSheets.tags')->get();
        return json_encode($contact);
    }
}