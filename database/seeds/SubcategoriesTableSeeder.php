<?php
use App\Subcategory;
use Illuminate\Database\Seeder;
class SubcategoriesTableSeeder extends Seeder
{
    private $arraySubcategorias = array(
        array(
            'name' => 'Portatiles',            
            'categoryid' => 1,
        ),
        array(
            'name' => 'Sobremesa',            
            'categoryid' => 1,
        ),
        array(
            'name' => 'Tablets',            
            'categoryid' => 1
        ),
        array(
            'name' => 'Perifericos',
            'categoryid' => 1,
        ),
        array(
            'name' => 'Reflex',            
            'categoryid' => 2,
        ),
        array(
            'name' => 'Evil',
            'categoryid' => 2,
        ),
        array(
            'name' => 'Objetivos',          
            'categoryid' => 2,
        ),
        array(
            'name' => 'Deportivas',            
            'categoryid' => 2,
        ),
        array(
            'name' => 'Smartphones',            
            'categoryid' => 3,
        ),
        array(
            'name' => 'Smartwatches',            
            'categoryid' => 3,
        ),
        array(
            'name' => 'Telefonia domestica',            
            'categoryid' => 3,
        ),
        array(
            'name' => 'Videojuegos',            
            'categoryid' => 4,
        ),
        array(
            'name' => 'Consolas',            
            'categoryid' => 4,
        ),
        array(
            'name' => 'Televisores',            
            'categoryid' => 5,
        ),
        array(
            'name' => 'Proyectores',            
            'categoryid' => 5,
        ),
        array(
            'name' => 'Cables',            
            'categoryid' => 6,
        ),
        array(
            'name' => 'Cargadores',            
            'categoryid' => 6,
        ),
        array(
            'name' => 'Audio',            
            'categoryid' => 6,
        ),
        array(
            'name' => 'Video',            
            'categoryid' => 6,
        ),
        array(
            'name' => 'Baterias',            
            'categoryid' => 6,
        ),
    );
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('subcategories')->truncate();
        foreach ($this->arraySubcategorias as $subcategoria) {
            $subcategory = new Subcategory();
            $subcategory->name = $subcategoria['name'];
            $subcategory->categoryid = $subcategoria['categoryid'];
            $subcategory->save();
        }
        Schema::enableForeignKeyConstraints();
    }
}