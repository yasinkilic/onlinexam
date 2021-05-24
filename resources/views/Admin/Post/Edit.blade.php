@extends('Admin.Master.Layout')
@section('title')
{{$model->title}} | Yazı Detay
@endsection

@push('js')
<script src="{{ asset('js/multi-select.js') }}"></script>
<script>
  $('#my-select').multiSelect({
    selectableHeader: "<div class='custom-header'>Seçilebilir Etiketler</div>",
    selectionHeader: "<div class='custom-header'>Seçilen Etiketler</div>"
  });
      $(document).ready(function() {

     $('.summernote').summernote({

           height: 300,

      });

   });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
@endpush

@push('css')
<link rel="stylesheet" href="{{ asset('css/multi-select.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
@endpush

@section('content')
<div class="container">
<div class="card">
    <h4 class="card-header m-0 font-weight-bold text-primary">Düzenle</h4>
    <div class="card-body">
<form action="{{route('Admin.posts.update' , $model)}}" class="contact_form_box" method="post" novalidate="novalidate" enctype="multipart/form-data">
  @csrf
  {{ method_field('PUT') }}
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group text_box">
        <input class="form-control" type="file" id="name" name="image">
        <hr>
        <input class="form-control" type="text" id="name" name="title" placeholder="Başlık" value="{{$model->title}}">
        <hr>
        <textarea class="form-control summernote" name="body" placeholder="İçerik Alanı..">{{$model->body}}</textarea>
      </div>
    </div>
      <div class="col-lg-6">
            <div class="form-group">
              <h4>Etiketler</h4>
              <select class="form-control" id="my-select" multiple="multiple" name="tags[]">
                @foreach ($tags as $tag)
                <option @if($model->tags->contains($tag->id)) selected="selected" @endif value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
      <div class="col-lg-6">
        <div class="col-lg-4">
          <div class="form-group text_box">
            <h4>Kategoriler</h4>
            <select class="form-control" name="category_id">
              @foreach ($categories as $category)
              <option @if($model->category_id == $category->id) selected="selected" @endif value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
          
      </div>
  </div>
  <button type="submit" class="btn_three">Kaydet</button>
</form>
</div>
</div>
</div>
@endsection