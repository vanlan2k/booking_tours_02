<?php
function getStatus($data){
    $input = $data == 1 ? "badge-success" : "badge-danger";
    return '<span class="badge '.$input.'">'.\App\Models\Booking::$status[$data].'</span>';
}
function getPayment($data){
    $input = $data == 0 ? "badge-success" : "badge-danger";
    return '<span class="badge '.$input.'">'.\App\Models\Booking::$payment[$data].'</span>';
}
function getDateBooking($data){
    return \Carbon\Carbon::parse($data)->format('d/m/Y');
}

