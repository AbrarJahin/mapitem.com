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
	Access			-> Only user can access this class
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

		if($requestData['add_owner_id']==Auth::user()->id)
			return Response::json("You can't send message to yourself !", 403);

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
																'title'				=>	substr($requestData['message'], 0, 100),
																'last_sender_id'	=>	Auth::user()->id,
																'is_read'			=>	'not_readed'
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

		//Get the data
		$messagesToReturn =  DB::table('messages')
								->join('users', 'users.id', '=', 'messages.sender_id')
								->select(
											DB::raw(
														"CASE
															WHEN messages.sender_id = ".Auth::user()->id." THEN 'me_send_him'
															ELSE 'he_sends_me'
														END as sender_type"
													),
											DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS sender_name"),
											DB::raw(
															"CASE
																WHEN LENGTH(users.profile_picture)>0 THEN users.profile_picture
																ELSE '../images/empty-profile.jpg'
															END as user_image"
														),
											'messages.message',
											DB::raw(
														"CASE
															WHEN messages.sender_id <> ".Auth::user()->id." AND messages.is_read = 'not_readed' THEN 'not_readed'
															ELSE 'readed'
														END as is_read"
													),
											DB::raw("DATE_FORMAT(messages.created_at,'%m/%d/%Y %H:%i:%s') AS sent_time")
										)
								->where('messages.thread_id', $requestData['thread_id'])
								->orderBy('messages.created_at', 'asc')
								->get();

		//Thread update so that it is marked as seen
		MessageThread::where('id', $requestData['thread_id'])
					->where('is_read', 'not_readed')
					->where('last_sender_id', '<>', Auth::user()->id)
					->update(['is_read' => 'readed']);

		//Update the data to make marked
		DB::table('messages')
			->where('messages.thread_id', $requestData['thread_id'])
			->where('sender_id','<>', Auth::user()->id)
			->where('is_read','=', 'not_readed')
			->update(array('is_read' => 'readed'));

		return $messagesToReturn;
	}

	public function inboxMessageSend()
	{
		$requestData = Request::all();

		$message	=	Message::create([
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

		//Update Message Thread
		$messageThread->title = substr($requestData['message'],0,18)." ..";
		$messageThread->last_sender_id = Auth::user()->id;
		$messageThread->is_read = 'not_readed';
		//$messageThread->updated_at = $message->created_at;
		$messageThread->save();

		//Add Notification for Message Sending
		$userNotification = UserNotification::firstOrNew([
															'user_id' => $notification_owner_id
														]);
		$userNotification->inbox = $userNotification->inbox+1;
		$userNotification->save();

		return [
					'sent_time'		=>	'Now',
					'sender_image'	=>	(strlen(Auth::user()->profile_picture) > 3 ? Auth::user()->profile_picture : '../images/empty-profile.jpg'),
					'sender_name'	=>	Auth::user()->first_name.' '.Auth::user()->last_name,
					'message'		=>	$requestData['message']
				];
	}
}