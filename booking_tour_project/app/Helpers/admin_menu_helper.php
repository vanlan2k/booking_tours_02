<?php
function getUser(){
    return in_array(\Request::route()->getName(), ['user.index', 'user.create', 'user.show']) ? 'menu-is-opening menu-open' : "";
}
function getTour(){
    return in_array(\Request::route()->getName(), ['tour.index', 'tour.create', 'tour.show']) ? 'menu-is-opening menu-open' : "";
}
function getBooking(){
    return in_array(\Request::route()->getName(), ['booking.index', 'booking.create', 'booking.show']) ? 'menu-is-opening menu-open' : "";
}
function getComment(){
    return in_array(\Request::route()->getName(), ['comment.index', 'comment.create', 'comment.show']) ? 'menu-is-opening menu-open' : "";
}
