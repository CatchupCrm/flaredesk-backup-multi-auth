<?php
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {
    //\DB::table('users')->delete();


    \DB::table('users')->insert(array(
      0 =>
        array(
          'id' => '',
          'name' => 'Admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('admin123'),
          'remember_token' => null,
          'created_at' => '2016-06-04 13:42:19',
          'updated_at' => '2016-06-04 13:42:19',
        ),
    ));

    \DB::table('staff')->insert(array(
      0 =>
        array(
          'id' => '',
          'name' => 'Admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('admin123'),
          'remember_token' => null,
          'created_at' => '2016-06-04 13:42:19',
          'updated_at' => '2016-06-04 13:42:19',
        ),
    ));

  }
}
