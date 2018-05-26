@extends('frontend.layouts.app')

@section('bodyId', 'mypage')
@section('gtco_header_title', 'MyPage')
@section('gtco_header_subscription', '登録済みの作品一覧です。')

@section('content')

    @include('frontend.layouts.parts.gtco-header')

    <div class="gtco-section list-menu">
        <div class="gtco-container">
            <div class="row">

                @include('frontend.layouts.parts.list-menu')

                <div class="col-md-9">
                    <p>現在、登録済みの作品はありません。</p>
                </div><!-- /.col-md-9 -->
            </div>
        </div>
    </div><!-- END .gtco-client -->


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