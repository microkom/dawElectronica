<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('object');
            $table->string('name')->nullable();
            $table->string('brand');
            $table->string('model')->nullable();
            $table->text('description')->nullable();
            $table->text('specifications')->nullable();
            $table->float('price')->nullable();
            $table->unsignedInteger('categoryid');
            $table->unsignedInteger('subcategoryid');
            $table->unsignedInteger('providerid');
            $table->string('imgRoute')->nullable();
            $table->integer('stock')->nullable();
            $table->unsignedInteger('taxesid');
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
        Schema::dropIfExists('Products');
    }
}