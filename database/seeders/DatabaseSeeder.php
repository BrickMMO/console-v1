<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;

use App\Models\Building;
use App\Models\Brain;
use App\Models\BrainFunction;
use App\Models\BrainPort;
use App\Models\BrainType;
use App\Models\Map;
use App\Models\MapSquare;
use App\Models\MapType;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Delete buildings and brains folder
        Storage::deleteDirectory('buildings');
        Storage::deleteDirectory('brainTypes');

        // Add new user
        $user = new User();
        $user->first = "Adam";
        $user->last = "Thomas";
        $user->email = "thomasadam83@hotmail.com";
        $user->password = "password";
        $user->save();

        // Add first map
        $map = new Map();
        $map->title = "LEGO City - Version 1";
        $map->width = 12;
        $map->height = 9;
        $map->save();

        // Add types
        $types = array(
            array('title' => 'road', 'color' => 'grey'),
            array('title' => 'building', 'color' => 'brown'),
            array('title' => 'grass', 'color' => 'green')
        );

        foreach($types as $value)
        {
            $type = new MapType($value);
            $type->save();
        }

        // Add squares for first map
        $squares = array(
            array(2,2,2,2,2,2,2,2,2,2,2,2),
            array(1,1,1,1,1,1,1,1,1,1,1,1),
            array(1,1,1,1,1,1,1,1,1,1,1,1),
            array(1,1,2,2,1,1,2,2,2,2,1,1),
            array(1,1,2,2,1,1,2,2,2,2,1,1),
            array(1,1,2,2,1,1,2,2,2,2,1,1),
            array(1,1,2,2,1,1,2,2,2,2,1,1),
            array(1,1,1,1,1,1,1,1,1,1,1,1),
            array(1,1,1,1,1,1,1,1,1,1,1,1),
        );

        foreach($squares as $key => $value)
        {
            foreach($value as $key2 => $value2)
            {
                $square = new MapSquare(array('x' => $key2, 'y' => $key, 'map_id' => 1, 'map_type_id' => $value2));
                $square->save();
            }
        }

        // Buildings
        $buildings = array(
            array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Flourish & Blotts & Florean Fortescue\'s Ice Cream Parlor',
                'set_num' => '75798',
                'color' => '6D8E6E',
                'image' => 'blotts.jpg',
                'squares' => array(1,2),
            ),array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Weasley\'s Wizard Wheezes & Knockturn Alley',
                'set_num' => '75798',
                'color' => 'E9C9FF',
                'image' => 'wizard.jpg',
                'squares' => array(3,4),
            ),array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Quality Quidditch™ Supplies & The Daily Prophet™',
                'set_num' => '75798',
                'color' => '6D8E6E',
                'image' => 'quidditch.jpg',
                'squares' => array(7,8),
            ),array(
                'title' => 'Dagobah™ Jedi™ Training Diorama',
                'subtitle' => '',
                'set_num' => '75330',
                'color' => 'D7AE71',
                'image' => 'jedi.jpg',
                'squares' => array(9,10),
            ),array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Ollivanders™ Wandshop & Scribbulus',
                'set_num' => '75798',
                'color' => '003E62',
                'image' => 'wand.jpg',
                'squares' => array(11,12),
            ),array(
                'title' => 'Boutique Hotel',
                'subtitle' => '',
                'set_num' => '10297',
                'color' => 'BE6A33',
                'image' => 'boutique.jpg',
                'squares' => array(45,46,57,58),
            ),
        );

        foreach($buildings as $key => $value)
        {

            $path = Storage::putFile('buildings', new File(__DIR__.'/images/'.$value['image']));

            $building = new Building();
            $building->title = $value['title'];
            $building->subtitle = $value['subtitle'];
            $building->set_num = $value['set_num'];
            $building->color = $value['color'];
            $building->image = $path;
            $building->map_id = 1;
            $building->save();
            $id = $building->id;

            foreach($value['squares'] as $key2 => $value2)
            {
                $square = MapSquare::find($value2);
                $square->building_id = $id;
                $square->save();
            }
            
        }

        // Add brain types
        $types = array(
            array(
                'title' => 'Mindstorms EV3',
                'set_num' => '31313',
                'part_num' => '95646',
                'image' => 'ev3_hub.jpg',
                'ports' => array(
                    'A' => 'Output',
                    'B' => 'Output',
                    'C' => 'Output',
                    'D' => 'Output',
                    '1' => 'Input',
                    '2' => 'Input',
                    '3' => 'Input',
                    '4' => 'Input',
                ),
            ),
            array(
                'title' => 'Robot Inventor',
                'set_num' => '51515',
                'part_num' => '67718',
                'image' => 'inventor_hub.jpg',
                'ports' => array(
                    'A' => 'Input/Output',
                    'B' => 'Input/Output',
                    'C' => 'Input/Output',
                    'D' => 'Input/Output',
                    'E' => 'Input/Output',
                    'F' => 'Input/Output',
                ),
            ),
            array(
                'title' => 'SPIKE™ Prime Set',
                'set_num' => '45678',
                'part_num' => '53444',
                'image' => 'spike_hub.jpg',
                'ports' => array(
                    'A' => 'Input/Output',
                    'B' => 'Input/Output',
                    'C' => 'Input/Output',
                    'D' => 'Input/Output',
                    'E' => 'Input/Output',
                    'F' => 'Input/Output',
                ),
            ),
            array(
                'title' => 'SPIKE™ Essential',
                'set_num' => '45345',
                'part_num' => '67351',
                'image' => 'essentials_hub.jpg',
                'ports' => array(
                    'A' => 'Input/Output',
                    'B' => 'Input/Output',
                ),
            ),
        );

        foreach($types as $key => $value)
        {

            $path = Storage::putFile('brainTypes', new File(__DIR__.'/images/'.$value['image']));

            $type = new BrainType();
            $type->title = $value['title'];
            $type->set_num = $value['set_num'];
            $type->part_num = $value['part_num'];
            $type->image = $path;
            $type->save();

            $id = $type->id;

            foreach($value['ports'] as $key2 => $value2)
            {
                $port = new BrainPort();
                $port->title = $key2;
                $port->function = $value2;
                $port->brain_type_id = $id;
                $port->save();
            }

        }

        // Buildings
        $functions = array(
            array(
                'title' => 'Lights',
            ),
        );

        foreach($functions as $key => $value)
        {
            $function = new BrainFunction();
            $function->title = $value['title'];
            $function->save();
        }

    }
   
}
