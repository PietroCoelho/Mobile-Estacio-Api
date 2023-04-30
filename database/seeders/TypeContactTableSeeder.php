<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TypeContactTableSeeder extends Seeder
{
    protected array $data = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        array_push($this->data, [
            'id' => 1,
            'description' => 'Endereço',
        ]);
        array_push($this->data, [
            'id' => 2,
            'description' => 'Telefone',
        ]);
        array_push($this->data, [
            'id' => 3,
            'description' => 'Email',
        ]);
        array_push($this->data, [
            'id' => 4,
            'description' => 'Whatsapp',
        ]);

        foreach ($this->data as $typePerson) {

            DB::table('type_persons')->insert([
                'id' => $typePerson['id'],
                'description' => $typePerson['description'],
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now')
            ]);
        }
    }
}
