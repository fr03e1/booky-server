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
                <form action="{{ route('user.update',$user->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" value="{{$user->name ?? old('name')}}" name="name" class="form-control" placeholder="Имя">
                    </div>
                    @role('admin')
                    <div class="form-group">
                        <select name="role_id" class="form-control select2" style="width: 100%;">
                                <option value="manager">Мэнеджер</option>
                                <option value="admin">Админ</option>
                                <option value=3>Пользователь</option>
                        </select>
                    </div>
                    @endrole
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Редактировать">
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
