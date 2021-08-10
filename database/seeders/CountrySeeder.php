<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("countries")->truncate();
        $json = \File::get("database/data/countries.json");
        $datas = json_decode($json);

        foreach ($datas as $data) {

            $country = [
                "code"    =>  $data->codigo,
                "phone_code"      =>  $data->fone,
                "iso"       =>  $data->iso,
                "iso3"      =>  $data->iso3,
                "name"      =>  $data->nome,
                "formal_name"    =>  $data->nomeFormal
            ];

            Country::create($country);
        }
    }
}
