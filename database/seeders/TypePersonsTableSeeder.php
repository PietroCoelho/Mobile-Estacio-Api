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
            'id' => 2,
            'description' => 'Funcionario',
        ]);

        foreach ($this->data as $key => $typePerson) {

            DB::table('type_persons')->insert([
                'id' => $typePerson['id'],
                'description' => $typePerson['description'],
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now')
            ]);
        }
    }
}
