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
                                    <h1 class="no-margin">HOME</h1>
                                    <p>{{ config('app.name') }}へようこそ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END #gtco-header -->
    <div class="gtco-section">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 ">
                    お知らせ
                </div>
            </div>
        </div>
    </div><!-- END .gtco-client -->


    <div class="gtco-section gtco-result gtco-gray">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>検索</h2>
                    {{--<p>サイト件数：　XXX件</p>--}}
                </div>
            </div>
        </div>
    </div><!-- /.gtco-section -->

    <div class="gtco-section gtco-searchbox">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 text-center">
                    {!! Form::open(['method' => 'POST']) !!}
                    <div class="form-group form-inline">
                        {!! Form::text('keyword', '', ['class' => 'form-control col-md-6']) !!}
                        {!! Form::submit('検索', ['class' => 'btn btn-succsess']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div><!-- END .gtco-searchbox -->

    <div class="gtco-section gtco-sites">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 pickup">
                    <div class="wrap">
                        <h3><i class="ti-pie-chart"></i> PickUP!!</h3>
                        <p>
                            PickUP。PickUP。PickUP。
                        </p>
                    </div>
                </div>
                <div class="clearfix visible-md-block visible-sm-block"></div>


                <a href="#" class="">
                    <div class="col-md-6">
                        <div class="site">
                            <div class="banner">
                                <img src="{{ asset('/frontend/banners/02.gif') }}" class="img-responsive">
                            </div>
                            <div class="text">
                                <h3 class="title">SITE NAME</h3>
                                <p class="description">説明テキスト。説明テキスト。説明テキスト。説明テキスト。</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="">
                    <div class="col-md-6">
                        <div class="site">
                            <div class="banner">
                                <img src="{{ asset('/frontend/banners/02.gif') }}" class="img-responsive">
                            </div>
                            <div class="text">
                                <h3 class="title">SITE NAME</h3>
                                <p class="description">説明テキスト。説明テキスト。説明テキスト。説明テキスト。</p>
                            </div>
                        </div>
                    </div>
                </a>


            </div>
        </div>
    </div><!-- END .gtco-sites -->




    <div class="gtco-section gtco-gray">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12">
                    ページネータ
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
@endsection

@section('js')
@endsection