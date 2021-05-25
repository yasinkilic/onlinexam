@extends('Admin.Master.Layout')
@section('title','Firma Düzenle')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.min.css') }}"/ >
@endpush
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Düzenle</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.firmalar.update',$model)}}" class="contact_form_box" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Firma Adı:</label><br>
                        <input  class="form-control" value="{{ $model->adi }}" type="text" name="adi" placeholder="Firma Adı">
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Yetkili Kişi:</label><br>
                        <input  class="form-control" value="{{ $model->yetkili }}" type="text" name="yetkili" placeholder="Yetkili Kişi">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Ip:</label><br>
                        <input  class="form-control" value="{{ $model->ip }}" type="text" name="ip" placeholder="Ip">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Telefon:</label><br>
                        <input  class="form-control" value="{{ $model->tel }}" type="text" name="tel" placeholder="Telefon">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Adres:</label><br>
                        <input  class="form-control" value="{{ $model->adres }}" type="text" name="adres" placeholder="Adres">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Sms Başlık:</label><br>
                        <input  class="form-control" value="{{ $model->sms_baslik }}" type="text" name="sms_baslik" placeholder="Sms Başlık">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Sms Onay:</label><br>
                        <input  class="form-control" value="{{ $model->sms_onay }}" type="text" name="sms_onay" placeholder="Sms Onay">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Alan Adı/Domain:</label><br>
                        <input  class="form-control" value="{{ $model->domain }}" type="text" name="domain" placeholder="Alan Adı/Domain">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group text_box">
                        <label for="name">Lisans No:</label><br>
                        <input  class="form-control" value="{{ $model->lisans_no }}" type="text" name="lisans_no" placeholder="Lisans No">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Başlangıç:</label><br>
                        <input  class="form-control" value="{{ $model->baslangic }}" class="datetimepicker3" type="text" name="baslangic" placeholder="baslangic">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Bitiş:</label><br>
                        <input  class="form-control" value="{{ $model->bitis }}" class="datetimepicker3" type="text" name="bitis" placeholder="bitis">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="email">E-Posta:</label><br>
                        <input  class="form-control" value="{{ $model->email }}" type="text" name="email" placeholder="Mail Adresiniz">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Şifre:</label><br>
                        <input  class="form-control" type="text" name="password" placeholder="Şifre">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Müşteri:</label><br>
                        <input  class="form-control" type="text" value="{{ $model->customer->name }}" readonly>
                        <input  class="form-control" type="hidden" value="{{ $model->customer_id}}" name="customer_id">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal1">Seç</a>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn_three">Kaydet</button>
        </form>
    </div>
</div>

<div class="modal fade" id="logoutModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Müşteri Seç</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"><div class="table-responsive">
                <div class="form-group">
                    <input type="button" id="1" value="Aktif" class="btn btn-primary m-1">
                    <input type="button" id="0" value="Pasif" class="btn btn-danger m-1">
                    <input id="myInput" class="form-control" type="text">
                </div>
                <table id="myTable" border="0" class="table table-hover">
                    <thead>
                        <tr>
                            <th width="1%">#</th>
                            <th>Firma Adı</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $model)
                        <tr>
                            <td>{{$model->id}}</td>
                            <td>{{$model->name}}</td>
                            <td>
                                <a href="#" name="musterisec" data-id="{{ $model->id }}" class="btn btn-default" type="button" data-dismiss="modal">Seç</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
<script>
$( function() {

$('.datetimepicker3').datetimepicker({

format:'Y-m-d H:i:00',
});

} );
//musteri secme
$("a[name='musterisec']").on('click',function(){

$("input[name='customer_id']").val($(this).data('id'));
});
</script>
@endpush