<?php

use \App\Enums\NotifyEnum;

function exportNotify($item)
{
    if ($item['type_notify'] == NotifyEnum::CreateBooking) {
        $href = '/admin/booking/'.$item['id_item'];
        $title = __('notification.new_booking');
        $description = __('notification.booked');
    }
    if ($item['type_notify'] == NotifyEnum::CreateUser) {
        $href = '/admin/user/'.$item['id_item'];
        $title = __('notification.new_user');
        $description = __('notification.registered');
    }
    return '<a href="' . $href . '"><div class="pl-2 pt-2"><div class="media-body"><strong class="notification-title">' . $title . '</strong><div class="notification-meta">' . $description . '</div></div></div></a><hr>';
}
