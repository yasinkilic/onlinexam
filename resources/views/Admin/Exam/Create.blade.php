@extends('Admin.Master.Layout')
@section('title','Öğrenci Oluştur')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Oluştur</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.exam.store')}}" class="contact_form_box" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Adınız:</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="Adınız ve Soyadınız">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="email">E-Posta:</label>
                        <input class="form-control" type="text" name="email" placeholder="Mail Adresiniz">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Şifre:</label>
                        <input class="form-control" type="password" name="password" placeholder="********">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group text_box">
                        <label for="name">Şifre Tekrar:</label>
                        <input class="form-control" type="password" name="password" placeholder="********">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn_three">Kaydet</button>
        </form>
    </div>
</div>
@endsection