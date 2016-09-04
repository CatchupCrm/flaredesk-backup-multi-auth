<?php
namespace Modules\Tickets\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentTaggable\Taggable;
use Carbon;

class Ticket extends Model
{
  use Sluggable, Taggable;

  protected $table = 'tickets';

  protected $fillable = [
    'title',
    'description',
    'status',
    'staff_id',
    'fk_staff_id_created',
    'fk_relation_id',
    'deadline'
  ];
  protected $dates = ['deadline'];

  protected $hidden = ['remember_token'];

  public function assignee()
  {
    return $this->belongsTo(Staff::class, 'fk_staff_id_assign');
  }

  public function relationAssignee()
  {
    return $this->belongsTo(Relation::class, 'fk_relation_id');
  }

  public function ticketCreator()
  {
    return $this->belongsTo(Staff::class, 'fk_staff_id_created');
  }

  public function thread()
  {
    return $this->hasMany(TicketThread::class, 'ticket_id', 'id');
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
