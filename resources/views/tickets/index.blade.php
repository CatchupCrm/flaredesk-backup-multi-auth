@extends('layouts.master')
@section('heading')
  <h1>All tickets</h1>
@stop

@section('content')
  <table class="table table-hover table-bordered table-striped" id="tickets-table">
    <thead>
    <tr>

      <th>Name</th>
      <th>Created at</th>
      <th>Deadline</th>
      <th>Assigned</th>

    </tr>
    </thead>
  </table>
@stop

@push('scripts')
<script>
  $(function () {
    $('#tickets-table').DataTable({
      processing: true,
      serverSide: true,
      "pageLength": 50,
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      ajax: '{!! route('tickets.data') !!}',
      columns: [
        {data: 'titlelink', name: 'title'},
        {data: 'created_at', name: 'created_at'},
        {data: 'deadline', name: 'deadline'},
        {data: 'fk_staff_id_assign', name: 'fk_staff_id_assign',},
      ]
    });
  });
</script>
@endpush