<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class CraftSeeder extends Seeder
{
    public function run()
    {
        $craftData = [
            'Lacquerware' => [
                'folder' => 'lacquerware',
                'items' => [
                    ['Gold Leaf Bowl', 25000, 'Hand-painted with genuine 24k gold leaf from Mandalay.', 12],
                    ['Vermillion Tray', 35000, 'A deep red traditional serving tray used for ceremonies.', 8],
                    ['Bagan Jewelry Box', 18000, 'Engraved with classic dancing figure patterns.', 25],
                    ['Teak Coaster Set', 12000, 'Water-resistant lacquer over solid teak wood bases.', 50],
                    ['Royal Betel Box', 45000, 'An iconic multi-tier box once used by Burmese nobility.', 5],
                    ['Etched Wine Glass', 22000, 'Modern shape blended with ancient etching techniques.', 15],
                    ['Cylindrical Cup', 9000, 'Lightweight bamboo frame coated in high-gloss black sap.', 40],
                    ['Square Tiffin', 55000, 'A rare four-story lunch carrier with intricate floral art.', 3],
                    ['Floral Vase', 32000, 'Stunning centerpiece featuring the Kanote vine design.', 10],
                    ['Antique Stand', 60000, 'Heavy-duty lacquer stand for supporting sacred offerings.', 2],
                    ['Miniature Elephant', 15000, 'A symbolic souvenir representing strength and wisdom.', 100],
                    ['Incense Burner', 28000, 'Heat-resistant lacquerware designed for spiritual use.', 20],
                    ['Offering Bowl', 40000, 'Deep Hsun-ok style bowl used for temple donations.', 7],
                    ['Trinket Dish', 8500, 'A small, colorful leaf-shaped dish for daily accessories.', 60],
                    ['Black Gloss Jar', 27000, 'Polished with stone to achieve a mirror-like black finish.', 14],
                    ['Premium Cabinet', 150000, 'Large teak storage unit fully encased in master-grade lacquer.', 1]
                ]
            ],
            'Traditional Umbrella' => [
                'folder' => 'umbrella',
                'items' => [
                    ['Pathein Silk Sunshade', 18000, 'The original Pathein design made with premium yellow silk.', 20],
                    ['Monk Red Parasol', 12000, 'A sturdy, oiled-cotton umbrella used by forest monks.', 35],
                    ['Floral Hand-painted', 15000, 'Features delicate hand-painted orchids and jasmine.', 15],
                    ['Wedding Gold Parasol', 35000, 'An ornate gold-thread umbrella for ceremonies.', 4],
                    ['Garden Shade', 55000, 'A large-scale outdoor umbrella with a bamboo tripod.', 6],
                    ['Mini Decorative Hat', 5000, 'A cute souvenir version of the classic Pathein umbrella.', 120],
                    ['Silk Dance Umbrella', 22000, 'Ultra-lightweight and flexible for stage dance.', 10],
                    ['Boutique Sunshade', 28000, 'Modern pastel colors for a stylish summer look.', 12],
                    ['Bamboo Handle Shade', 14000, 'Features a naturally curved, polished bamboo handle.', 18],
                    ['Classic Cotton', 11000, 'Durable and waterproofed using traditional fruit resin.', 45],
                    ['Orchid Pattern', 16500, 'Purple silk with white orchid prints, very popular.', 22],
                    ['Royal White', 30000, 'Pure white silk used for religious festivals.', 5],
                    ['Sunset Orange', 13500, 'Vibrant orange cotton that glows in sunlight.', 30],
                    ['Forest Green', 13500, 'Deep green shade inspired by the Irrawaddy banks.', 30],
                    ['Patterned Silk', 24000, 'Multi-colored weave featuring ethnic patterns.', 8],
                    ['Artist Edition', 45000, 'Signed by a master artist from the Pathein workshop.', 2]
                ]
            ],
            'Traditional Puppets' => [
                'folder' => 'puppets',
                'items' => [
                    ['The Prince (Minthar)', 45000, 'Hand-carved teak puppet in a sequined silk costume.', 10],
                    ['The Princess', 45000, 'Features real hair and intricate jewelry replicas.', 10],
                    ['The Hermit', 38000, 'A wise character puppet dressed in brown robes.', 15],
                    ['The Ogre (Belu)', 55000, 'A fearsome masked puppet with a wooden sword.', 6],
                    ['The Monkey King', 32000, 'Highly flexible strings for acrobatic performance.', 12],
                    ['The Alchemist', 40000, 'Dressed in red, representing ancient Burmese magic.', 8],
                    ['The King', 65000, 'The most ornate puppet, wearing royal palace outfit.', 3],
                    ['The Nat Spirit', 42000, 'Colorful spirit puppet used for traditional folk rituals.', 9],
                    ['The Horse', 28000, 'A four-legged marionette with realistic galloping.', 20],
                    ['The Elephant', 35000, 'Gray velvet puppet with a movable trunk and tusks.', 14],
                    ['The Garuda', 48000, 'The mythical bird-man with hand-stitched feathers.', 5],
                    ['The Villager', 20000, 'Simple wooden puppet representing daily village life.', 40],
                    ['The Jester', 25000, 'A comedic character with a funny painted face.', 25],
                    ['The Dragon', 50000, 'A long, multi-segment puppet for dramatic scenes.', 4],
                    ['The Tiger', 27000, 'Striking velvet with a hand-painted face.', 18],
                    ['The Brahma', 60000, 'The four-faced deity puppet used in Jataka plays.', 2]
                ]
            ],
            'Pottery' => [
                'folder' => 'pottery',
                'items' => [
                    ['Glazed Martaban Jar', 85000, 'Large-scale jar famous for water storage.', 4],
                    ['Sagaing Water Pot', 12000, 'Porous clay that keeps water naturally cool.', 60],
                    ['Clay Flower Vase', 8000, 'Simple, rustic vase with hand-pressed designs.', 45],
                    ['Earthenware Cooker', 15000, 'Traditional charcoal stove made from reinforced clay.', 20],
                    ['Incense Bowl', 6500, 'Small glazed bowl for burning temple incense.', 80],
                    ['Pygmy Pot', 4500, 'A tiny decorative pot used for salt or spices.', 150],
                    ['Village Water Jug', 11000, 'Classic shape with a narrow neck to prevent spills.', 30],
                    ['Artisan Plate', 13000, 'Flat-fired clay plate with an emerald green glaze.', 40],
                    ['Tea Set Base', 25000, 'A tray made of fired earth to hold your tea set.', 15],
                    ['Decorative Tile', 5500, 'Hand-stamped tile featuring ancient Pyu symbols.', 100],
                    ['Terracotta Bowl', 9000, 'Rich orange clay bowl, unglazed for a natural look.', 50],
                    ['Hand-turned Pitcher', 17000, 'Balanced pouring vessel from Twante village.', 12],
                    ['Antique Style Urn', 48000, 'Weathered look designed to mimic 18th-century art.', 5],
                    ['Miniature Pot', 3500, 'A thumb-sized collector item for displays.', 200],
                    ['Garden Planter', 22000, 'Heavy-duty pot with drainage holes for large plants.', 25],
                    ['Sacred Water Vessel', 35000, 'Used for pouring water during merit ceremonies.', 10]
                ]
            ],
            'Bamboo Basketry' => [
                'folder' => 'basketry',
                'items' => [
                    ['Woven Sun Hat', 6000, 'Breathable hat made from split bamboo.', 70],
                    ['Rice Storage Basket', 14000, 'Tight weave designed to keep insects away.', 25],
                    ['Fishing Trap (Hmyone)', 25000, 'Functional river trap with a one-way entry.', 12],
                    ['Bamboo Floor Mat', 18000, 'Smooth, polished bamboo woven into a soft mat.', 30],
                    ['Market Tote', 9500, 'Durable shopping bag with reinforced handles.', 55],
                    ['Wall Hanging Decor', 15000, 'A star-shaped weave for decorating village homes.', 40],
                    ['Fruit Tray', 7500, 'Wide, flat basket perfect for displaying fruits.', 65],
                    ['Bamboo Lamp Shade', 22000, 'Creates beautiful patterns on the wall when lit.', 15],
                    ['Seed Sorter', 8000, 'Large tray used by farmers to separate rice husks.', 50],
                    ['Mini Trinket Box', 4000, 'Small box with a snug lid for storing treasures.', 90],
                    ['Traditional Hand Fan', 3500, 'Lightweight fan used during the hot summer.', 200],
                    ['Sturdy Picnic Basket', 30000, 'Double-lid design with strong wicker-style grip.', 10],
                    ['Tea Leaf Sifter', 5500, 'Fine-mesh weave for sorting pickled tea leaves.', 40],
                    ['Bamboo Stool', 32000, 'Strong seat made from thick, treated bamboo.', 8],
                    ['Wine Bottle Holder', 12000, 'A spiral weave that fits most glass bottles.', 20],
                    ['Delicate Jewelry Case', 10000, 'Soft bamboo interior to protect rings.', 35]
                ]
            ],
        ];

        foreach ($craftData as $catName => $categoryInfo) {
            $category = Category::where('name', $catName)->first();
            
            if ($category) {
                foreach ($categoryInfo['items'] as $index => $item) {
                    Product::create([
                        'name'        => $item[0],
                        'category_id' => $category->id,
                        'price'       => $item[1],
                        'description' => $item[2],
                        'stock'       => $item[3], // Unique stock from the array
                        'image' => 'backend_assets/img/' . $categoryInfo['folder'] . '/photo (' . ($index + 1) . ').jpg',
                    ]);
                }
            }
        }
    }
}