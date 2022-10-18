<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Building;
use App\Models\MapSquare;

class CreateBuildingSquareTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_square', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Building::class);
            $table->foreignIdFor(MapSquare::class);
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
        Schema::dropIfExists('building_square');
    }

}
