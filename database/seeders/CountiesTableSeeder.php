<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;

class CountiesTableSeeder extends Seeder
{
    public function run()
    {
        $counties = [
            [
                'id' => 1,
                'name' => 'Mombasa',
                'county_code' => 001,
                'capital' => 'Monbasa City'
            ], [
                'id' => 2,
                'name' => 'Kwale',
                'county_code' => 002,
                'capital' => 'Kwale'
            ], [
                'id' => 3,
                'name' => 'Kilifi',
                'county_code' => 003,
                'capital' => 'Kilifi'
            ], [
                'id' => 4,
                'name' => 'Tana River',
                'county_code' => 004,
                'capital' => 'Hola'

            ], [
                'id' => 5,
                'name' => 'Lamu',
                'county_code' => 005,
                'capital' => 'Lamu'
            ], [
                'id' => 6,
                'name' => 'Taita-Taveta',
                'county_code' => 006,
                'capital' => 'Voi'
            ], /*[
                'name' => 'Garissa',
                'county_code' => 7,
                'capital' => 'Garissa'
            ], [
                'name' => 'Wajir',
                'county_code' => 8,
                'capital' => 'Wajir'
            ], [
                'name' => 'Mandera',
                'county_code' => 9,
                'capital' => 'Mandera'
            ], [
                'name' => 'Marsabit',
                'county_code' => 10,
                'capital' => 'Marsabit'
            ], [
                'name' => 'Isiolo',
                'county_code' => 11,
                'capital' => 'Isiolo'
            ], [
                'name' => 'Meru',
                'county_code' => 12,
                'capital' => 'Meru'
            ], [
                'name' => 'Tharaka-Nithi',
                'county_code' => 13,
                'capital' => 'Chuka'
            ], [
                'name' => 'Embu',
                'county_code' => 14,
                'capital' => 'Embu'
            ], [
                'name' => 'Kitui',
                'county_code' => 15,
                'capital' => 'Kitui'
            ], [
                'name' => 'Machakos',
                'county_code' => 16,
                'capital' => 'Machakos'
            ], [
                'name' => 'Makueni',
                'county_code' => 17,
                'capital' => 'Wote'
            ], [
                'name' => 'Nyandarua',
                'county_code' => 18,
                'capital' => 'Ol Kalou'
            ], [
                'name' => 'Nyeri',
                'county_code' => 19,
                'capital' => 'Nyeri'
            ], [
                'name' => 'Kirinyaga',
                'county_code' => 20,
                'capital' => 'Kerugoya/Kutus'
            ], [
                'name' => 'Murang\'a',
                'county_code' => 21,
                'capital' => 'Murang\'a'
            ], [
                'name' => 'Kiambu',
                'county_code' => 22,
                'capital' => 'Kiambu'
            ], [
                'name' => 'Turkana',
                'county_code' => 23,
                'capital' => 'Lodwar'
            ], [
                'name' => 'West Pokot',
                'county_code' => 24,
                'capital' => 'Kapenguria'
            ], [
                'name' => 'Samburu',
                'county_code' => 25,
                'capital' => 'Maralal'
            ], [
                'name' => 'Trans-Nzoia',
                'county_code' => 26,
                'capital' => 'Kitale'
            ], [
                'name' => 'Uasin Gishu',
                'county_code' => 27,
                'capital' => 'Eldoret'
            ], [
                'name' => 'Elgeyo-Marakwet',
                'county_code' => 28,
                'capital' => 'Iten'
            ], [
                'name' => 'Nandi',
                'county_code' => 29,
                'capital' => 'Kapsabet'
            ], [
                'name' => 'Baringo',
                'county_code' => 30,
                'capital' => 'Kabarnet'
            ], [
                'name' => 'Laikipia',
                'county_code' => 31,
                'capital' => 'Rumuruti'
            ], [
                'name' => 'Nakuru',
                'county_code' => 32,
                'capital' => 'Nakuru'
            ], [
                'name' => 'Narok',
                'county_code' => 33,
                'capital' => 'Narok'
            ], [
                'name' => 'Kajiado',
                'county_code' => 34
            ], [
                'name' => 'Kericho',
                'county_code' => 35,
                'capital' => 'Kericho'
            ], [
                'name' => 'Bomet',
                'county_code' => 36,
                'capital' => 'Bomet'
            ], [
                'name' => 'Kakamega',
                'county_code' => 37,
                'capital' => 'Kakamega'
            ], [
                'name' => 'Vihiga',
                'county_code' => 38,
                'capital' => 'Vihiga'
            ], [
                'name' => 'Bungoma',
                'county_code' => 39,
                'capital' => 'Bungoma'
            ], [
                'name' => 'Busia',
                'county_code' => 40,
                'capital' => 'Busia'
            ], [
                'name' => 'Siaya',
                'county_code' => 41,
                'capital' => 'Siaya'
            ], [
                'name' => 'Kisumu',
                'county_code' => 42,
                'capital' => 'Kisumu'
            ], [
                'name' => 'Homa Bay',
                'county_code' => 43,
                'capital' => 'Homa Bay'
            ], [
                'name' => 'Migori',
                'county_code' => 44,
                'capital' => 'Migori'
            ], [
                'name' => 'Kisii',
                'county_code' => 45,
                'capital' => 'Kisii'
            ], [
                'name' => 'Nyamira',
                'county_code' => 46,
                'capital' => 'Nyamira'
            ], [
                'name' => 'Nairobi',
                'county_code' => 47,
                'capital' => 'Nairobi City'
            ]*/];

        County::insert($counties);
    }
}
