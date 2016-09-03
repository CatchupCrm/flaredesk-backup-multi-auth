<?php
namespace Modules\Tickets\Models;

use Illuminate\Database\Eloquent\Model;

class TicketThread extends Model
{
  protected $table = 'ticket_threads';
  protected $fillable = [
    'id', 'pid', 'ticket_id', 'staff_id', 'user_id', 'thread_type', 'poster', 'source', 'is_internal', 'title', 'body', 'format', 'ip_address', 'created_at', 'updated_at',
  ];

  public function attach()
  {
    return $this->hasMany('Modules\Tickets\Models\TicketAttachment', 'thread_id');
  }

  public function delete()
  {
    $this->attach()->delete();
    parent::delete();
  }
}
