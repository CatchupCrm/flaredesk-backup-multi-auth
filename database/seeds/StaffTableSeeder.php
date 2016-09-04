<?php
use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{

  /*
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    factory(Modules\Core\Models\Staff::class, 100)->create()->each(function ($c) {

    });
  }
}
