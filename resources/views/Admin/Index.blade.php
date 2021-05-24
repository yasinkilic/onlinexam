@extends('Admin.Master.Layout')
@section('content')
<div class="container">
      <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Toplam Kullanıcı</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$userscount->count()}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-4 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Toplam Müşteri</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$customerscount->count()}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-4 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Toplam Destek Talebi</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$ticketscount->count()}}</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-life-ring fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample1">
                  <h6 class="m-0 font-weight-bold text-primary">Son Oluşturulan Destek Talepleri</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample1">
                  <div class="card-body">
                     <table border="0" class="table table-hover">
                        <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th>Talep Başlığı</th>
                                <th>İlgili Kişi</th>
                                <th>Atanan Kişi</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>Güncelleme Tarihi</th>
                                <th colspan="2"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td>{{$model->title}}</td>
                                    <td>{{$model->customer->name ?? 'Atanmamış'}}</td>
                                    <td>{{$model->user->name ?? 'Atanmamış'}}</td>
                                    <td>{{$model->created_at}}</td>
                                    <td>{{$model->updated_at}}</td>
                                    <td>
                                        <a href="{{route('Admin.tickets.edit',$model)}}" class="btn btn-default">Düzenle</a>
                                        <a href="{{route('Admin.tickets.destroy',$model)}}" class="btn btn-default">Sil</a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>

                    </table>
                  </div>
                  <div class="card-footer"><a href="{{route('Admin.tickets.index')}}">Tümünü Gör</a></div>
                </div>
              </div>
          <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample2" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample2">
                  <h6 class="m-0 font-weight-bold text-primary">Son Oluşturulan Kullanıcılar</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample2">
                  <div class="card-body">
                     <table border="0" class="table table-hover">
                        <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th>Kullanıcı Adı</th>
                                <th>Email</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>Güncelleme Tarihi</th>
                                <th colspan="2"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td>{{$model->name}}</td>
                                    <td>{{$model->email}}</td>
                                    <td>{{$model->created_at}}</td>
                                    <td>{{$model->updated_at}}</td>
                                    <td>
                                        <a href="{{route('Admin.users.edit',$model)}}" class="btn btn-default">Düzenle</a>
                                        <a href="{{route('Admin.users.destroy',$model)}}" class="btn btn-default">Sil</a>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>

                    </table>
                  </div>
                  <div class="card-footer"><a href="{{route('Admin.users.index')}}">Tümünü Gör</a></div>
                </div>
              </div>
              
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample3">
                  <h6 class="m-0 font-weight-bold text-primary">Son Oluşturulan Müşteriler</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample3">
                  <div class="card-body">
                     <table border="0" class="table table-hover">
                        <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th>Kullanıcı Adı</th>
                                <th>Email</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>Güncelleme Tarihi</th>
                                <th colspan="2"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td>{{$model->name}}</td>
                                    <td>{{$model->email}}</td>
                                    <td>{{$model->created_at}}</td>
                                    <td>{{$model->updated_at}}</td>
                                    <td>
                                        <a href="{{route('Admin.customers.edit',$model)}}" class="btn btn-default">Düzenle</a>
                                        <a href="{{route('Admin.customers.destroy',$model)}}" class="btn btn-default">Sil</a>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>

                    </table>
                  </div>
                  <div class="card-footer"><a href="{{route('Admin.customers.index')}}">Tümünü Gör</a></div>
                </div>
              </div>
        </div>
@endsection