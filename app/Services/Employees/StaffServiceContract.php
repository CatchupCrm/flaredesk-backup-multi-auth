<?php
namespace App\Services\Employee;
interface StaffServiceContract
{

  public function find($id);

  public function getAllEmployees();

  public function getAllEmployeesWithDepartments();

  public function create($requestData);

  public function update($id, $requestData);

  public function destroy($id);
}
