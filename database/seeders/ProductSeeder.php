<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $arrayData = [
            ['userID' => 1, 'categoryId' => 1, 'conditionId' => random_int(1, 5), 'statusId' => rand(0, 1) ? 1 : 5, 'title' => 'Wireless Noise-Canceling Headphones', 'description' => 'Over-ear Bluetooth headphones with active noise cancellation. Long battery life, great sound quality, and foldable design. Includes charging cable and case.'],
            ['userID' => 2, 'categoryId' => 2, 'conditionId' => random_int(1, 5), 'statusId' => rand(0, 1) ? 1 : 5, 'title' => 'Men’s Leather Jacket – Size L', 'description' => 'Genuine leather biker jacket, black color, size large. Barely worn, no scratches or marks. Classic design, warm and stylish.'],
            ['userID' => 3, 'categoryId' => 3, 'conditionId' => random_int(1, 5), 'statusId' => rand(0, 1) ? 1 : 5, 'title' => 'Car Roof Rack – Universal Fit', 'description' => 'Heavy-duty roof rack suitable for most vehicles. Ideal for transporting bikes, kayaks, or luggage. Easy to install and remove.'],
            ['userID' => 4, 'categoryId' => 1, 'conditionId' => random_int(1, 5), 'statusId' => rand(0, 1) ? 1 : 5, 'title' => 'Air Fryer 5L – Digital Touchscreen', 'description' => 'Compact air fryer with digital control panel, 5L capacity. Makes crispy food with little or no oil. Used a few times, works perfectly.'],
            ['userID' => 5, 'categoryId' => 4, 'conditionId' => random_int(1, 5), 'statusId' => rand(0, 1) ? 1 : 5, 'title' => 'Cat Tree Tower – 4 Levels', 'description' => 'Multi-level cat tower with scratching posts, hammock, and soft beds. Great condition, ideal for active cats. Easy to assemble.'],
            ['userID' => 6, 'categoryId' => 5, 'conditionId' => random_int(1, 5), 'statusId' => rand(0, 1) ? 1 : 5, 'title' => 'Cordless Drill – 20V with Battery & Charger', 'description' => 'Powerful 20V cordless drill, includes 2 batteries and charger. Multiple speed settings and LED light. Perfect for home repairs or projects.'],
            ['userID' => 7, 'categoryId' => 1, 'conditionId' => random_int(1, 5), 'statusId' => rand(0, 1) ? 1 : 5, 'title' => 'Smartphone 128GB – Unlocked', 'description' => 'Android smartphone, 128GB storage, 6.5" display, dual SIM, great camera. Factory unlocked and fully functional. No scratches.'],
            ['userID' => 8, 'categoryId' => 2, 'conditionId' => random_int(1, 5), 'statusId' => rand(0, 1) ? 1 : 5, 'title' => 'Designer Handbag – Limited Edition', 'description' => 'Authentic designer handbag with gold accents. Used twice. Comes with dust bag and authentication card. Great for formal occasions.'],
            ['userID' => 9, 'categoryId' => 3, 'conditionId' => random_int(1, 5), 'statusId' => rand(0, 1) ? 1 : 5, 'title' => 'Set of 4 Car Tires – 17” All-Season', 'description' => 'All-season radial tires, size 225/50 R17. Only used for 5,000 km. Still in great shape. No punctures or damage.'],
            ['userID' => 10, 'categoryId' => 5, 'conditionId' => random_int(1, 5), 'statusId' => rand(0, 1) ? 1 : 5, 'title' => 'Toolbox – 75 Piece Set', 'description' => 'Complete home repair toolbox with 75 tools including wrench, pliers, screwdrivers, hammer, and case. Great for DIY projects.'],
        ];

        Product::insert($arrayData);
    }
}
