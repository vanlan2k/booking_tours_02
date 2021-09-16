<?php
function getPrice($data){
    return '₫'.number_format($data, 0, ',', '.');
}
