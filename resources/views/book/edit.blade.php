@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать</h1>
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
                <form action="{{ route('book.update',$book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    @if($errors->title)
                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{$error}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="text"  value="{{$book->title}}" name="title" class="form-control" placeholder="Введите название книги">
                    </div>
                    <div class="form-group">
                        <textarea  value="{{$book->description}}" name="description" class="form-control" placeholder="Описание" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input  value="{{$book->price}}"  type="number" name="price" class="form-control" placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <input value="{{$book->count}}"  type="number" name="count" class="form-control" placeholder="Количество">
                    </div>
                    <div class="form-group">
                        <input type="number" value="{{$book->year}}" name="year" class="form-control" placeholder="Год издания">
                    </div>
                    <div class="form-group">
                        <input type="string" value="{{$book->ISBN}}" name="ISBN" class="form-control" placeholder="ISBN">
                    </div>

                    <div class="form-group">
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="binding" class="form-control select2" style="width: 100%;">
                            <option  value="твердый">Твердый</option>
                            <option value="мягкий">Мягкий</option>
                        </select>
                    </div>

                    <label class="m-2">Превью</label>
                    <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="preview_image">

                    <label class="m-2">Остальные Изображения</label>
                    <input type="file"  class="form-control m-2" name="images[]" multiple>

                    <div class="form-group">
                        <select name="publisher_id" class="form-control select2" style="width: 100%;">
                            @foreach($publishers as $publisher)
                                <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="authors[]" class="authors" multiple="multiple" data-placeholder="Выберите автора" style="width: 100%;">
                            @foreach($authors as $author)
                                <option value="{{$author->id}}">{{$author->full_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Редактировать">
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
