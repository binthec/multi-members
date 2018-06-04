@extends('frontend.layouts.app')

@section('bodyId', 'site')

@section('content')
    <header id="gtco-header" class="gtco-cover gtco-cover-custom gtco-inner" role="banner">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-left">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="row">
                                <div class="col-md-8 animate-box">
                                    <h1 class="no-margin">Site</h1>
                                    <p>【　{{ $site->title }}　】小説登録件数：{{ $novels->count() }} 件</p>
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

                <p>サイト名　{{ $site->title }}</p>
                <p>URL　{{ $site->url }}</p>
                <p>説明　{{ $site->description }}</p>
                <p>更新日　{{ $site->updated_at }}</p>
                <p>登録日　{{ $site->checked_at }}</p>

            </div>
        </div>
    </div><!-- END .gtco-sites -->

    <div class="gtco-section gtco-sites">
        <div class="gtco-container">
            <div class="row">

                @if($novels->count() > 0)
                    @include('frontend.layouts.parts.novels',['novels' => $novels])
                @else
                    作品が見つかりませんでした。
                @endif

            </div>
        </div>
    </div><!-- END .gtco-sites -->

@endsection

@section('css')
@endsection

@section('js')
@endsection