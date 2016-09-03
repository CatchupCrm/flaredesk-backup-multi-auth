<?php
use Illuminate\Database\Seeder;

class TicketsDummyTableSeeder extends Seeder
{

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {
    factory(App\Models\Ticket::class, 1750)->create()->each(function ($c) {

    });
  }
}
