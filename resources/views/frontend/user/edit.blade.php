@extends('frontend.layouts.app')

@section('bodyId', 'mypage')
@section('gtco_header_title', 'MyPage')
@section('gtco_header_subscription', 'アカウント情報を編集します。')

@section('content')

    @include('frontend.layouts.parts.gtco-header')

    <div class="gtco-section list-menu">
        <div class="gtco-container">
            <div class="row">

                @include('frontend.layouts.parts.list-menu')

                <div class="col-md-9">

                    <h4>変更する場合のみ、情報を入力・登録してください。</h4>


                    <div class="well">
                        {!! Form::open(['method' => 'PUT', 'route' => ['user.update'], 'files'=> true, 'class' => 'form-horizontal']) !!}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">ユーザ名 <span class="required-star">＊</span></label>
                            <div class="col-md-9">
                                {{ Form::text('email', $user->email, ['id' => 'email', 'class' => 'form-control']) }}
                                @if($errors->has('email'))
                                    <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="text-right">
                            {!! Form::submit('更　新', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div><!-- /.well -->

                    <div class="well">

                        {!! Form::open(['method' => 'PUT', 'route' => ['user.password.update'], 'files'=> true, 'class' => 'form-horizontal']) !!}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">パスワード <span class="required-star">＊</span></label>
                            <div class="col-md-9">
                                {{ Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => '新しいパスワード']) }}
                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirmation" class="col-sm-3 control-label">パスワード再入力 <span class="required-star">＊</span></label>
                            <div class="col-sm-9">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirmation', 'placeholder' => 'パスワードをもう一度入力']) !!}
                            </div>
                        </div>

                        <div class="text-right">
                            {!! Form::submit('更　新', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}


                    </div><!-- /.well -->


                </div><!-- /.col-md-9 -->
            </div>
        </div>
    </div><!-- END .gtco-section -->


@endsection

@section('css')
@endsection

@section('js')
@endsection