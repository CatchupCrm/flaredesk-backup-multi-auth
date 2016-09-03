<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\Ticket\TicketServiceContract;

class TicketHeaderComposer
{
  /**
   * The ticket repository implementation.
   *
   * @var ticketService
   */
  protected $tickets;

  /**
   * Create a new profile composer.
   *
   * @param  ticketService $tickets
   * @return void
   */
  public function __construct(TicketServiceContract $tickets)
  {
    $this->tickets = $tickets;
  }

  /**
   * Bind data to the view.
   *
   * @param  View $view
   * @return void
   */
  public function compose(View $view)
  {
    $tickets = $this->tickets->find($view->getData()['tickets']['id']);
    /**
     * [User assigned the ticket]
     * @var contact
     */
    $contact = $tickets->assignee;
    $relation = $tickets->relationAssignee;
    $view->with('contact', $contact);
    $view->with('relation', $relation);
  }
}
