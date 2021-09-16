<?php
function getPrice($data){
    return '₫'.number_format($data, 0, ',', '.');
}
function getPriceAdmin($data){
    return number_format($data, 0, ',', '.');
}
