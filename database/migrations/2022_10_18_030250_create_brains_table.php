<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Hub;
use App\Models\Map;

class CreateBrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brains', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('ip')->nullable();
            $table->string('key');
            $table->foreignIdFor(Hub::class);
            $table->foreignIdFor(Map::class);
            $table->timestamps();
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
        Schema::dropIfExists('brains');
    }
}
