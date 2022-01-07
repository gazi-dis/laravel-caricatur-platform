<?php

use Illuminate\Database\Seeder;

class settingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'option' => 'Başlık',
                'slug' => 'title',
                'value' => 'Portfolio',
            ],
            [
                'option' => 'Logo',
                'slug' => 'logo',
                'value' => 'logo.png',
            ],
            [
                'option' => 'Facebook Link',
                'slug' => 'face-link',
                'value' => 'https://facebook.com',
            ],
            [
                'option' => 'İnstagram Link',
                'slug' => 'ig-link',
                'value' => 'https://instagram.com',
            ],
            [
                'option' => 'Twitter Link',
                'slug' => 'twitter-link',
                'value' => 'https://twitter.com',
            ],
            [
                'option' => 'Favicon Dosyası',
                'slug' => 'favicon',
                'value' => 'favicon.png',
            ],
            [
                'option' => 'E Posta',
                'slug' => 'email',
                'value' => 'example@mail.com',
            ],
            [
                'option' => 'Telefon',
                'slug' => 'phone',
                'value' => '05410000000',
            ],
            [
                'option' => 'Adres',
                'slug' => 'adress',
                'value' => 'Lorem İpsum Street USA',
            ],
            [
                'option' => 'Hakkımda Açıklama',
                'slug' => 'contact-info',
                'value' => 'Lorem ipsum dolor sit amet, conse adipisicing elit libero incidunt quod.',
            ],
        ]);
    }
}
