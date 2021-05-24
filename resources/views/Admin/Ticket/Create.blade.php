@extends('Admin.Master.Layout')
@section('content')
<div class="container">
<div class="card">
    <h4 class="card-header m-0 font-weight-bold text-primary">Oluştur</h4>
    <div class="card-body">
        <form action="{{route('Admin.tickets.store')}}" class="contact_form_box" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group text_box">
                <label for="title">Başlık: </label><br>
                <input class="form-control" type="text" id="name" name="title" placeholder="Başlık">
            </div>
            <div class="form-group">
                <label for="customer_id">İlgili Kişi: </label><br>
                <select class="form-control js-example-basic-single" style="min-width:190px;" name="customer_id">
                    @foreach ($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">Atanan Kişi: </label><br>
                <select class="form-control js-example-basic-single" style="min-width:190px;" name="user_id">
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="form-group">
                <label for="status">Durum: </label><br>
                <select class="form-control js-example-basic-single" style="min-width:190px;" name="status">
                    <option value="0">Aktif</option>
                    <option value="1">Pasif</option>
                </select>
            </div>
            <div class="form-group">
                <label for="priority">Öncelik: </label><br>
                <select class="form-control js-example-basic-single" style="min-width:190px;" name="priority">
                    <option value="1">Normal</option>
                    <option value="2">Önemli</option>
                    <option value="3">Acil</option>
                </select>
            </div>
            <div class="form-group">
                <label for="department_id">Departman: </label><br>
                <select class="form-control js-example-basic-single" style="min-width:190px;" name="department_id">
                    @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
          <textarea name="content" cols="70" rows="10" placeholder="İçerik Alanı.."></textarea>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
    </div>
</div>
</div>
@endsection
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endpush