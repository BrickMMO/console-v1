<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Building;
use App\Models\Map;
use App\Models\MapType;

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
            $table->string('directions')->default('');
            $table->foreignIdFor(Building::class)->nullable();
            $table->foreignIdFor(Map::class)->nullable();
            $table->foreignIdFor(MapType::class)->nullable();
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
