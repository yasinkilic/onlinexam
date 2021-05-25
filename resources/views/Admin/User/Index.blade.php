@extends('Admin.Master.Layout')
@section('title','Müşteri Listesi')
@section('content')
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Müşteriler<a href="{{ route('admin.user.create') }}"><i class="fas fa-plus-circle float-right"></i></a></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" border="0" class="table table-hover">
                        <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th>İsim</th>
                                <th>Email</th>
                                <th width="20%">İşlemler</th>
                                
                            </tr>
                        </thead>

                    </table>
                </div>
            
            </div>
          </div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function() {
    var table = $('#myTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "orderCellsTop": true,
        "fixedHeader": true,
        "sDom": 'lrtip',
        "language": {
        "url":"{{ asset('datatablelang.json') }}"
         },
        "ajax": "{{ route('admin.user.userlist') }}",
        "columns": [
            { "data": "user_id" },
            { "data": "name" },
            { "data": "email" },
            { "data": "İşlemler" }


        ]
    } );
    $('#myTable thead tr').clone(true).appendTo( '#myTable thead' );
    $('#myTable thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
            if($(this).text()!='İşlemler')
            {
                $(this).html( '<input type="text" placeholder="Ara: '+title+'" />' );
         
                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            }
    } );
 
} );
</script>
@endpush