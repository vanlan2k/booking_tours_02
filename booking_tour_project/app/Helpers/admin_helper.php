<?php
function getNotFound($data){
    if (!$data){
        return abort(404);
    }
}
