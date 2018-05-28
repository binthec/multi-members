@extends('frontend.layouts.app')

@section('bodyId', 'register')
@section('gtco_header_title', 'Register')
@section('gtco_header_subscription', 'ユーザアカウントを作成します。')

@section('content')

    @include('frontend.layouts.parts.gtco-header')

    <div class="gtco-section gtco-auth">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 box">
                    <h3 class="title"><i class="ti-user"></i>新規登録</h3>

                    {!! Form::open(['method' => 'POST', 'route' => 'user.store']) !!}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">お名前 <span class="required-star">＊</span></label>
                        {!! Form::text('name', old('name'),['class' => 'form-control', 'placeholder' => 'お名前']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">メールアドレス <span class="required-star">＊</span></label>
                        {!! Form::text('email', old('email'),['class' => 'form-control', 'placeholder' => '有効なメールアドレス']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">パスワード <span class="required-star">＊</span></label>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '半角英数８文字以上']) !!}
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
				            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password_confirmation">パスワード再入力 <span class="required-star">＊</span></label>
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '確認のため、再度入力してください']) !!}
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block btn-flat" value="登　録">
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div><!-- END .gtco-section -->
@endsection