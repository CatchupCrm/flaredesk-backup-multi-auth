<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Ticket extends Model
{
  protected $fillable = [
    'title',
    'description',
    'status_id',
    'assigned_to_staff_id',
    'fk_staff_id_created',
    'fk_relation_id',
    'deadline'
  ];
  protected $dates = ['deadline'];

  protected $hidden = ['remember_token'];

  public function assignee()
  {
    return $this->belongsTo(User::class, 'assigned_to_staff_id');
  }

  public function relationAssignee()
  {
    return $this->belongsTo(Relation::class, 'fk_relation_id');
  }

  public function ticketCreator()
  {
    return $this->belongsTo(User::class, 'fk_staff_id_created');
  }

  public function comments()
  {
    return $this->hasMany(Comment::class, 'fk_ticket_id', 'id');
  }

  // create a virtual attribute to return the days until deadline
  public function getDaysUntilDeadlineAttribute()
  {
    return Carbon\Carbon::now()
      ->startOfDay()
      ->diffInDays($this->deadline, false); // if you are past your deadline, the value returned will be negative.
  }

  public function settings()
  {
    return $this->hasMany(Settings::class);
  }

  public function time()
  {
    return $this->hasOne(TicketTime::class, 'fk_ticket_id', 'id');
  }

  public function allTime()
  {
    return $this->hasMany(TicketTime::class, 'fk_ticket_id', 'id');
  }

  public function activity()
  {
    return $this->hasMany(Activity::class, 'type_id', 'id')->where('type', 'ticket');
  }
}
