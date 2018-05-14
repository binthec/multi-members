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
                <div class="col-md-12">
                    <h3 class="title"><i class="ti-pie-chart"></i> キーワードで探す</h3>

                    <div class="search-form">
                        {!! Form::open(['method' => 'POST', 'route' => 'search']) !!}
                        <div class="form-group form-inline">
                            {!! Form::text('keyword', '', ['class' => 'form-control col-md-6']) !!}
                            {!! Form::submit('検索', ['class' => 'btn btn-succsess']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- END .gtco-searchbox -->

    <div class="gtco-section gtco-tags">
        <div class="gtco-container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="title"><i class="ti-pie-chart"></i> 分類から探す</h3>

                    <div class="tags">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            @foreach($groups as $group)
                                <div class="panel panel-default">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$group->id}}" aria-expanded="true" aria-controls="collapse{{$group->id}}">
                                        <div class="panel-heading" role="tab" id="heading{{$group->id}}">
                                            <h4 class="panel-title">{{ $group->name }}</h4>
                                        </div>
                                    </a>
                                    <div id="collapse{{$group->id}}" class="panel-collapse collapse{{ ($group->id === 1)? ' in' : '' }}" role="tabpanel" aria-labelledby="heading{{$group->id}}">
                                        <div class="panel-body">
                                            @foreach($group->tags()->checked()->get() as $tag)
                                                <a href="#" class="tag">{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- END .gtco-sites -->

@endsection

@section('css')
@endsection

@section('js')
@endsection