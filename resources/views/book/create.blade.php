@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить книгу</h1>
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
                <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if($errors->title)
                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif


                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Введите название книги">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Описание" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" class="form-control" placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <input type="number" name="count" class="form-control" placeholder="Количество">
                    </div>

                    <div class="form-group">
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузка</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select name="publisher_id" class="form-control select2" style="width: 100%;">
                            @foreach($publishers as $publisher)
                                <option value="{{$publisher->id}}">{{$publisher->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="authors[]" class="authors" multiple="multiple" data-placeholder="Выберите автора" style="width: 100%;">
                            @foreach($authors as $author)
                                <option value="{{$author->id}}">{{$author->author}}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
