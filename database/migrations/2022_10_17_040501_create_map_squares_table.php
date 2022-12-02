<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Building;
use App\Models\Map;
use App\Models\MapType;
use App\Models\Road;

class CreateMapSquaresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_squares', function (Blueprint $table) {
            $table->id();
            $table->integer('x');
            $table->integer('y');
            $table->string('directions')->nullable();
            $table->foreignIdFor(Building::class)->nullable();
            $table->foreignIdFor(Road::class)->nullable();
            $table->foreignIdFor(Map::class);
            $table->foreignIdFor(MapType::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('map_squares');
    }
    
}
