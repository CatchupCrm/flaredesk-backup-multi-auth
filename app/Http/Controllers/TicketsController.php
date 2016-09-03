<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Relation;
use Illuminate\Http\Request;
use Gate;
use App\Models\TicketTime;
use Datatables;
use Carbon;
use App\Dinero;
use App\Billy;
use App\Models\Integration;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Requests\Ticket\UpdateTimeTicketRequest;
use App\Services\Ticket\TicketServiceContract;
use App\Services\User\UserServiceContract;
use App\Services\Relation\RelationServiceContract;
use App\Services\Setting\SettingServiceContract;
use App\Services\Invoice\InvoiceServiceContract;

class TicketsController extends Controller
{

  protected $request;
  protected $tickets;
  protected $relations;
  protected $settings;
  protected $users;
  protected $invoices;

  public function __construct(
    TicketServiceContract $tickets,
    UserServiceContract $users,
    RelationServiceContract $relations,
    InvoiceServiceContract $invoices,
    SettingServiceContract $settings
  )
  {
    $this->tickets = $tickets;
    $this->users = $users;
    $this->relations = $relations;
    $this->invoices = $invoices;
    $this->settings = $settings;
    $this->middleware('ticket.create', ['only' => ['create']]);
    $this->middleware('ticket.update.status', ['only' => ['updateStatus']]);
    $this->middleware('ticket.assigned', ['only' => ['updateAssign', 'updateTime']]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return view('tickets.index');
  }

  public function anyData()
  {
    $tickets = Ticket::select(
      ['id', 'title', 'created_at', 'deadline', 'fk_staff_id_assign']
    )
      ->where('status', 1)->get();
    return Datatables::of($tickets)
      ->addColumn('titlelink', function ($tickets) {
        return '<a href="tickets/' . $tickets->id . '" ">' . $tickets->title . '</a>';
      })
      ->editColumn('created_at', function ($tickets) {
        return $tickets->created_at ? with(new Carbon($tickets->created_at))
          ->format('d/m/Y') : '';
      })
      ->editColumn('deadline', function ($tickets) {
        return $tickets->created_at ? with(new Carbon($tickets->created_at))
          ->format('d/m/Y') : '';
      })
      ->editColumn('fk_staff_id_assign', function ($tickets) {
        return $tickets->assignee->name;
      })->make(true);
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('tickets.create')
      ->withUsers($this->users->getAllUsersWithDepartments())
      ->withRelations($this->relations->listAllRelations());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreTicketRequest $request) // uses __contrust request
  {
    $getInsertedId = $this->tickets->create($request);
    return redirect()->route("tickets.show", $getInsertedId);
  }


  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return Response
   */
  public function show(Request $request, $id)
  {
    $integrationCheck = Integration::first();
    if ($integrationCheck) {
      $api = Integration::getApi('billing');
      $apiConnected = true;
      $invoiceContacts = $api->getContacts();
    } else {
      $apiConnected = false;
      $invoiceContacts = array();
    }
    return view('tickets.show')
      ->withTickets($this->tickets->find($id))
      ->withUsers($this->users->getAllUsersWithDepartments())
      ->withContacts($invoiceContacts)
      ->withTickettimes($this->tickets->getTicketTime($id))
      ->withCompanyname($this->settings->getCompanyName())
      ->withApiconnected($apiConnected);
  }


  /**
   * Sees if the Settings from backend allows all to complete taks
   * or only assigned user. if only assigned user:
   * @param  [Auth]  $id Checks Logged in users id
   * @param  [Model] $ticket->fk_staff_id_assign Checks the id of the user assigned to the ticket
   * If Auth and fk_staff_id allow complete else redirect back if all allowed excute
   * else stmt*/
  public function updateStatus($id, Request $request)
  {
    $this->tickets->updateStatus($id, $request);
    Session()->flash('flash_message', 'Ticket is completed');
    return redirect()->back();
  }


  public function updateAssign($id, Request $request)
  {
    $relationId = $this->tickets->getAssignedRelation($id)->id;
    $this->tickets->updateAssign($id, $request);
    Session()->flash('flash_message', 'New user is assigned');
    return redirect()->back();
  }

  public function updateTime($id, Request $request)
  {
    $this->tickets->updateTime($id, $request);
    Session()->flash('flash_message', 'Time has been updated');
    return redirect()->back();
  }

  public function invoice($id, Request $request)
  {
    $ticket = Ticket::findOrFail($id);
    $relationId = $ticket->relationAssignee()->first()->id;
    $timeTicketId = $ticket->allTime()->get();
    $integrationCheck = Integration::first();
    if ($integrationCheck) {
      $this->tickets->invoice($id, $request);
    }
    $this->invoices->create($relationId, $timeTicketId, $request->all());
    Session()->flash('flash_message', 'Invoice created');
    return redirect()->back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   * @return Response
   */
  public function marked()
  {
    Notifynder::readAll(\Auth::id());
    return redirect()->back();
  }
}
