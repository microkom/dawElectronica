<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        $category = new Category();
        $category->name = 'informatica';
        $category->save();

        $category = new Category();
        $category->name = 'fotografia';
        $category->save();

        $category = new Category();
        $category->name = 'telefonia';
        $category->save();

        $category = new Category();
        $category->name = 'ocio';
        $category->save();

        $category = new Category();
        $category->name = 'television';
        $category->save();

        $category = new Category();
        $category->name = 'accesorios';
        $category->save();
        
        Schema::enableForeignKeyConstraints();
        /*$this->call(CategoryTableSeeder::class);*/

    }
}
