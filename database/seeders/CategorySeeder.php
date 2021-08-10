<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->truncate();

        $categories = [
            ['name' => 'Administração e Negócios'],
            ['name' => 'Animais'],
            ['name' => 'Artes e Música'],
            ['name' => 'Auto Ajuda e Similares'],
            ['name' => 'Beleza'],
            ['name' => 'Blogs e Redes Sociais'],
            ['name' => 'Casa, Jardinagem e Similares'],
            ['name' => 'Culinária e Gastronomia'],
            ['name' => 'Design de Templates'],
            ['name' => 'Edições Audivisuais'],
            ['name' => 'Esporte e Fitness'],
            ['name' => 'Educacional Profissionalizante'],
            ['name' => 'Entretenimento e Diversão'],
            ['name' => 'Informática'],
            ['name' => 'Idiomas'],
            ['name' => 'Internet Marketing'],
            ['name' => 'Investimento e Finanças'],
            ['name' => 'Jurídico'],
            ['name' => 'Marketing de Rede'],
            ['name' => 'Moda e Vestuário'],
            ['name' => 'Paquera e Relacionamentos'],
            ['name' => 'Plugins, Widgets e Similares'],
            ['name' => 'Produtos Infantis'],
            ['name' => 'Religiões e crenças'],
            ['name' => 'Saúde'],
            ['name' => 'Turismo'],
            ['name' => 'Sexologia e Sexualidade'],
            ['name' => 'Outros Segmentos']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
