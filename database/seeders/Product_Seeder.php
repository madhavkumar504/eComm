<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'          =>      'Samsung mobile',
                'price'         =>      '10000',
                'description'   =>      'A smart phone with 6 gb RAM',
                'category'      =>      'mobile',
                'gallery'       =>      'https://i.gadgets360cdn.com/products/large/oneplus-nord-ce-5g-369x800-1623336330.jpg'
            ],
            [
                'name'          =>      'Apple mobile',
                'price'         =>      '10200',
                'description'   =>      'A smart phone with 4 gb RAM',
                'category'      =>      'mobile',
                'gallery'       =>      'https://www.globalbrandsmagazine.com/wp-content/uploads/2020/08/Top-10-Mobile-Brands-in-World-1-1.jpg'
            ],
            [
                'name'          =>      'Xiomi mobile',
                'price'         =>      '9200',
                'description'   =>      'A smart phone with 8 gb RAM',
                'category'      =>      'mobile',
                'gallery'       =>      'https://www.91-img.com/pictures/136302-v8-xiaomi-redmi-9-mobile-phone-large-1.jpg'
            ],
            [
                'name'          =>      'LED TV',
                'price'         =>      '92000',
                'description'   =>      'A smart TV with 56 inch screen',
                'category'      =>      'TV',
                'gallery'       =>      'https://5.imimg.com/data5/EK/EK/WS/SELLER-93562552/24-inch-smart-led-tv-500x500.jpg'
            ]
            
        ]);
    }
}
