@extends('frontend.layouts.app')

@section('bodyId', 'mypage')
@section('gtco_header_title', 'MyPage')
@section('gtco_header_subscription', '登録済みの作品一覧です。')

@section('content')

    @include('frontend.layouts.parts.gtco-header')

    <div class="gtco-section gtco-sites">
        <div class="gtco-container">
            <div class="row">

                @include('frontend.layouts.parts.list-menu')

                <div class="col-md-9 site-lists">

                    @if($novels->count() > 0)
                        @include('frontend.layouts.parts.novels',['novels' => $novels])
                    @else
                        <p>作品はまだありません。</p>
                    @endif

                </div><!-- /.col-md-9 -->
            </div>
        </div>
    </div><!-- END .gtco-client -->
@endsection

@section('css')
@endsection

@section('js')
@endsection