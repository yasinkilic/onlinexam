@extends('Admin.Master.Layout') @section('title','Destek Talepleri') @section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Destek Talepleri<a href="{{ route('Admin.tickets.create') }}"><i class="fas fa-plus-circle float-right"></i></a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" border="0" class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Başlık</th>
                        <th>İlgili Kişi</th>
                        <th>Destek Elemanı</th>
                        <th>Durum</th>
                        <th>Öncelik</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Güncellenme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                

            </table>
        </div>
    </div>
</div>

@endsection
@push('js')
<script type="text/javascript">
$(document).ready(function(){

    var table = $('#myTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "orderCellsTop": true,
        "fixedHeader": true,
        "sDom": 'lrtip',
        "language": {
        "url":"{{ asset('datatablelang.json') }}"
         },
        "ajax": "{{ route('Admin.tickets.ticketlist') }}",

        "columns": [
            { "data": "id" },
            { "data": "title" },
            { "data": "customer_id" },
            { "data": "user_id" },
            { "data": "status1"},
            { "data": "priority1"},
            { "data": "created_at"},
            { "data": "updated_at"},
            { "data": "İşlemler" }
        ],

       
    } );

$('#myTable thead tr').clone(true).appendTo( '#myTable thead' );
    $('#myTable thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
            if($(this).text()!='İşlemler' && $(this).text()!='Durum' && $(this).text()!='Öncelik')
            {
                $(this).html( '<input class="form-control" type="text" placeholder="Ara: '+title+'" />' );
         
                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            }
            else if ($(this).text()=='Durum') 
            {
                $(this).html( '<select  class="form-control" name="durum"><option selected value> -- Seçin -- </option><option value="0">Kapalı</option><option value="1">Açık</option><option value="2">Beklemede</option></select>' );

                $( 'select', this ).on( 'change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );


            }
            else if ($(this).text()=='Öncelik') 
            {

                $(this).html( '<select  class="form-control" name="durum"><option selected value> -- Seçin -- </option><option value="1">Normal</option><option value="2">Önemli</option><option value="3">Acil</option></select>' );

                $( 'select', this ).on( 'change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );

            }
    } );
 
    

});


</script>
@endpush