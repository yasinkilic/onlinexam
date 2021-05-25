@extends('Admin.Master.Layout')
@section('title','Öğrenciyi Düzenle')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Düzenle</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.user.update',$model)}}" class="contact_form_box" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Adınız:</label><br>
                        <input class="form-control" value="{{$model->name}}" type="text" id="name" name="name" placeholder="Adınız ve Soyadınız">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="email">E-Posta:</label><br>
                        <input class="form-control" value="{{$model->email}}" type="text" name="email" placeholder="Mail Adresiniz">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Şifre:</label><br>
                        <input class="form-control" type="password" name="password" placeholder="********">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Şifre Tekrar:</label><br>
                        <input class="form-control" type="password" name="password" placeholder="********">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn_three">Kaydet</button>
        </form>
    </div>
</div>
@endsection