<?php
use Illuminate\Database\Seeder;

class RelationsDummyTableSeeder extends Seeder
{

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {
    factory(App\Models\Relation::class, 5000)->create()->each(function ($c) {

    });
  }
}
