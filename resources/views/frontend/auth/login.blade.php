@extends('frontend.layouts.app')

@section('bodyId', 'home')
@section('gtco_header_title', 'Login')
@section('gtco_header_subscription', 'ログインして設定やサイトを登録出来ます。')

@section('content')

    @include('frontend.layouts.parts.gtco-header')

    <div class="gtco-section gtco-auth">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 box">
                    <h3 class="title"><i class="ti-user"></i>ログイン</h3>

                    {!! Form::open(['method' => 'POST', 'route' => 'user.login']) !!}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">メールアドレス</label>
                        {!! Form::text('email', old('email'),['class' => 'form-control']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="name">パスワード</label>
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
				            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="checkbox icheck">
                            <label>
                                <input class="checkbox" id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                ログイン状態を維持する
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block btn-flat" value="ログイン">
                    </div>

                    <div class="form-group">
                        <a href="#">※パスワード思い出せない</a>
                    </div>

                    {!! Form::close() !!}
                </div><!-- /.col-md .box -->

                <div class="col-md-6 col-md-offset-3 text-right make-account">
                    <a href="{{ route('user.create') }}" class=""><i class="icon-user"></i> アカウントを作る</a>
                </div>
            </div><!-- /.row -->

        </div>
    </div><!-- END .gtco-section -->
@endsection

@section('css')
@endsection

@section('js')
@endsection