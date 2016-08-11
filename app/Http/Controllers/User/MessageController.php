<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Request;
use Response;
use Auth;
use App\MessageThread;
use App\Message;
use App\UserNotification;
use DB;

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
		Functionality	-> Crete or update new Messae Thread - From AJAX - Add message to that thread
		Access			-> Anyone who is logged in user
		Created At		-> 13/07/2016
		Updated At		-> 13/07/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function createThread()
	{
		$requestData = Request::all();

		//Add Notification for Message Sending
		$userNotification = UserNotification::firstOrNew([
															'user_id' => $requestData['add_owner_id']
														]);
		$userNotification->inbox = $userNotification->inbox+1;
		$userNotification->save();

		$messageThread = MessageThread::updateOrCreate(
															[
																'sender_id'			=>	Auth::user()->id,
																'receiver_id'		=>	$requestData['add_owner_id'],
																'advertisement_id'	=>	$requestData['add_id']
															],
															[
																'title'				=>	substr($requestData['message'], 0, 100)
															]
														);
		Message::create([
							'sender_id'			=> Auth::user()->id,
							'thread_id'	=> $messageThread->id,
							'message'	=> $requestData['message']
						]);
		return Response::json("Your Message Has Been Sent !", 200);
	}

	public function threadDetail()
	{
		$requestData = Request::all();

		return DB::table('messages')
				->join('users', 'users.id', '=', 'messages.sender_id')
				->select(
							DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS sender_name"),
							'messages.message',
							DB::raw("DATE_FORMAT(messages.created_at,'%D %b %Y, %r') AS sent_time")
						)
				->get();
	}

	public function inboxMessageSend()
	{
		$requestData = Request::all();

		Message::create([
							'sender_id'	=>	Auth::user()->id,
							'thread_id'	=>	$requestData['thread_id'],
							'message'	=>	$requestData['message']
						]);
		$messageThread = MessageThread::find( $requestData['thread_id'] );
		$notification_owner_id = 0;
		if($messageThread->sender_id == Auth::user()->id)
			$notification_owner_id = $messageThread->receiver_id;
		else
			$notification_owner_id = $messageThread->sender_id;

		//Add Notification for Message Sending
		$userNotification = UserNotification::firstOrNew([
															'user_id' => $notification_owner_id
														]);
		$userNotification->inbox = $userNotification->inbox+1;
		$userNotification->save();

		return [
					'sent_time'		=> 'Now',
					'sender_name'	=> Auth::user()->first_name.' '.Auth::user()->last_name,
					'message'		=> $requestData['message']
				];
	}
}