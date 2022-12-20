@extends('layouts.main');

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить продукт</h1>
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
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Наименование">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" id="description"  cols="30" rows="3" placeholder="Описание"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" id="description"  cols="30" rows="5" placeholder="Контент"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <input type="text" name="count" class="form-control" placeholder="Кол-во на складе">
                    </div>

                    <div class="form-group">
                        <label>Категория</label>
                        <select name="category_id" class="form-control category select2" style="width: 100%;">
                            <option selected="selected" disabled>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Группа</label>
                        <select name="group_id" class="form-control category select2" style="width: 100%;">
                            <option selected="selected" disabled>Выберите группу</option>
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->title}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Тэги</label>
                        <select  name="tags[]" class="tags select2" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                            @foreach($tags as $tag)
                               <option value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Цвета</label>
                        <select  name="colors[]" class="colors select2" multiple="multiple" data-placeholder="Выберите цвета" style="width: 100%;">
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Создать">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
