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
use App\Models\Hub;
use App\Models\HubFunction;
use App\Models\HubPort;
use App\Models\Map;
use App\Models\MapSquare;
use App\Models\MapType;
use App\Models\Place;
use App\Models\Road;
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
        Storage::deleteDirectory('hubs');

        // Add new user
        $user = new User();
        $user->first = "Adam";
        $user->last = "Thomas";
        $user->email = "thomasadam83@hotmail.com";
        $user->password = "password";
        $user->save();

        // Add testing user
        $user = new User();
        $user->first = "First";
        $user->last = "Last";
        $user->email = "email@address.com";
        $user->password = "password";
        $user->save();

        // Add first map
        $map = new Map();
        $map->title = "LEGO City - Version 1";
        $map->width = 15;
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
            array(2,2,2,2,2,2,2,2,2,2,2,2,2,2,2),
            array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
            array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
            array(1,1,2,2,2,2,2,1,1,2,2,2,2,1,1),
            array(1,1,2,2,2,2,2,1,1,2,2,2,2,1,1),
            array(1,1,2,2,2,2,2,1,1,2,2,2,2,1,1),
            array(1,1,2,2,2,2,2,1,1,2,2,2,2,1,1),
            array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
            array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
        );

        foreach($squares as $key => $value)
        {
            foreach($value as $key2 => $value2)
            {
                $square = new MapSquare(array('x' => $key2, 'y' => $key, 'map_id' => 1, 'map_type_id' => $value2));
                $square->save();
            }
        }

        // Roads
        $roads = array(
            array(
                'title' => 'Grimmauld Place',
                'squares' => array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,32,33,34,35,36,37,38,39,40,41,42,43,44),
            ),
            array(
                'title' => '39th Street',
                'squares' => array(107,108,109,110,111,112,113,114,115,116,117,118,119,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135),
            ),
            array(
                'title' => 'Tatooine Drive',
                'squares' => array(31,46,61,76,91,106,47,62,77,92),
            ),
            array(
                'title' => 'Aker Wood West',
                'squares' => array(53,68,83,98,54,69,84,99),
            ),
            array(
                'title' => '2nd Ave',
                'squares' => array(59,74,89,104,45,60,75,90,105,120),
            ),
        );

        foreach($roads as $key => $value)
        {

            $road = new Road();
            $road->title = $value['title'];
            $road->map_id = 1;
            $road->save();
            $id = $road->id;

            foreach($value['squares'] as $key2 => $value2)
            {
                $square = MapSquare::find($value2);
                $square->road_id = $id;
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
                'width' => 2,
                'height' => 1,
                'image' => 'blotts.jpg',
                'squares' => array(1,2),
            ),
            array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Weasley\'s Wizard Wheezes & Knockturn Alley',
                'set_num' => '75798',
                'color' => 'E9C9FF',
                'width' => 2,
                'height' => 1,
                'image' => 'wizard.jpg',
                'squares' => array(3,4),
            ),
            array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Quality Quidditch™ Supplies & The Daily Prophet™',
                'set_num' => '75798',
                'color' => '6D8E6E',
                'width' => 2,
                'height' => 1,
                'image' => 'quidditch.jpg',
                'squares' => array(10,11),
            ),
            array(
                'title' => 'Dagobah™ Jedi™ Training Diorama',
                'subtitle' => '',
                'set_num' => '75330',
                'color' => 'D7AE71',
                'width' => 2,
                'height' => 1,
                'image' => 'jedi.jpg',
                'squares' => array(12,13),
            ),
            array(
                'title' => 'Diagon Alley',
                'subtitle' => 'Ollivanders™ Wandshop & Scribbulus',
                'set_num' => '75798',
                'color' => '003E62',
                'width' => 2,
                'height' => 1,
                'image' => 'wand.jpg',
                'squares' => array(14,15),
            ),
            array(
                'title' => 'Boutique Hotel',
                'subtitle' => '',
                'set_num' => '10297',
                'color' => 'BE6A33',
                'width' => 2,
                'height' => 2,
                'image' => 'boutique.jpg',
                'squares' => array(57,58,72,73),
            ),
            array(
                'title' => 'The Pig House',
                'subtitle' => '',
                'set_num' => '21170',
                'color' => 'F4BBDE',
                'width' => 1,
                'height' => 2,
                'image' => 'pig.jpg',
                'squares' => array(85,100),
            ),
            array(
                'title' => 'Bookshop',
                'subtitle' => 'Birch Books',
                'set_num' => '10270',
                'color' => 'CD9773',
                'width' => 1,
                'height' => 2,
                'image' => 'birch.jpg',
                'squares' => array(86,101),
            ),
            array(
                'title' => 'Bookshop',
                'subtitle' => 'Townhouse',
                'set_num' => '10270',
                'color' => '57B9BB',
                'width' => 1,
                'height' => 2,
                'image' => 'townhouse.jpg',
                'squares' => array(56,71),
            ),
            array(
                'title' => 'Winnie the Pooh',
                'subtitle' => '',
                'set_num' => '21326',
                'color' => 'C11314',
                'width' => 2,
                'height' => 2,
                'image' => 'winnie.jpg',
                'squares' => array(51,52,66,67),
            ),
            array(
                'title' => 'Police Station',
                'subtitle' => '',
                'set_num' => '10278',
                'color' => 'DAC083',
                'width' => 2,
                'height' => 2,
                'image' => 'police.jpg',
                'squares' => array(49,50,64,65),
            ),
            array(
                'title' => 'Assembly Square',
                'subtitle' => '',
                'set_num' => '10255',
                'color' => '5F6C7C',
                'width' => 3,
                'height' => 2,
                'image' => 'square.jpg',
                'squares' => array(79,80,81,94,95,96),
            ),
            array(
                'title' => 'Mos Eisley Cantina™',
                'subtitle' => 'Tatooine Dwelling #2',
                'set_num' => '75290',
                'color' => 'DFCC93',
                'width' => 1,
                'height' => 2,
                'image' => 'dwelling-2.png',
                'squares' => array(48,63),
            ),
            array(
                'title' => 'Daily Bugle',
                'subtitle' => '',
                'set_num' => '76178',
                'color' => 'FE2419',
                'width' => 2,
                'height' => 2,
                'image' => 'bugle.png',
                'squares' => array(87,88,102,103),
            ),
            array(
                'title' => 'Christmas Tree',
                'subtitle' => '',
                'set_num' => '40573',
                'color' => '008B31',
                'width' => 1,
                'height' => 2,
                'image' => 'christmas.jpg',
                'squares' => array(82,97),
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
            $building->width = $value['width'];
            $building->height = $value['height'];
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

        // Places
        $places = array(
            array(
                'title' => 'Ollivanders™ Wand Shop',
                'address' => '16 Grimmauld Place',
                'x' => 1,
                'y' => 1,
                'width' => 12,
                'height' => 16,
                'building_id' => 5,
                'road_id' => 1,
            ),
            array(
                'title' => 'Scribbulus™ Writing Implements',
                'address' => '18 Grimmauld Place',
                'x' => 13,
                'y' => 1,
                'width' => 20,
                'height' => 16,
                'building_id' => 5,
                'road_id' => 1,
            ),   
        );

        foreach($places as $key => $value)
        {

            $place = new Place();
            $place->title = $value['title'];
            $place->address = $value['address'];
            $place->x = $value['x'];
            $place->y = $value['y'];
            $place->width = $value['width'];
            $place->height = $value['height'];
            $place->building_id = $value['building_id'];
            $place->road_id = $value['road_id'];
            $place->save();
            
        }

        // Add hubs
        $hubs = array(
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
            array(
                'title' => 'BrickPi',
                'set_num' => '',
                'part_num' => '',
                'image' => 'brickpi.jpg',
                'ports' => array(
                    'S1' => 'Input',
                    'S2' => 'Input',
                    'S3' => 'Input',
                    'S4' => 'Input',
                    'M1' => 'Output',
                    'M2' => 'Output',
                    'M3' => 'Output',
                    'M4' => 'Output',
                ),
            ),
        );

        foreach($hubs as $key => $value)
        {

            $path = Storage::putFile('hubs', new File(__DIR__.'/images/'.$value['image']));

            $hub = new Hub();
            $hub->title = $value['title'];
            $hub->set_num = $value['set_num'];
            $hub->part_num = $value['part_num'];
            $hub->image = $path;
            $hub->save();

            $id = $hub->id;

            foreach($value['ports'] as $key2 => $value2)
            {
                $port = new HubPort();
                $port->title = $key2;
                $port->function = $value2;
                $port->hub_id = $id;
                $port->save();
            }

        }

        // Buildings
        $functions = array(
            array(
                'title' => 'Lights',
            ),
            array(
                'title' => 'Weasley\'s Hat',
            ),
            array(
                'title' => 'Dagobah™ Swamp',
            ),
            array(
                'title' => '12 Grimmuald Place',
            ),
            array(
                'title' => 'Christmas Tree',
            ),
            array(
                'title' => 'Infinity Gauntlet',
            ),
            array(
                'title' => 'Loop Coaster',
            ),
            array(
                'title' => 'Magestic Tiger',
            ),
            array(
                'title' => 'Color Sensor',
            ),
        );

        foreach($functions as $key => $value)
        {
            $function = new HubFunction();
            $function->title = $value['title'];
            $function->save();
        }

        // Brains
        $brains = array(
            array(
                'title' => 'Mike',
                'ip' => '10.12.1.13',
                'key' => 'MIKE',
                'hub_id' => 1,
                'map_id' => 1,
                'ports' => array(
                    array('hub_port_id' => '1', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '2', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '3', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '4', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '5', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '6', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '7', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '8', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                ),
            ),
            array(
                'title' => 'November',
                'ip' => '10.12.1.14',
                'key' => 'NOVEMBER',
                'hub_id' => 1,
                'map_id' => 1,
                'ports' => array(
                    array('hub_port_id' => '1', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '2', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '3', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '4', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '5', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '6', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '7', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '8', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                ),
            ),
            array(
                'title' => 'Oscar',
                'ip' => '10.12.1.15',
                'key' => 'OSCAR',
                'hub_id' => 1,
                'map_id' => 1,
                'ports' => array(
                    array('hub_port_id' => '1', 'hub_function_id' => 1, 'json' => '{"buildings":[1]}', 'settings' => '{"status" : "on"}'),
                    array('hub_port_id' => '2', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '3', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '4', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '5', 'hub_function_id' => 9, 'json' => '', 'settings' => '{"status":"on","color":"None","ambient":"0","reflection":"0"}'),
                    array('hub_port_id' => '6', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '7', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '8', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                ),
            ),
            array(
                'title' => 'Papa',
                'ip' => '10.12.1.16',
                'key' => 'PAPA',
                'hub_id' => 1,
                'map_id' => 1,
                'ports' => array(
                    array('hub_port_id' => '1', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '2', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '3', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '4', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '5', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '6', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '7', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '8', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                ),
            ),
            array(
                'title' => 'Quebec',
                'ip' => '10.12.1.17',
                'key' => 'QUEBEC',
                'hub_id' => 1,
                'map_id' => 1,
                'ports' => array(
                    array('hub_port_id' => '1', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '2', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '3', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '4', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '5', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '6', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '7', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '8', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                ),
            ),
            array(
                'title' => 'Romeo',
                'ip' => '10.12.1.18',
                'key' => 'ROMEO',
                'hub_id' => 1,
                'map_id' => 1,
                'ports' => array(
                    array('hub_port_id' => '1', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '2', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '3', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '4', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '5', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '6', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '7', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                    array('hub_port_id' => '8', 'hub_function_id' => null, 'json' => '', 'settings' => ''),
                ),
            ),
        );

        foreach($brains as $key => $value)
        {
            $brain = new Brain();
            $brain->title = $value['title'];
            $brain->ip = $value['ip'];
            $brain->key = $value['key'];
            $brain->hub_id = $value['hub_id'];
            $brain->map_id = $value['map_id'];
            $brain->save();

            $id = $brain->id;

            foreach($value['ports'] as $key2 => $value2)
            {
                $port = new BrainPort();
                $port->json = $value2['json'];
                $port->settings = $value2['settings'];
                $port->hub_port_id = $value2['hub_port_id'];
                $port->hub_function_id = $value2['hub_function_id'];
                $port->brain_id = $id;
                $port->save();
            }

        }

    }
   
}
