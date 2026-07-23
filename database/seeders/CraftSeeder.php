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
                'folder' => 'Lacquerware',
                'items' => [
                    ['Lacquer Teapot', 40000, 'Traditional black teapot with gold patterns.', 12],
                    ['Gold Ring Box', 35000, 'Circular serving tray with gold leaf art.', 8],
                    ['Betel Box', 18000, 'Traditional red multi-tier betel nut box.', 25],
                    ['Tiffin Carrier', 20000, 'Classic black food carrier with handles.', 50],
                    ['Offering Bowls', 30000, 'Glossy black bowls for temple donations.', 5],
                    ['Crimson Bowls', 22000, 'Bright red lacquer bowls with smooth finish.', 15],
                    ['Bangle Boxes', 15000, 'Small circular boxes with green and gold designs.', 40],
                    ['Stemmed Bowl', 55000, 'High-standing traditional offering bowl.', 3],
                    ['Patterned Box', 32000, 'Circular container with intricate flower art.', 10],
                    ['Tiffin Food Carrier', 35000, 'Complete matching set of bowls and stands.', 2],
                    ['Jewelry Box', 15000, 'Small luxury box with gold floral designs.', 100],
                    ['Tissue Box', 28000, 'Square tissue holder with traditional art.', 20],
                    ['Pedestal Cup', 40000, 'Unique lacquer cup on a high stand.', 7],
                    ['Dining Bowl', 15000, 'Simple dark lacquer bowl for daily meals.', 60],
                    ['Glossy Cup', 27000, 'Decorative cup with gold-leaf detailing.', 14],
                    ['Storage Jar', 80000, 'Large red lacquer pot with a tight lid.', 1]
                ]
            ],

        'Handmade Bag Set' => [
            'folder' => 'handmade-bags',
            'items' => [
                ['Classic Rattan Tote', 35000, 'Handcrafted in Bagan from premium natural rattan, this classic open-top tote features a sturdy vertical weave perfect for daily use.', 15],
                ['Round Handle Straw Bag', 28000, 'Originating from Inle Lake, this charming straw bag features a unique rounded handle decorated with handmade fabric flowers and tassels.', 12],
                ['Woven Envelope Clutch', 18000, 'Handwoven in Bago from fine bamboo strips, this elegant envelope clutch is finished with a traditional wooden button closure.', 20],
                ['Textured Bag', 22000, 'Made in Yangon from palm leaves, this textured bag features a beautifully patterned front flap.', 18],
                ['Slim Straw Wallet', 15000, 'Crafted in Pathein from durable woven straw, this slim zip-around wallet comes with a convenient wristlet strap and colorful tassel.', 25],
                ['Ribbon-Tied Handbag', 32000, 'Hand-basketed in Bagan using rattan, this cute handbag features a soft linen lining that ties into a decorative bow.', 10],
                ['Vertical Crossbody Case', 20000, 'Designed in Bagan using strong woven rattan and genuine leather, this vertical crossbody phone pouch keeps your essentials secure.', 14],
                ['Circular Crossbody Bag', 27000, 'Handwoven in Pakokku with a beautiful starburst rattan pattern, this trendy round bag features a classic leather strap.', 16],
                ['3-Piece Nesting Baskets', 65000, 'Handcrafted in Bago from dark-stained woven seagrass, this set of three nesting storage baskets features matching lids and handles.', 8],
                ['Floral Burlap Tote', 30000, 'Made in Shan State from eco-friendly burlap jute, this rustic tote features wooden handles and beautiful hand-embroidered white flowers.', 12],
                ['Daisy Linen Tote', 29000, 'Tailored in Mandalay from soft, lightweight cream linen, this simple shoulder bag is decorated with hand-stitched daisy embroidery.', 15],
                ['Elephant Motif Clutch', 50000, 'Hand-stitched in Inle from premium velvet fabric and wood, this traditional clutch features elegant embroidered golden elephant designs.', 10],
                ['Floral Patchwork Tote', 38000, 'Crafted in Amarapura from durable canvas and leather, this colorful tote bag features detailed floral patchwork embroidery.', 7],
                ['Daisy Burlap Bag', 31000, 'Handwoven in Monywa from natural burlap fiber, this sturdy handbag is decorated with a sweet, hand-stitched white wildflower pattern.', 11],
                ['Pearl-Handle Rattan Bag', 40000, 'Made in Bagan from polished natural rattan, this elegant square basket bag is elevated by a stylish faux-pearl handle.', 6],
                ['2-Piece Miniature Baskets', 30000, 'Hand-braided in Pyin Oo Lwin from light straw, this set of two miniature gift baskets features delicate paper flower accents.', 18],
            ]
        ],







            'Traditional Umbrella' => [
                'folder' => 'umbrella',
                'items' => [
                    ['Yellow Parasol', 30000, 'Classic yellow Pathein umbrella.', 20],
                    ['Blue Parasol', 21000, 'Sky blue fabric umbrella with bamboo frame.', 35],
                    ['Mini Umbrellas', 28000, 'Mix of small colorful souvenir umbrellas.', 15],
                    ['Floral Shade Umbrella', 35000, 'Dark red oiled-cotton umbrella for monks.', 4],
                    ['Green Parasol', 45000, 'Hand-painted flowers on a green base.', 6],
                    ['Pink Parasol', 35000, 'Bright pink umbrella with floral borders.', 120],
                    ['Brown Parasol', 38000, 'Minimalist umbrella in soft brown tones.', 10],
                    ['Cream Parasol', 20000, 'Off-white fabric with traditional flower prints.', 12],
                    ['Pastel Mix', 20000, 'Four small decorative pastel umbrellas.', 18],
                    ['Pink & White Set', 20000, 'Two matching handmade festival umbrellas.', 45],
                    ['Monk Umbrella', 25000, 'Deep crimson red cotton sunshade.', 22],
                    ['Star Pattern Parasol', 25000, 'Features circular black and yellow designs.', 5],
                    ['Red Parasol', 30000, 'Bright orange-red umbrella with bamboo handle.', 30],
                    ['Festival Parasols', 20000, 'Multi-colored mini umbrellas for decoration.', 30],
                    ['Gold Painted Parasol', 35000, 'Yellow umbrella with fine golden patterns.', 8],
                    ['Purple Parasol', 45000, 'Striking purple shade for cultural festivals.', 2]
                ]
            ],
            'Traditional Puppets' => [
                'folder' => 'puppets',
                'items' => [
                    ['Ogre Puppet', 45000, 'Green masked ogre puppet with sequins.', 10],
                    ['Princess Puppet', 45000, 'Beautiful princess puppet in a pink dress.', 10],
                    ['Prince Puppet', 38000, 'Teak prince puppet in a yellow outfit.', 15],
                    ['Jester Puppet', 55000, 'Funny comedic character in village clothes.', 6],
                    ['Deity Puppet', 32000, 'Golden-crowned spirit puppet in royal clothes.', 12],
                    ['Ministers Set', 40000, 'Two matching white-robed minister puppets.', 8],
                    ['Garuda Puppet', 65000, 'Mythical bird-man puppet with colorful details.', 3],
                    ['White Elephant', 42000, 'Sacred white fabric elephant string puppet.', 9],
                    ['Dancer Puppet', 28000, 'Active marionette wearing a red silk outfit.', 20],
                    ['Youth Puppet', 35000, 'Simple character puppet representing a village boy.', 14],
                    ['Horse Puppet', 48000, 'Long jointed dragon puppet with silver scales.', 5],
                    ['Festival Elephant', 20000, 'Green and red velvet elephant with movable trunk.', 40],
                    ['Hermit Puppet', 25000, 'Wise old hermit puppet with brown robes.', 25],
                    ['Archer Puppet', 50000, 'Warrior puppet holding a small wooden bow.', 44],
                    ['Blue Elephant', 27000, 'Dark blue velvet elephant with gold embroidery.', 18],
                    ['Dancers Pair', 60000, 'Two mini puppets showing court dancing styles.', 2]
                ]
            ],
            'Pottery' => [
                'folder' => 'pottery',
                'items' => [
                    ['Mini Painted Pots', 15000, 'Set of tiny hand-painted colorful pots.', 4],
                    ['Clay Mixing Bowl', 15000, 'Wide unglazed clay bowl with handles.', 60],
                    ['Footed Clay Bowl', 12000, 'Red terracotta bowl standing on three legs.', 45],
                    ['Glazed Stand', 15000, 'Raised ceramic platter with dark patterns.', 20],
                    ['Sagaing Water Pot', 6500, 'Traditional porous clay pot to keep water cool.', 80],
                    ['Storage Urn', 7500, 'Heavy terracotta jar for water or grain storage.', 150],
                    ['Cooking Pot', 15000, 'Round earthenware cooking pot with a lid.', 30],
                    ['Polished Clay Urn', 18000, 'Smooth orange clay pot with a top handle.', 40],
                    ['Water Pitcher', 25000, 'Tall clay jug with an elegant pouring shape.', 15],
                    ['Green Ceramic Bowl', 5500, 'Celadon glazed bowl with fish engravings.', 100],
                    ['Teapot Set', 9000, 'Mini decorative clay teapot and small cups.', 50],
                    ['Assorted Mini Pots', 17000, 'Collection of various small unglazed dishes.', 12],
                    ['Clay Stove Set', 48000, 'Miniature traditional village cooking stoves.', 5],
                    ['Glossy Orange Urn', 13000, 'Smooth, round ceramic pot in bright orange.', 200],
                    ['Ceremonial Vessel', 22000, 'Clay pitcher used for water pouring rituals.', 25],
                    ['Stacked Mini Pots', 35000, 'Row of tiny thumb-sized collector pots.', 10]
                ]
            ],
            'Bamboo Basketry' => [
                'folder' => 'bamboo-basket',
                'items' => [
                    ['Storage Basket', 20000, 'Sturdy round bamboo basket with thick rim.', 70],
                    ['Square Box', 14000, 'Light-colored square woven basket with lid.', 25],
                    ['Food Cover Dome', 25000, 'Woven mesh dome to protect food from insects.', 12],
                    ['Picnic Basket', 18000, 'Woven carrying basket with a high handle.', 30],
                    ['Stacked Boxes', 9500, 'Two matching round boxes stacked together.', 55],
                    ['Market Tote Bag', 15000, 'Durable woven shopping bag with handles.', 40],
                    ['Large Trunk', 12000, 'Big bamboo storage box with an attached lid.', 65],
                    ['Lunch Basket', 22000, 'Two-tier round basket with a wooden carry frame.', 15],
                    ['Oval Hand Basket', 20000, 'Wide open shopping basket with sturdy handle.', 50],
                    ['Patterned Platter', 8000, 'Flat circular display tray with dark weaves.', 90],
                    ['Fruit Tray', 10000, 'Shallow, lightweight bamboo basket for fruits.', 200],
                    ['Serving Tray', 12000, 'Flat rectangular tray for serving drinks.', 10],
                    ['Mini Gift Boxes', 5500, 'Three small square bamboo boxes with lids.', 40],
                    ['3-Tier Stand', 32000, 'Vertical basket organizer with three round trays.', 8],
                    ['Nested Bowls', 12000, 'Two flexible woven bowls fitting inside each other.', 20],
                    ['Bamboo Food Dome', 10000, 'Light traditional woven hat for summer.', 35]
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
                        'stock'       => $item[3], 
                        'image'       => 'backend_assets/img/' . $categoryInfo['folder'] . '/photo (' . ($index + 1) . ').jpg',
                    ]);
                }
            }
        }
    }
}   