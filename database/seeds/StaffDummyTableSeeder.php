<?php
use Illuminate\Database\Seeder;
use Modules\Core\Models\Department;
use Modules\Core\Models\RoleStaff;

class StaffDummyTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(Modules\Core\Models\Staff::class, 10)->create()->each(function ($c) {

    });
    $createDep = new Department;
    $createDep->id = '1';
    $createDep->name = 'Operations';
    $createDep->save();
    $createDep = new Department;
    $createDep->id = '2';
    $createDep->name = 'Support';
    $createDep->save();
    $createDep->id = '3';
    $createDep->name = 'Sales';
    $createDep->save();
    $createDep->id = '4';
    $createDep->name = 'Implementation';
    $createDep->save();
    $createDep->id = '5';
    $createDep->name = 'Development';
    $createDep->save();
    $createDep->id = '6';
    $createDep->name = 'First Line Support';
    $createDep->save();
    $createDep->id = '7';
    $createDep->name = 'Second Line Support';
    /*
     *  Management was already created in StaffRoleTableSeeder
     **/
    /*$createDep->id = '99';
    $createDep->name = 'Management';
    $createDep->save();*/

    $newrole = new RoleStaff;
    $newrole->role_id = '1';
    $newrole->staff_id = '1';
    $newrole->timestamps = false;
    $newrole->save();
    $newrole = new RoleStaff;
    $newrole->role_id = '2';
    $newrole->staff_id = '2';
    $newrole->timestamps = false;
    $newrole->save();
    $newrole = new RoleStaff;
    $newrole->role_id = '3';
    $newrole->staff_id = '3';
    $newrole->timestamps = false;
    $newrole->save();
    $newrole = new RoleStaff;
    $newrole->role_id = '4';
    $newrole->staff_id = '4';
    $newrole->timestamps = false;
    $newrole->save();
    $newrole = new RoleStaff;
    $newrole->role_id = '5';
    $newrole->staff_id = '5';
    $newrole->timestamps = false;
    $newrole->save();


    $newrole = new RoleStaff;
    $newrole->role_id = '1';
    $newrole->staff_id = '6';
    $newrole->timestamps = false;
    $newrole->save();
    $newrole = new RoleStaff;
    $newrole->role_id = '2';
    $newrole->staff_id = '7';
    $newrole->timestamps = false;
    $newrole->save();
    $newrole = new RoleStaff;
    $newrole->role_id = '3';
    $newrole->staff_id = '8';
    $newrole->timestamps = false;
    $newrole->save();
    $newrole = new RoleStaff;
    $newrole->role_id = '4';
    $newrole->staff_id = '9';
    $newrole->timestamps = false;
    $newrole->save();
    $newrole = new RoleStaff;
    $newrole->role_id = '5';
    $newrole->staff_id = '10';
    $newrole->timestamps = false;
    $newrole->save();

    \DB::table('department_staff')->insert([
      ['department_id' => 1,
        'staff_id' => 1],
      ['department_id' => 2,
        'staff_id' => 2],
      ['department_id' => 3,
        'staff_id' => 3],
      ['department_id' => 4,
        'staff_id' => 4],
      ['department_id' => 5,
        'staff_id' => 5],
      ['department_id' => 1,
        'staff_id' => 6],
      ['department_id' => 2,
        'staff_id' => 7],
      ['department_id' => 3,
        'staff_id' => 8],
      ['department_id' => 4,
        'staff_id' => 9],
      ['department_id' => 5,
        'staff_id' => 10]
    ]);
  }
}
