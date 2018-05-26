@extends('frontend.layouts.app')

@section('bodyId', 'home')

@section('content')

    <header id="gtco-header" class="gtco-cover gtco-cover-custom gtco-inner" role="banner">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-left">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="row">
                                <div class="col-md-8 animate-box">
                                    <h1 class="no-margin">Login</h1>
                                    <p>ログイン、または新規登録してください</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- END #gtco-header -->

    <div class="gtco-section gtco-login">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <h3 class="title"><i class="ti-user"></i>ログイン</h3>

                    {!! Form::open(['method' => 'POST', 'route' => 'user.login']) !!}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">名前</label>
                        {!! Form::text('name', old('name'),['class' => 'form-control']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
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
                </div>

                <div class="col-md-5 col-md-offset-1">
                    <h3 class="title"><i class="ti-user"></i>新規作成</h3>

                    <form action="#">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn btn-special" value="Send Message">
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div><!-- END .gtco-section -->
@endsection

@section('css')
@endsection

@section('js')
@endsection