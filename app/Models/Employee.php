<?php
namespace App\Models;

use Fenos\Notifynder\Notifable;
use Illuminate\Notifications\Notifiable;
use Cache;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{

  use Notifiable, EntrustUserTrait;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'staff';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'email', 'password', 'address', 'personal_number', 'work_number', 'image_path'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $dates = ['trial_ends_at', 'subscription_ends_at'];
  protected $hidden = ['password', 'password_confirmation', 'remember_token'];


  protected $primaryKey = 'id';

  public function ticketsAssign()
  {
    return $this->hasMany(Tickets::class, 'fk_user_id_assign', 'id')
      ->where('status', 1)
      ->orderBy('deadline', 'asc');
  }

  public function ticketsCreated()
  {
    return $this->hasMany(Tickets::class, 'fk_user_id_created', 'id')->limit(10);
  }

  public function ticketsCompleted()
  {
    return $this->hasMany(Tickets::class, 'fk_user_id_assign', 'id')->where('status', 2);
  }

  public function ticketsAll()
  {
    return $this->hasMany(Tickets::class, 'fk_user_id_assign', 'id')->whereIn('status', [1, 2]);
  }

  public function leadsAll()
  {
    return $this->hasMany(Leads::class, 'fk_user_id', 'id');
  }

  public function settings()
  {
    return $this->belongsTo(Settings::class);
  }

  public function relationsAssign()
  {
    return $this->hasMany(Relation::class, 'fk_user_id', 'id');
  }

  public function userRole()
  {
    return $this->hasOne(RoleUser::class, 'user_id', 'id');
  }

  public function department()
  {
    return $this->belongsToMany(Department::class, 'department_user');
  }

  public function departmentOne()
  {
    return $this->belongsToMany(Department::class, 'department_user')->withPivot('Department_id');
  }

  public function isOnline()
  {
    return Cache::has('user-is-online-' . $this->id);
  }
}
