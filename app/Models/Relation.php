<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{

  protected $fillable = [
    'name',
    'company_name',
    'vat',
    'email',
    'address',
    'zipcode',
    'city',
    'primary_number',
    'secondary_number',
    'industry_id',
    'company_type',
    'fk_staff_id'];

  public function userAssignee()
  {
    return $this->belongsTo(User::class, 'fk_staff_id', 'id');
  }

  public function alltickets()
  {
    return $this->hasMany(Ticket::class, 'fk_relation_id', 'id')
      ->orderBy('status', 'asc')
      ->orderBy('created_at', 'desc');
  }

  public function allleads()
  {
    return $this->hasMany(Lead::class, 'fk_relation_id', 'id')
      ->orderBy('status', 'asc')
      ->orderBy('created_at', 'desc');
  }

  public function tickets()
  {
    return $this->hasMany(Ticket::class, 'fk_relation_id', 'id');
  }

  public function leads()
  {
    return $this->hasMany(Ticket::class, 'fk_relation_id', 'id');
  }

  public function documents()
  {
    return $this->hasMany(Document::class, 'fk_relation_id', 'id');
  }

  public function invoices()
  {
    return $this->belongsToMany(Invoice::class);
  }
}
