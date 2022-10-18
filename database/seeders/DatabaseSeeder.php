<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Map;
use App\Models\MapSquare;
use App\Models\MapType;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;


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
            array(2,2,2,2,2,2,2,2,2,2,2,2),
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
                'squares' => array(1,2),
            ),array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Weasley\'s Wizard Wheezes & Knockturn Alley',
                'set_num' => '75798',
                'squares' => array(3,4),
            ),array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Quality Quidditch™ Supplies & The Daily Prophet™',
                'set_num' => '75798',
                'squares' => array(7,8),
            ),array(
                'title' => 'Dagobah™ Jedi™ Training Diorama',
                'subtitle' => '',
                'set_num' => '75330',
                'squares' => array(9,10),
            ),array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Ollivanders™ Wandshop & Scribbulus',
                'set_num' => '75798',
                'squares' => array(11,12),
            ),array(
                'title' => 'Boutique Hotel',
                'subtitle' => '',
                'set_num' => '10297',
                'squares' => array(45,46,57,58),
            ),
        );

        foreach($buildings as $key => $value)
        {
            $building = new Building();
            $building->title = $value['title'];
            $building->subtitle = $value['subtitle'];
            $building->set_num = $value['set_num'];
            $building->save();

            foreach($value['squares'] as $key2 => $value2)
            {
                $building->squares()->attach($value2);
            }
            
        }

    }
   
}
