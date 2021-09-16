<?php
function getAvata(){
    return \Illuminate\Support\Facades\Auth::user()->avata != null ? \Illuminate\Support\Facades\Auth::user()->avata : asset('dist/img/icon_person.jpg');
}
