@extends('backend.layouts.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>作品を{{ ($novel->id === null)? '新規登録' : '編集' }}</h1>
            <p class="content-description">
                <i class="fa fa-info-circle"></i> 「作品」に表示される記事を{{ ($novel->id === null)? '新規登録' : '編集' }}します。
            </p>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
                <li><a href="{{ route('novel.index') }}">作品一覧</a></li>
                <li class="active">作品を{{ ($novel->id === null)? '新規登録' : '編集' }}</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    @if($novel->id === null)
                        {!! Form::open(['method' => 'post', 'route' => 'novel.store', 'files'=> true, 'class' => 'form-horizontal']) !!}
                    @else
                        {!! Form::open(['method' => 'put', 'route' => ['novel.update', $novel], 'files'=> true, 'class' => 'form-horizontal']) !!}
                    @endif
                    {{ csrf_field() }}

                    <div class="box box-info">

                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-edit"></i> 入力してください </h3>
                        </div>

                        <div class="box-body">

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-sm-3 control-label">記事の名前 <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    {{ Form::text('title', $novel->title, ['id' => 'name', 'class' => 'form-control', 'placeholder' => '記事のタイトル']) }}

                                    @if($errors->has('title'))
                                        <span class="help-block">
							            <strong class="text-danger">{{ $errors->first('title') }}</strong>
						            </span>
                                    @endif
                                </div>
                            </div><!-- form-group -->

                            <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                                <label for="place" class="col-sm-3 control-label">開催場所 <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    {{ Form::text('place', $novel->place, ['id' => 'place', 'class' => 'form-control', 'placeholder' => '開催した場所や地域名、会場名など']) }}

                                    @if($errors->has('place'))
                                        <span class="help-block">
							            <strong class="text-danger">{{ $errors->first('place') }}</strong>
						            </span>
                                    @endif
                                </div>
                            </div><!-- form-group -->

                            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                <label for="detail" class="col-sm-3 control-label">内容</label>
                                <div class="col-sm-9">
                                    {!! Form::textarea('detail', $novel->detail, ['class' => 'form-control', 'id' => 'use-ckeditor']) !!}

                                    @if($errors->has('detail'))
                                        <span class="help-block">
							            <strong class="text-danger">{{ $errors->first('detail') }}</strong>
						            </span>
                                    @endif
                                </div>
                            </div><!-- form-group -->


                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-sm-3 control-label">公開ステータス <span class="text-danger">*</span></label>
                                <div class="col-sm-9">

                                    <label class="radio-inline">
                                        @if(old('status') == \App\Novel::OPEN)
                                            {{ Form::radio('status', \App\Novel::OPEN, '', ['class' => 'flat-blue', 'checked']) }}
                                        @elseif($novel->id !== null && $novel->status === \App\Novel::OPEN)
                                            {{ Form::radio('status', \App\Novel::OPEN, true, ['class' => 'flat-blue']) }}
                                        @else
                                            {{ Form::radio('status', \App\Novel::OPEN, '', ['class' => 'flat-blue']) }}
                                        @endif
                                         公開
                                    </label>
                                    <label class="radio-inline">
                                        @if(old('status') == \App\Novel::CLOSE)
                                            {{ Form::radio('status', \App\Novel::CLOSE, '', ['class' => 'flat-blue', 'checked']) }}
                                        @elseif($novel->id === null || $novel->status === \App\Novel::CLOSE)
                                            {{ Form::radio('status', \App\Novel::CLOSE, true, ['class' => 'flat-blue']) }}
                                        @else
                                            {{ Form::radio('status', \App\Novel::CLOSE, '', ['class' => 'flat-blue']) }}
                                        @endif
                                         非公開
                                    </label>

                                    @if($errors->has('status'))
                                        <span class="help-block">
							            <strong class="text-danger">{{ $errors->first('status') }}</strong>
						            </span>
                                    @endif
                                </div>
                            </div><!-- form-group -->

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">登　録</button>
                            </div>
                        </div>

                    </div><!-- /.box -->

                    {!! Form::close() !!}

                </div><!-- /.col -->
            </div><!-- /.row -->

        </section><!-- /.content -->
    </div><!-- ./content-wrapper -->

@endsection

@section('js')
@endsection
