@extends('Admin.Master.Layout')
@section('content')
<div class="container">
<div class="card">
    <h4 class="card-header m-0 font-weight-bold text-primary">Düzenle</h4>
    <div class="card-body">
<form action="{{route('Admin.tags.update', $model)}}" class="contact_form_box" method="post" novalidate="novalidate">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group text_box">
                                            <input class="form-control" type="text" id="name" name="name" placeholder="Etiket ismi" value="{{$model->name}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn_three">Kaydet</button>
                            </form>
                        </div>
                    </div>
                </div> 
@endsection