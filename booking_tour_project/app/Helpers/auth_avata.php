<?php
function getAvata(){
    return Auth::user()->avata != null ? Auth::user()->avata : asset('dist/img/icon_person.jpg');
}
