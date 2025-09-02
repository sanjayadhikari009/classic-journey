<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Existing products (13) + new products to reach 45 total
            ['name' => 'Tokyo Adventure', 'price' => 850, 'description' => 'Explore the vibrant culture of Tokyo with our comprehensive city tour.'],
            ['name' => 'Bali Paradise', 'price' => 420, 'description' => 'Relax in the tropical paradise of Bali with stunning beaches and temples.'],
            ['name' => 'Swiss Alps Experience', 'price' => 1200, 'description' => 'Breathtaking mountain views and alpine adventures in Switzerland.'],
            ['name' => 'Egyptian Wonders', 'price' => 680, 'description' => 'Discover ancient pyramids and the rich history of Egypt.'],
            ['name' => 'Australian Outback', 'price' => 750, 'description' => 'Experience the rugged beauty of the Australian wilderness.'],
            ['name' => 'Icelandic Aurora', 'price' => 950, 'description' => 'Witness the magical Northern Lights in Iceland\'s pristine landscapes.'],
            ['name' => 'Moroccan Desert', 'price' => 380, 'description' => 'Camel trekking and desert camping in the Sahara.'],
            ['name' => 'Norwegian Fjords', 'price' => 890, 'description' => 'Cruise through stunning fjords and dramatic waterfalls.'],
            ['name' => 'Peruvian Highlands', 'price' => 520, 'description' => 'Trek to Machu Picchu and explore ancient Incan ruins.'],
            ['name' => 'Thai Islands', 'price' => 340, 'description' => 'Island hopping in Thailand\'s crystal clear waters.'],
            ['name' => 'Scottish Highlands', 'price' => 460, 'description' => 'Explore castles and lochs in Scotland\'s mystical highlands.'],
            ['name' => 'Vietnamese Culture', 'price' => 280, 'description' => 'Street food tours and cultural immersion in Vietnam.'],
            ['name' => 'Greek Islands', 'price' => 580, 'description' => 'Santorini sunsets and ancient Greek architecture.'],
            ['name' => 'Canadian Rockies', 'price' => 720, 'description' => 'Mountain hiking and wildlife viewing in Canada.'],
            ['name' => 'Brazilian Beaches', 'price' => 410, 'description' => 'Rio de Janeiro carnival and Copacabana beach.'],
            ['name' => 'Indian Palaces', 'price' => 350, 'description' => 'Rajasthan\'s magnificent palaces and cultural heritage.'],
            ['name' => 'South African Safari', 'price' => 980, 'description' => 'Big Five game viewing in Kruger National Park.'],
            ['name' => 'Chinese Heritage', 'price' => 440, 'description' => 'Great Wall and Forbidden City exploration.'],
            ['name' => 'Italian Romance', 'price' => 620, 'description' => 'Venice gondolas and Tuscan countryside.'],
            ['name' => 'Mexican Adventure', 'price' => 320, 'description' => 'Mayan ruins and cenote swimming in Yucatan.'],
            ['name' => 'Russian Journey', 'price' => 780, 'description' => 'Trans-Siberian railway and Moscow\'s Red Square.'],
            ['name' => 'Argentinian Tango', 'price' => 540, 'description' => 'Buenos Aires culture and Patagonia glaciers.'],
            ['name' => 'Turkish Delights', 'price' => 390, 'description' => 'Istanbul\'s bazaars and Cappadocia hot air balloons.'],
            ['name' => 'Korean Discovery', 'price' => 480, 'description' => 'Seoul\'s modern culture and traditional temples.'],
            ['name' => 'New Zealand Nature', 'price' => 820, 'description' => 'Adventure sports and stunning landscapes.'],
            ['name' => 'Chilean Wine Country', 'price' => 590, 'description' => 'Vineyard tours and Atacama Desert stargazing.'],
            ['name' => 'Portuguese Coastline', 'price' => 370, 'description' => 'Lisbon\'s trams and Algarve\'s golden beaches.'],
            ['name' => 'Malaysian Fusion', 'price' => 310, 'description' => 'Kuala Lumpur\'s towers and Borneo wildlife.'],
            ['name' => 'Croatian Islands', 'price' => 450, 'description' => 'Dubrovnik\'s walls and Adriatic Sea sailing.'],
            ['name' => 'Kenyan Wilderness', 'price' => 710, 'description' => 'Masai Mara migration and cultural encounters.'],
            ['name' => 'Cambodian Temples', 'price' => 290, 'description' => 'Angkor Wat sunrise and Khmer heritage.'],
            ['name' => 'Irish Countryside', 'price' => 420, 'description' => 'Cliffs of Moher and traditional Irish music.']
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
