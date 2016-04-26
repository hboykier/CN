<?php

use Illuminate\Database\Seeder;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('domains')->delete();
        DB::table('domains')->insert(array('code'=>'PAIS', 'name'=>'Pais de origen','created_at' => new DateTime,'updated_at' => new DateTime));
        DB::table('domains')->insert(array('code'=>'GRP_DEFAULT', 'name'=>'Grupo Default','created_at' => new DateTime,'updated_at' => new DateTime));

        for ($i=0; $i<50; $i++)
        {
            DB::table('domains')->insert(array('code' => $faker->regexify('[A-Z]{8,10}'),
                'name' => $faker->name,
                'description' => $faker->name,
                'multivalue' => $faker->boolean($chanceOfGettingTrue = 50),
                'created_at' => new DateTime,
                'updated_at' => new DateTime));
        }

    }
}
