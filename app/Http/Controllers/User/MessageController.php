<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Request;

/*
	Functionality	-> Handel All Auth Works
	Access			-> No restriction applied in the class, applied from route if needed
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class MessageController extends Controller
{
	/*
		URL				-> post: /create_message_thread
		Functionality	-> Crete or update new Messae Thread - From AJAX
		Access			-> Anyone who is logged in user
		Created At		-> 13/07/2016
		Updated At		-> 13/07/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function createThread()
	{
		return $requestData = Request::all();
	}
}