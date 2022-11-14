@extends('layouts.main');

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Смотреть Юзера</h1>
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

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary mr-2">Редактировать</a>
                            <form action="{{route('user.destroy', $user->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                            <a href="{{route('user.index')}}" class="ml-2 btn btn-default">К списку</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>{{$user->id}}</th>
                                </tr>
                                <tr>
                                    <td>Имя</td>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Фамилия</td>
                                    <td>{{$user->surname}}</td>
                                </tr>
                                <tr>
                                    <td>Отчество</td>
                                    <td>{{$user->patronymic}}</td>
                                </tr>
                                <tr>
                                    <td>Емайл</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>Возрас</td>
                                    <td>{{$user->age}}</td>
                                </tr>
                                <tr>
                                    <td>Пол</td>
                                    <td>{{$user->genderTitle}}</td>
                                </tr>
                                <tr>
                                    <td>Адресс</td>
                                    <td>{{$user->address}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
