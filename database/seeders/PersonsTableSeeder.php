<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PersonsTableSeeder extends Seeder
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
            'type_person_id' => 1,
            'name' => 'Pietro Coelho',
            'surname' => 'Super Choque',
            'date_birth' => new DateTime('now'),
            'gender' => 'M',
            'cpf' => '12345678910',
            'rg' => '1234567',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]);

        foreach ($this->data as $key => $person) {
            $key += 1;
            
            DB::table('type_persons')->insert([
                'id' => 1,
                'description' => 'Cliente',
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now')
            ]);

            DB::table('persons')->insert([
                'id' => $key,
                'type_person_id' => $key,
                'name' => $person['name'],
                'surname' => $person['surname'],
                'date_birth' => $person['date_birth'],
                'gender' => $person['gender'],
                'cpf' => $person['cpf'],
                'rg' => $person['rg'],
                'created_at' => $person['created_at'],
                'updated_at' => $person['updated_at']
            ]);
        }
    }
}
