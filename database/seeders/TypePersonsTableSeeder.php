<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TypePersonsTableSeeder extends Seeder
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
            'description' => 'Cliente',
        ]);

        array_push($this->data, [
            'id' => 2,
            'description' => 'Funcionario',
        ]);

        foreach ($this->data as $key => $person) {

            DB::table('type_persons')->insert([
                'id' => $key,
                'description' => $person['description'],
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now')
            ]);
        }
    }
}
