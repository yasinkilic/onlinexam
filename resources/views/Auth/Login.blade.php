@extends('Master.Layout')
@section('content')
<form action="{{route('user.login')}}" method="post">

	@csrf

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email" />
    </div>
    <div class="form-group">
        <label>Şifre</label>
        <input type="password" name="password" class="form-control" placeholder="Şifre" />
    </div>
    <input type="submit" value="Gönder" class="btn btn-success btn-flat m-b-30 m-t-30" />
    
</form>
@endsection