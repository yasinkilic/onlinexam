@extends('Admin.Master.Layout')
@section('content')
<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Sınav Listesi</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>$170,750</td>
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>$86,000</td>
                            </tr>
                            <tr>
                                <td>Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>$433,060</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->
<script type="text/javascript">
	$(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
      } );

</script>
<script src="{{url('assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{url('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{url('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{url('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{url('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{url('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{url('assets/js/init/datatables-init.js')}}"></script>
@endsection