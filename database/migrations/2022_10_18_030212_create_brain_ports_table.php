<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\BrainType;

class CreateBrainPortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brain_ports', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->enum('function', ['Input','Output','Input/Output'])->default('Input');
            $table->foreignIdFor(BrainType::class)->nullable();
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
        Schema::dropIfExists('brain_ports');
    }
}
