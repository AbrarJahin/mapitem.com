<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PublicController extends Controller
{
    //A controller to show public pages
    /*
    	URL				-> get: /dashboard
    	Functionality	-> Show Dashboard Page
    	Access			-> Anyone who is logged in user
    	Created At		-> 22/03/2016
    	Updated At		-> 22/03/2016
    	Created by		-> S. M. Abrar Jahin
    */
    public function index()
    {
    	return view('public.index.main');
    }
}
