<?php
function getBTNSB()
{
    if (Auth::user() != null) {
        return '<button class="btn btn-danger" >'.__('single.submit').'</button >';
    } else {
        return '<a href = "/login" class="btn btn-danger" >'.__('single.submit').'</a >';
    }
}
function forRate(){
    $rate = '';
    for ($i = 1; $i <= 5; $i++){
        $rate .= '<option value="'.$i.'">'.$i.'</option>';
    }
    return $rate;
}
