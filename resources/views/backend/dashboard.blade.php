@extends('backend.layouts.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Dashboard<small>フロントの機能いろいろ</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">

                <!-- Left Column -->
                <section class="col-lg-5">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-image"></i> 登録ユーザ</h3>
                            <a class="btn btn-primary pull-right" href="">登録ユーザ一覧</a>
                        </div>

                        <div class="box-body">

                        </div>
                    </div><!-- /.box -->
                </section>


                <!-- Right Column -->
                <section class="col-lg-7">
                    <!-- カレンダー -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-calendar"></i>
                            <h3 class="box-title">登録作品</h3>
                            <a class="btn btn-primary pull-right" href="">登録作品一覧</a>
                        </div>

                        <div class="box-body">
                            <div id="calendar"></div>
                        </div>

                        <div class="box-footer">
                        </div>
                    </div><!-- /.box -->
                </section>


            </div><!-- /.row (main row) -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection

@section('css')
@endsection

@section('js')
@endsection
