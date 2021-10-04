<?php
function getUser(){
    return in_array(\Request::route()->getName(), ['user.index', 'user.create', 'user.show']) ? 'menu-is-opening menu-open' : "";
}
