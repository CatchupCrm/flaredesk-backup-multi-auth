<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketTime extends Model
{
  protected $fillable = [
    'time',
    'overtime',
    'fk_ticket_id',
    'title',
    'comment',
    'value'
  ];

  protected $hidden = ['remember_token'];

  protected $table = 'tickets_time';

  public function tickets()
  {
    return $this->belongsTo(Tickets::class);
  }

  public function invoices()
  {
    return $this->belongsToMany(Invoice::class);
  }
}
