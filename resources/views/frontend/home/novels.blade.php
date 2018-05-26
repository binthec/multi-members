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

                @include('frontend.layouts.parts.novels', ['novels' => $novels])

                <div class="paginator">{{ $novels->links() }}</div>

            </div>
        </div>
    </div><!-- END .gtco-sites -->

@endsection

@section('css')
@endsection

@section('js')
@endsection