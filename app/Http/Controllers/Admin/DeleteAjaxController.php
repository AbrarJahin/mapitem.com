<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use DB;

/*
	Functionality	-> Handel All Admin Works
	Access			-> Only Admin
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class DeleteAjaxController extends Controller
{
	/*
        URL             -> post: /category_delete
        Functionality   -> Category Delete AJAX
        Access          -> Admin
        Created At      -> 06/08/2016
        Updated At      -> 06/08/2016
        Created by      -> S. M. Abrar Jahin
    */
    public function categoryDeleteAjax()
    {
        $requestData = Request::all();
        return DB::table('categories')
                    ->where('id', '=', $requestData['id'])
                    ->delete();
    }

    /*
        URL             -> post: /sub_category_delete
        Functionality   -> Category Delete AJAX
        Access          -> Admin
        Created At      -> 06/08/2016
        Updated At      -> 06/08/2016
        Created by      -> S. M. Abrar Jahin
    */
    public function subCategoryDeleteAjax()
    {
        $requestData = Request::all();
        return DB::table('sub_categories')
                    ->where('id', '=', $requestData['id'])
                    ->delete();
    }

    /*
        URL             -> post: /user_delete
        Functionality   -> User Delete AJAX
        Access          -> Admin
        Created At      -> 08/08/2016
        Updated At      -> 08/08/2016
        Created by      -> S. M. Abrar Jahin
    */
    public function userDeleteAjax()
    {
        $requestData = Request::all();
        return DB::table('users')
                    ->where('id', '=', $requestData['id'])
                    ->delete();
    }
}
