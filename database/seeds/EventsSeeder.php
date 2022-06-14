<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Event;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create('App\Event');
      for($i = 1 ; $i <= 10 ; $i++){
        DB::table('events')->insert([
            'name' => $faker->name(),
            'slug' => $faker->unique()->domainWord(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
      }
    }
}