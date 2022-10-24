<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Brain;
use App\Models\HubFunction;
use App\Models\HubPort;

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
            $table->string('json')->nullable();
            $table->string('settings')->nullable();
            $table->foreignIdFor(Brain::class);
            $table->foreignIdFor(HubPort::class);
            $table->foreignIdFor(HubFunction::class)->nullable();
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
