<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;

use App\Models\Building;
use App\Models\Brain;
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

        // Add new user
        $user = new User();
        $user->first = "Adam";
        $user->last = "Thomas";
        $user->email = "thomasadam83@hotmail.com";
        $user->password = "password";
        $user->save();

        // Add first map
        $map = new Map();
        $map->title = "Mock 1";
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
                'squares' => array(1,2),
            ),array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Weasley\'s Wizard Wheezes & Knockturn Alley',
                'set_num' => '75798',
                'color' => 'E9C9FF',
                'squares' => array(3,4),
            ),array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Quality Quidditch™ Supplies & The Daily Prophet™',
                'set_num' => '75798',
                'color' => '6D8E6E',
                'squares' => array(7,8),
            ),array(
                'title' => 'Dagobah™ Jedi™ Training Diorama',
                'subtitle' => '',
                'set_num' => '75330',
                'color' => 'D7AE71',
                'squares' => array(9,10),
            ),array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Ollivanders™ Wandshop & Scribbulus',
                'set_num' => '75798',
                'color' => '003E62',
                'squares' => array(11,12),
            ),array(
                'title' => 'Boutique Hotel',
                'subtitle' => '',
                'set_num' => '10297',
                'color' => 'BE6A33',
                'squares' => array(45,46,57,58),
            ),
        );

        foreach($buildings as $key => $value)
        {
            $building = new Building();
            $building->title = $value['title'];
            $building->subtitle = $value['subtitle'];
            $building->set_num = $value['set_num'];
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
                'ports' => array(
                    'A' => 'Input/Output',
                    'B' => 'Input/Output',
                ),
            ),
        );

        foreach($types as $key => $value)
        {
            $type = new BrainType();
            $type->title = $value['title'];
            $type->set_num = $value['set_num'];
            $type->part_num = $value['part_num'];
            $id = $type->save();

            foreach($value['ports'] as $key2 => $value2)
            {
                $port = new BrainPort();
                $port->title = $key2;
                $port->function = $value2;
                $port->brain_type_id = $id;
                $port->save();
            }
        }


    }
   
}
