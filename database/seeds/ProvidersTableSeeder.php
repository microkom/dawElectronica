<?php

use Illuminate\Database\Seeder;
use App\Provider;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $providerArr = array(
        array(
            "id" => 1,
            "nif" => "11184393E",
            "email" => "breitenberg.destinee@example.org",
            "name" => "Dr. Weldon Predovic PhD",
            "country" => "Syrian Arab Republic"
        ),
        array(
            "id" => 2,
            "nif" => "37198629Q",
            "email" => "verla89@example.org",
            "name" => "Melody Howell",
            "country" => "Gabon"
        ),
        array(
            "id" => 3,
            "nif" => "70536775F",
            "email" => "jacobs.monroe@example.org",
            "name" => "Nettie Osinski",
            "country" => "San Marino"
        ),
        array(
            "id" => 4,
            "nif" => "74496174W",
            "email" => "hcarroll@example.net",
            "name" => "Julia Tillman Sr.",
            "country" => "Comoros"
        ),
        array(
            "id" => 5,
            "nif" => "70037944T",
            "email" => "caterina22@example.org",
            "name" => "Rudy Schumm",
            "country" => "Comoros"
        ),
        array(
            "id" => 6,
            "nif" => "37690779N",
            "email" => "hortense32@example.org",
            "name" => "Mr. Sheridan Beahan DVM",
            "country" => "Mauritius"
        ),
        array(
            "id" => 7,
            "nif" => "38532895Y",
            "email" => "destini.hyatt@example.com",
            "name" => "Prof. Jamie Kling II",
            "country" => "Pakistan"
        ),
        array(
            "id" => 8,
            "nif" => "47323139H",
            "email" => "whyatt@example.com",
            "name" => "Noah Kulas",
            "country" => "Liechtenstein"
        ),
        array(
            "id" => 9,
            "nif" => "46260982R",
            "email" => "hermiston.sophia@example.org",
            "name" => "Guillermo Wehner",
            "country" => "Serbia"
        ),
        array(
            "id" => 10,
            "nif" => "64529230Q",
            "email" => "angus63@example.net",
            "name" => "Maximillia Blick",
            "country" => "Djibouti"
        ),
        array(
            "id" => 11,
            "nif" => "38483735C",
            "email" => "everett.cartwright@example.com",
            "name" => "Shany Jenkins",
            "country" => "New Caledonia"
        ),
        array(
            "id" => 12,
            "nif" => "46733077K",
            "email" => "jamison48@example.net",
            "name" => "Prof. Beatrice Robel I",
            "country" => "French Southern Territories"
        ),
        array(
            "id" => 13,
            "nif" => "15257843B",
            "email" => "rwalter@example.com",
            "name" => "Candida Wolf",
            "country" => "Mayotte"
        ),
        array(
            "id" => 14,
            "nif" => "43927464V",
            "email" => "gharber@example.net",
            "name" => "Mr. Harry Dibbert IV",
            "country" => "Saint Barthelemy"
        ),
        array(
            "id" => 15,
            "nif" => "49970043J",
            "email" => "delfina04@example.com",
            "name" => "Prof. Robin Osinski I",
            "country" => "Puerto Rico"
        ),
        array(
            "id" => 16,
            "nif" => "59450574J",
            "email" => "dswift@example.com",
            "name" => "Alva Cormier",
            "country" => "Cook Islands"
        ),
        array(
            "id" => 17,
            "nif" => "40064119M",
            "email" => "sandy08@example.com",
            "name" => "Prof. Hadley Wyman I",
            "country" => "United States Minor Outlying Islands"
        ),
        array(
            "id" => 18,
            "nif" => "37550412Z",
            "email" => "leone54@example.org",
            "name" => "Prof. Jaclyn Kautzer",
            "country" => "Jordan"
        ),
        array(
            "id" => 19,
            "nif" => "23390744C",
            "email" => "zboncak.murray@example.com",
            "name" => "Dell Barton",
            "country" => "Cote d'Ivoire"
        ),
        array(
            "id" => 20,
            "nif" => "54868550A",
            "email" => "gprice@example.com",
            "name" => "Ethyl Koss",
            "country" => "Barbados"
        )
    );

    public function run() {
         Schema::disableForeignKeyConstraints();
        DB::table('providers')->truncate();

        foreach ($this->providerArr as $p) {
            $provider = new Provider();
            $provider->nif = $p['nif'];
            $provider->email = $p['email'];
            $provider->name = $p['name'];
            $provider->country = $p['country'];
            $provider->save();
        }
        Schema::enableForeignKeyConstraints();
    }

}
