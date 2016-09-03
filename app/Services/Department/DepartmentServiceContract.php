<?php
namespace Modules\Core\Department;
interface DepartmentServiceContract
{

  public function getAllDepartments();

  public function listAllDepartments();

  public function create($requestData);

  public function destroy($id);
}
