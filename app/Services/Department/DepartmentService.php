<?php
namespace Modules\Core\Department;

use App\Models\Department;

class DepartmentService implements DepartmentServiceContract
{

  public function getAllDepartments()
  {
    return Department::all();
  }

  public function listAllDepartments()
  {
    return Department::pluck('name', 'id');
  }

  public function create($requestData)
  {
    Department::create($requestData->all());
  }

  public function destroy($id)
  {
    Department::findorFail($id)->delete();
  }
}
