@extends('layouts.main');

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Смотреть Продукт #{{$product->id}}</h1>
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
                            <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary mr-2">Редактировать</a>
                            <form action="{{route('product.destroy', $product->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                            <a href="{{route('product.index')}}" class="ml-2 btn btn-default">К списку</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>{{$product->id}}</th>
                                </tr>
                                <tr>
                                    <td>Название</td>
                                    <td>
                                        {{$product->title}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Описание</td>
                                    <td>
                                        {{$product->description}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Контент</td>
                                    <td>
                                        {{$product->content}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Цена</td>
                                    <td>
                                        {{$product->price}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Кол-во</td>
                                    <td>
                                        {{$product->count}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Картинка</td>
                                    <td>
                                        <img style="width: 100px; height: auto;" src="{{$product->image_url}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Доп Изображения</td>
                                    <td>
                                        @foreach ($product->productImages as $prodImage)
                                            <img style="width: 100px; height: auto;" src="{{$prodImage->image_url}}">
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Категория</td>
                                    <td>
                                        {{$product->category->title}} ( #{{$product->category->id}} )
                                    </td>
                                </tr>
                                <tr>
                                    <td>Группа</td>
                                    <td>
                                        @if ($product->group)
                                            {{$product->group->title}} ( #{{$product->group->id}} )
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Тэги</td>
                                    <td>
                                        @foreach($product->tags as $tag)
                                            <span class="btn btn-outline-info btn-sm mr-2">{{$tag->title}}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Цвета</td>
                                    <td>
                                        @foreach($product->colors as $color)
                                            <span class="btn btn-outline-info btn-sm mr-2">{{$color->title}}</span>
                                        @endforeach
                                    </td>
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
