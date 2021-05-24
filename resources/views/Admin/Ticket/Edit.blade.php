
@extends('Admin.Master.Layout')
@section('content')
<div class="container">
<div class="card">
    <h4 class="card-header m-0 font-weight-bold text-primary">Düzenle</h4>
    <div class="card-body">
        <form action="{{route('Admin.tickets.update',$model)}}" class="contact_form_box" method="post">
    @csrf
 {{ method_field('PUT') }}
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group text_box">
                <label for="title">Başlık: </label><br>
                <input class="form-control" type="text" id="name" value="{{$model->title}}" name="title" placeholder="Başlık">
            </div>
            <div class="form-group">
                <label for="customer_id">İlgili Kişi: </label><br>
                <select class="form-control js-example-basic-single" name="customer_id">
                    @foreach ($customers as $customer)
                    <option {{ $model->customer_id == $customer->id ? 'selected' : '' }} value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
             <div class="form-group">
                <label for="user_id">Atanan Kişi: </label><br>
                <select class="form-control js-example-basic-single" name="user_id">
                    @foreach ($users as $user)
                    <option {{ $model->user_id == $user->id ? 'selected' : '' }} value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="form-group">
                <label for="status">Durum: </label><br>
                <select class="form-control js-example-basic-single" style="min-width:190px;" name="status">
                    <option {{ $model->status == 1 ? 'selected' : '' }} value="0">Aktif</option>
                    <option {{ $model->status == 0 ? 'selected' : '' }} value="1">Pasif</option>
                </select>
            </div>
            <div class="form-group">
                <label for="priority">Öncelik: </label><br>
                <select class="form-control js-example-basic-single" style="min-width:190px;" name="priority">
                    <option {{ $model->priority == 1 ? 'selected' : '' }} value="1">Normal</option>
                    <option {{ $model->priority == 2 ? 'selected' : '' }} value="2">Önemli</option>
                    <option {{ $model->priority == 3 ? 'selected' : '' }} value="3">Acil</option>
                </select>
            </div>
            <div class="form-group">
                <label for="department_id">Departman: </label><br>
                <select class="form-control js-example-basic-single" style="min-width:190px;" name="department_id">
                    @foreach ($departments as $department)
                    <option {{ $model->department_id == $department->id ? 'selected' : '' }} value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
          <textarea name="content" cols="70" rows="10" placeholder="İçerik Alanı..">{{$model->content}}</textarea>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
    </div>
</div>
<div class="card shadow mt-2 mb-4">
    <h4 class="card-header m-0 font-weight-bold text-primary">Mesajlar</h4>
          <div class="card-body">
            @forelse($messages as $message)
              <div class="media"><i class="fas fa-user-circle h4 m-1"></i> {{($message->user_id==null) ? $message->customer->name : $message->user->name}}<br>{{$message->content}}<br></div><small class="float-right">{{$message->created_at}}</small><hr>
              @empty
              <p><strong>Bu Talebe Ait Mesaj Yok</strong></p>
            @endforelse
          </div>
        </div>
        <form class="m-2" method="post" action="{{route('Admin.messages.store')}}">
          @csrf
          <input class="form-control" type="hidden" name="id" value="{{$model->id}}">
            <div class="form-group">
                <label for="content">Mesaj</label>
                <textarea name="content" placeholder="Mesaj Yaz.." class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-info">Gönder</button>
        </form>
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