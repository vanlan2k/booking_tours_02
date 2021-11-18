<?php
namespace App\Services;

use App\Models\Category;
use App\Models\Tour;

class HomeService{
    public  function fullTextSearch($input){
        $tours = Tour::fullTextSearch($input['query']);
        $categories = Category::fullTextSearch($input['query']);
        $output = '<ul class="dropdown-menu ml-4 mr-4 w-100" style="display: block; position: relative">';
        if ($tours->first()) {
            $output .= '<li class="bg-primary">'.__('home.tour').'</li >';
            foreach ($tours as $tour){
                $output .= '<li><a href="/single/'.$tour->id.'">'.$tour->name.'</a></li>';
            }
        }
        if ($categories->first()){
            $output .= '<li class="bg-primary">'.__('home.cate').'</li >';
            foreach ($categories as $category){
                $output .= '<li><a href="/search?category='.$category->id.'" >'.$category->name.'</a></li>';
            }
        }
        $output .= '</ul>';
        return $output;
    }
    public function getDataStatistic(){
        $service = new ChartService();
        $values = $service->exportExcelStatistic();
        for($i = 0; $i < count($values['data']); $i++){
            $x = 0;
            $results[$i][$x++] = $values['date'][$i];
            $results[$i][$x++] = $values['data'][$i];
        }
        $data['results'] = $results;
        $data['revenue'] = Booking::sumRevenueMonth();
        return $data;
    }
}
