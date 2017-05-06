<?php

namespace App\Traits;

use App\Friendship;

trait Friendable
{
	// @todo: thinking of adding one function called friends_with()
	// to get all friends with that user or maybe i have added that functionallity.
	/**
	 * add friend function
	 * this create the link between friends
	 * @param [type] $reciever_id [description]
	 */
	public function add_friend($reciever_id)
	{
		//
		if ($this->id === $reciever_id) {
			return 0;
		}

		//
		if ($this->has_pending_request_sent_to($reciever_id) === 1) {
			return 'Already sent a friend request to user and its pending.';
		}

		//
		if ($this->has_pending_request_from($reciever_id) === 1) {
			return $this->accept_friend($reciever_id);
		}

		//
		if ($this->is_friends_with($reciever_id)) {
			return 'You are already friends.';
		}

		$friendship = Friendship::add_sent_request($this->id, $reciever_id);

		if ($friendship) {
			return 1;
		}

		return 0;
	}

	/**
	 * [accept_friend description]
	 * @param  [type] $sender_id [description]
	 * @return [type]            [description]
	 */
	public function accept_friend($sender_id)
	{
		// if ($this->has_pending_request_from($requester_id)) {
		// 	return 0;
		// }

		$friendship = Friendship::get_request_recieved($sender_id, $this->id);
		if ($friendship) {
			$friendship->update([
					'status' => 1
				]);

			return 1;
		}

		return 0;
	}

	/**
	 * [friends description]
	 * @return [type] [description]
	 */
	public function friends()
	{
		$friends = array();

		$f1 = Friendship::where('status', 1)
						->where('requester', $this->id)
						->get();

		foreach ($f1 as $friendship):
			array_push($friends, \App\User::find($friendship->user_requested));
		endforeach;


		$friends2 = array();

		$f2 = Friendship::where('status', 1)
						->where('user_requested', $this->id)
						->get();

		foreach ($f2 as $friendship):
			array_push($friends2, \App\User::find($friendship->requester));
		endforeach;

		return array_merge($friends, $friends2);

	}

	/**
	 * [pending_friend_request description]
	 * @return [type] [description]
	 */
	public function pending_friend_request()
	{
		$users = array();

		$friendships = Friendship::where('status', 0)
								->where('user_requested', $this->id)
								->get();

		foreach ($friendships as $friendship):
			array_push($users, \App\User::find($friendship->requester));
		endforeach;

		return $users;
	}

	/**
	 * [friends_ids description]
	 * @return [type] [description]
	 */
	public function friends_ids()
	{
		return collect($this->friends())->pluck('id')->toArray();
	}

	/**
	 * [is_friends_with description]
	 * @param  [type]  $user_id [description]
	 * @return boolean          [description]
	 */
	public function is_friends_with($user_id)
	{
		if (in_array($user_id, $this->friends_ids())) {
			return 1;
		}

		return 0;
	}

	/**
	 * [pending_friend_request_ids description]
	 * @return [type] [description]
	 */
	public function pending_friend_request_ids()
	{
		return collect($this->pending_friend_request())->pluck('id')->toArray();
	}

	/**
	 * [has_pending_request_from description]
	 * @param  [type]  $requester_id [description]
	 * @return boolean               [description]
	 */
	public function has_pending_request_from($requester_id)
	{
		if (in_array($requester_id, $this->pending_friend_request_ids())) {
			return 1;
		}

		return 0;
	}

	/**
	 * [pending_friend_request_sent description]
	 * @return [type] [description]
	 */
	public function pending_friend_request_sent()
	{
		$users = array();

		$friendships = Friendship::where('status', 0)
								->where('requester', $this->id)
								->get();

		foreach ($friendships as $friendship):
			array_push($users, \App\User::find($friendship->user_requested));
		endforeach;

		return $users;
	}

	/**
	 * [pending_friend_request_sent_ids description]
	 * @return [type] [description]
	 */
	public function pending_friend_request_sent_ids()
	{
		return collect($this->pending_friend_request_sent())->pluck('id')->toArray();
	}

	/**
	 * [has_pending_request_sent_to description]
	 * @param  [type]  $user_requested_id [description]
	 * @return boolean                    [description]
	 */
	public function has_pending_request_sent_to($user_requested_id)
	{
		if (in_array($user_requested_id, $this->pending_friend_request_sent_ids())) {
			return 1;
		}

		return 0;
	}
}