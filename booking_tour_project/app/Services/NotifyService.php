<?php

namespace App\Services;

use App\Models\Notification;
use Pusher\Pusher;

class NotifyService
{
    public function notification($data)
    {
        $options = array(
            'cluster' => 'ap3',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $pusher->trigger('Notify', 'send-message', $data);
        $notify = new Notification();
        $notify->type_notify = $data['type_notify'];
        $notify->id_item = $data['id_item'];
        $notify->save();
    }
}
