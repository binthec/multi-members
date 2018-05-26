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
                                    <h1 class="no-margin">検索結果</h1>
                                    <p>小説件数：　XXX件</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- END #gtco-header -->


    <div class="gtco-section gtco-sites">
        <div class="gtco-container">
            <div class="row">

                <div class="paginator">{{ $novels->links() }}</div>

                @foreach($novels as $novel)
                    <div class="col-md-6">
                        <div class="site">
                            <div class="banner">
                                <a href="#" class="">
                                    <img src="{{ asset('/frontend/banners/02.gif') }}">
                                    <i class="ti-new-window"></i>
                                </a>

                                @if($novel->story !== null)
                                    <a href="#" class="first-novel pull-right">
                                        <span>１話を読む</span>
                                    </a>
                                @endif
                            </div>
                            <div class="text">
                                <a href="#" class="">
                                    <p class="title">{{ $novel->title }}</p>
                                </a>
                                <p class="description">{{ $novel->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="paginator">{{ $novels->links() }}</div>

            </div>
        </div>
    </div><!-- END .gtco-sites -->

@endsection

@section('css')
@endsection

@section('js')
@endsection