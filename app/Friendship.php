<?php

namespace App;

use App\Model;

class Friendship extends Model
{
    //
    public static function add_sent_request($sender_id, $reciever_id)
    {
    	return static::create([
				'requester' => $sender_id,
				'user_requested'	=> $reciever_id,
				'status'			=> 0
			]);
    }

    //
    public static function get_request_recieved($sender_id, $reciever_id)
    {
    	return static::where('requester', $sender_id)
                     ->where('user_requested', $reciever_id)
                     ->first();
    }
}
