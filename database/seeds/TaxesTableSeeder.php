<?php

use Illuminate\Database\Seeder;
use App\Taxes;
class TaxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('Taxes')->truncate();
        $tax = new Taxes();
        $tax->value = '0';
        $tax->name = 'Cero';
        $tax->save();

        $tax = new Taxes();
        $tax->value = '4';
        $tax->name = 'Reducido';
        $tax->save();

        $tax = new Taxes();
        $tax->value = '10';
        $tax->name = 'Bajo';
        $tax->save();

        $tax = new Taxes();
        $tax->value = '21';
        $tax->name = 'Normal';
        $tax->save();
        Schema::enableForeignKeyConstraints();
    }

}
