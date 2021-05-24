@extends('Admin.Master.Layout')
@section('title','Firma Listesi')
@section('content')
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Firmalar<a href="{{ route('Admin.firmalar.create') }}"><i class="fas fa-plus-circle float-right"></i></a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
            <table id="myTable" border="0" class="table table-hover">
                        <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th>Firma Adı</th>
                                <th>Email</th>
                                <th>Yetkili Kişi</th>
                                <th>Lisans No</th>
                                <th>Domain</th>
                                <th>Lisans Başlangıç</th>
                                <th>Lisans Bitiş</th>
                                <th>Durum</th>
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
    $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

});
    //Aktif Pasif Buton
$("input[type='button']").on("click",function(){
     var value = $(this).attr('id').toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).children('.status').text().toLowerCase().indexOf(value) > -1)
    });
});

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
        "ajax": "{{ route('Admin.firmalar.firmalist') }}",
        "columns": [
            { "data": "id" },
            { "data": "adi" },
            { "data": "email" },
            { "data": "yetkili" },
            { "data": "lisans_no"},
            { "data": "domain" },
            { "data": "baslangic" },
            { "data": "bitis" },
            { "data": "durum" },
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