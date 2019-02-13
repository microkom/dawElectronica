<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up() {
        Schema::create('provider_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('providerid');
            $table->string('date');
            $table->float('total')->nullable();
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
        Schema::dropIfExists('-provider_orders');
    }
}
