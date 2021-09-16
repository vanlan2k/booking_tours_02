<?php
function getBTNSB()
{
    if (Auth::user() != null) {
        return '<button class="btn btn-danger" >'.__('single.submit').'</button >';
    } else {
        return '<a href = "/login" class="btn btn-danger" >'.__('single.submit').'</a >';
    }
}

