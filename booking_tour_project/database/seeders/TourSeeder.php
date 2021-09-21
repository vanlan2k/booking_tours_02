<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $province = ['An Giang', 'Bà rịa – Vũng tàu', 'Bắc Giang', 'Bắc Kạn',
            'Bạc Liêu', 'Bắc Ninh', 'Bến Tre', 'Bình Định', 'Bình Dương', 'Bình Phước',
            'Bình Thuận', 'Cà Mau', 'Cần Thơ', 'Cao Bằng', 'Đà Nẵng', 'Đắk Lắk', 'Đắk Nông',
            'Điện Biên', 'Đồng Nai', 'Đồng Tháp', 'Gia Lai', 'Hà Giang', 'Hà Nam', 'Hà Nội',
            'Hà Tĩnh', 'Hải Dương', 'Hải Phòng', 'Hậu Giang', 'Hòa Bình', 'Hưng Yên', 'Khánh Hòa',
            'Kiên Giang', 'Kon Tum', 'Lai Châu'];
        for ($i = 1; $i <= 30; $i++) {
            DB::table('tours')->insert([
                'cate_id' => rand(1, 6),
                'name' => $faker->name,
                'address' => $province[rand(0,33)],
                'avata' => 'http://localhost:8000/dist/img/tour_list_1.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh...',
                'date_start' => Carbon::now(),
                'date_end' => Carbon::parse('2022-01-01'),
                'rate' => 10
            ]);
            for ($j = 0; $j <= 1; $j++){
                DB::table('tour_details')->insert([
                    'tour_id' => $i,
                    'price' => rand(1000000, 100000000),
                    'age' => $j,
                    'destination' => $province[rand(0,33)]
                ]);
            }
        }
    }
}
