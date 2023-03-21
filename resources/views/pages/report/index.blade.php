@extends('layouts.app')
@section('content')
  <div class="container-fluid py-3">
    <h4>Report shops in Cambodia.</h4>
    <h5>Information covid vaccination</h5>
    <div class="row my-3">
      <div class="col-md-12">
      <div class="card">
      <div class="card-body">
        <table id="report-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th rowspan="2" style="width: 5%">#</th>
              <th rowspan="2">Province</th>
              <th rowspan="2" style="width: 15%"># of Doses</th>
              <th rowspan="2" style="width: 15%" class="text-center">Visitor Count</th>
              <th class="text-center" colspan="2">Card Type</th>
            </tr>
            <tr>
              <th class="text-center">MOH</th>
              <th class="text-center">MOD</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>
      </div>
    </div>
  </div>
@push('scripts')
<script>
  $(function () {
    $('#report-table').DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "processing": true,
      "serverSide": true,
      ajax: {
        url: '/getReport',
      },
      columns: [
        { data: 'id' },
        { data: 'name' },
        { data: 'max' },
        { data: 'customers_count' },
        { data: 'MOH' },
        { data: 'MOD' },
      ],
      dom: 'Bfrtip',
      "buttons": ["csv", "excel", "pdf", "print"],
    }).buttons().container().prependTo('.dataTables_filter');
  });
</script>
@endpush
@endsection