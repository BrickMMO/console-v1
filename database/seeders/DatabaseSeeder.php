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

        // 

        // \App\Models\User::factory(10)->create();

        // Schema::disableForeignKeyConstraints();
        // -Schema::enableForeignKeyConstraints();



    }
   
}
