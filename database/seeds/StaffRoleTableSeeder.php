<?php
use Illuminate\Database\Seeder;
use App\Models\RoleUser;

class StaffRoleTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $newrole = new RoleStaff;
    $newrole->role_id = '99';
    $newrole->user_id = '1';
    $newrole->timestamps = false;
    $newrole->save();
  }
}
