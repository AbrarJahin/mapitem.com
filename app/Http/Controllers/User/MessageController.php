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
							//DB::raw("CONCAT('he_sends_me') AS sender_type"),	//he_sends_me / me_send_him
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
							DB::raw("DATE_FORMAT(messages.created_at,'%m/%d/%Y %H:%i') AS sent_time")
							/*,DB::raw(
										"CASE
											WHEN DATE(messages.created_at) = DATE(NOW()) THEN DATE_FORMAT(messages.created_at, '%r')
											ELSE DATE_FORMAT(messages.created_at, '%b %D, %Y - %r')
										END as sent_time"
									)*/
						)
				->where('messages.thread_id', $requestData['thread_id'])
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

		//Update Message Thread
		$messageThread->title = substr($requestData['message'],0,18)." ..";
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