<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderOrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_order_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('providerorderid');
            $table->unsignedInteger('productid');
            $table->float('price',5)->nullable();
            $table->integer('quantity')->nullable();
            $table->float('discount')->nullable();
            $table->float('taxApplied')->nullable();            
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
        Schema::dropIfExists('-provider_order_lines');
    }
}
