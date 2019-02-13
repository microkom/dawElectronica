<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up() {
        Schema::table('subcategories', function (Blueprint $table) {
            $table->foreign('categoryid')->references('id')->on('categories');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('userid')->references('id')->on('users');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('categoryid')->references('id')->on('categories');
            $table->foreign('subcategoryid')->references('id')->on('subcategories');
            $table->foreign('providerid')->references('id')->on('providers');
            $table->foreign('taxesid')->references('id')->on('taxes');
        });

        Schema::table('order_lines', function (Blueprint $table) {
            $table->foreign('orderid')->references('id')->on('orders');
            $table->foreign('productid')->references('id')->on('products');
        });

        Schema::table('provider_orders', function (Blueprint $table) {
            $table->foreign('providerid')->references('id')->on('providers');
        });

        Schema::table('provider_order_lines', function (Blueprint $table) {
            $table->foreign('providerorderid')->references('id')->on('provider_orders');
            $table->foreign('productid')->references('id')->on('products');
        });

        Schema::table('favourites', function (Blueprint $table) {
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('productid')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::table('subcategories', function (Blueprint $table) {
            $table->dropForeign('subcategories_categoryid_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_userid_foreign');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_categoryid_foreign');
            $table->dropForeign('products_subcategoryid_foreign');
            $table->dropForeign('products_providerid_foreign');
            $table->dropForeign('products_taxesid_foreign');
        });

        Schema::table('order_lines', function (Blueprint $table) {
            $table->dropForeign('order_lines_orderid_foreign');
            $table->dropForeign('order_lines_productid_foreign');
        });

        Schema::table('provider_orders', function (Blueprint $table) {
            $table->dropForeign('provider_orders_providerid_foreign');
        });

        Schema::table('provider_order_lines', function (Blueprint $table) {
            $table->dropForeign('provider_order_lines_providerorderid_foreign');
            $table->dropForeign('provider_order_lines_productid_foreign');
        });

        Schema::table('favourites', function (Blueprint $table) {
            $table->dropForeign('favourites_userid_foreign');
            $table->dropForeign('favourites_productid_foreign');
        });
    }
}
