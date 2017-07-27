<?php

use App\Ayar;
use Illuminate\Database\Seeder;

class AyarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ayar::create([
            "name"=>"baslik",
            "value"=>"Yazılım Evi"
        ]);
        Ayar::create([
            "name"=>"author",
            "value"=>"Murathan Akdemir"
        ]);
        Ayar::create([
            "name"=>"description",
            "value"=>"Talk is cheap, show your code!"
        ]);
        Ayar::create([
            "name"=>"keywords",
            "value"=>"yazılım,php,laravel,blog"
        ]);
        Ayar::create([
            "name"=>"facebook",
            "value"=>"https://www.facebook.com/murathan.akdemir.1"
        ]);
        Ayar::create([
            "name"=>"twitter",
            "value"=>"https://twitter.com/MurattHaann"
        ]);
        Ayar::create([
            "name"=>"github",
            "value"=>"https://github.com/"
        ]);

    }
}
