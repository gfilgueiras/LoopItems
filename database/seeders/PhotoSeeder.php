<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Product;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    public function run(): void
    {
        $arrayData = [
            ['path' => 'https://images.unsplash.com/photo-1580894908361-0ce7a6e83a61', 'shootable_type' => Product::class, 'shootable_id' => 1],
            ['path' => 'https://images.pexels.com/photos/3394663/pexels-photo-3394663.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 1],
            ['path' => 'https://images.unsplash.com/photo-1580894894519-1fcdc4a9816f', 'shootable_type' => Product::class, 'shootable_id' => 1],
            ['path' => 'https://images.pexels.com/photos/374870/pexels-photo-374870.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 1],
            ['path' => 'https://images.unsplash.com/photo-1593809194045-0c4fc41d5a92', 'shootable_type' => Product::class, 'shootable_id' => 1],

            ['path' => 'https://images.unsplash.com/photo-1602810316332-14bb87eb42be', 'shootable_type' => Product::class, 'shootable_id' => 2],
            ['path' => 'https://images.pexels.com/photos/428338/pexels-photo-428338.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 2],
            ['path' => 'https://images.unsplash.com/photo-1592878829127-dee854095ba0', 'shootable_type' => Product::class, 'shootable_id' => 2],
            ['path' => 'https://images.pexels.com/photos/1274741/pexels-photo-1274741.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 2],
            ['path' => 'https://images.unsplash.com/photo-1592847184159-0e1e2e7f01e2', 'shootable_type' => Product::class, 'shootable_id' => 2],

            ['path' => 'https://images.unsplash.com/photo-1593106710088-f6cdb55fade5', 'shootable_type' => Product::class, 'shootable_id' => 3],
            ['path' => 'https://images.pexels.com/photos/212528/pexels-photo-212528.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 3],
            ['path' => 'https://images.unsplash.com/photo-1503736334956-4c8f8e92946d', 'shootable_type' => Product::class, 'shootable_id' => 3],
            ['path' => 'https://images.pexels.com/photos/1280513/pexels-photo-1280513.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 3],
            ['path' => 'https://images.unsplash.com/photo-1576516204846-52bb37e7cd80', 'shootable_type' => Product::class, 'shootable_id' => 3],

            ['path' => 'https://images.pexels.com/photos/1268556/pexels-photo-1268556.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 4],
            ['path' => 'https://images.pexels.com/photos/1095550/pexels-photo-1095550.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 4],
            ['path' => 'https://images.pexels.com/photos/1109197/pexels-photo-1109197.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 4],
            ['path' => 'https://images.pexels.com/photos/4414103/pexels-photo-4414103.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 4],
            ['path' => 'https://images.pexels.com/photos/4051063/pexels-photo-4051063.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 4],

            ['path' => 'https://images.pexels.com/photos/326875/pexels-photo-326875.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 5],
            ['path' => 'https://images.pexels.com/photos/852815/pexels-photo-852815.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 5],
            ['path' => 'https://images.pexels.com/photos/1394763/pexels-photo-1394763.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 5],
            ['path' => 'https://images.pexels.com/photos/416160/pexels-photo-416160.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 5],
            ['path' => 'https://images.pexels.com/photos/127028/pexels-photo-127028.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 5],

            ['path' => 'https://images.pexels.com/photos/1092648/pexels-photo-1092648.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 6],
            ['path' => 'https://images.pexels.com/photos/4505969/pexels-photo-4505969.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 6],
            ['path' => 'https://images.pexels.com/photos/3825586/pexels-photo-3825586.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 6],
            ['path' => 'https://images.pexels.com/photos/3945685/pexels-photo-3945685.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 6],
            ['path' => 'https://images.pexels.com/photos/276528/pexels-photo-276528.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 6],

            ['path' => 'https://images.pexels.com/photos/607812/pexels-photo-607812.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 7],
            ['path' => 'https://images.pexels.com/photos/586340/pexels-photo-586340.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 7],
            ['path' => 'https://images.pexels.com/photos/4042801/pexels-photo-4042801.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 7],
            ['path' => 'https://images.pexels.com/photos/607812/pexels-photo-607812.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 7],
            ['path' => 'https://images.pexels.com/photos/5082577/pexels-photo-5082577.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 7],

            ['path' => 'https://images.pexels.com/photos/2983464/pexels-photo-2983464.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 8],
            ['path' => 'https://images.pexels.com/photos/3757949/pexels-photo-3757949.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 8],
            ['path' => 'https://images.pexels.com/photos/698532/pexels-photo-698532.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 8],
            ['path' => 'https://images.pexels.com/photos/461198/pexels-photo-461198.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 8],
            ['path' => 'https://images.pexels.com/photos/322207/pexels-photo-322207.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 8],

            ['path' => 'https://images.pexels.com/photos/210019/pexels-photo-210019.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 9],
            ['path' => 'https://images.pexels.com/photos/210020/pexels-photo-210020.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 9],
            ['path' => 'https://images.pexels.com/photos/207580/pexels-photo-207580.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 9],
            ['path' => 'https://images.pexels.com/photos/223670/pexels-photo-223670.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 9],
            ['path' => 'https://images.pexels.com/photos/1733873/pexels-photo-1733873.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 9],

            ['path' => 'https://images.pexels.com/photos/4506108/pexels-photo-4506108.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 10],
            ['path' => 'https://images.pexels.com/photos/3945660/pexels-photo-3945660.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 10],
            ['path' => 'https://images.pexels.com/photos/3945671/pexels-photo-3945671.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 10],
            ['path' => 'https://images.pexels.com/photos/3945659/pexels-photo-3945659.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 10],
            ['path' => 'https://images.pexels.com/photos/3945668/pexels-photo-3945668.jpeg', 'shootable_type' => Product::class, 'shootable_id' => 10],
        ];

        Photo::insert($arrayData);
    }
}
