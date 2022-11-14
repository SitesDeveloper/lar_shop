@extends('layouts.main');

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать Пользователя #{{$user->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{route('user.update', $user->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="form-group">
                        <input  name="name" value="{{$user->name ?? old('name')}}" type="text"  class="form-control" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <input  name="surname" value="{{$user->surname ?? old('surname')}}" type="text"  class="form-control" placeholder="Фамилия">
                    </div>
                    <div class="form-group">
                        <input  name="patronymic" value="{{$user->patronymic ?? old('patronymic')}}" type="text"  class="form-control" placeholder="Отчество">
                    </div>

                    <div class="form-group">
                        <input  name="age" value="{{$user->age ?? old('age')}}" type="number"  class="form-control" placeholder="Возраст">
                    </div>

                    <div class="form-group">
                        <input  name="address" value="{{$user->address ?? old('address')}}" type="text"  class="form-control" placeholder="Адресс">
                    </div>

                    <div class="form-group">
                        <select  name="gender"  class="custom-select form-control-border" id="exampleSelectBorder">
                            <option disabled selected>Пол</option>
                            <option {{ ($user->gender==1 || old('gender')==1) ? 'selected':'' }}  value="1">Мужчина</option>
                            <option {{ ($user->gender==2 || old('gender')==2) ? 'selected':'' }} value="2">Женщина</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Сохранить">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
