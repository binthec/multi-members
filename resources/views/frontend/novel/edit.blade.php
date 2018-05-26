@extends('frontend.layouts.app')

@section('bodyId', 'mypage')
@section('gtco_header_title', 'MyPage')
@section('gtco_header_subscription', '作品を投稿します。')

@section('content')

    @include('frontend.layouts.parts.gtco-header')

    <div class="gtco-section list-menu">
        <div class="gtco-container">
            <div class="row">

                @include('frontend.layouts.parts.list-menu')

                <div class="col-md-9">

                    <h4>作品情報を入力してください。</h4>

                    @if($novel->id === null)
                        {!! Form::open(['method' => 'POST', 'route' => 'user.novel.store', 'files' => true, 'class' => 'form-horizontal', 'id' => 'novel-form']) !!}
                    @else
                        {!! Form::open(['method' => 'put', 'route' => ['novel.update', $novel], 'files'=> true, 'class' => 'form-horizontal', 'id' => 'novel-form']) !!}
                    @endif

                    <div class="form-group">
                        <label for="title" class="col-md-3 control-label">作品名 <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            {{ Form::text('title', $novel->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => '作品名']) }}
                            @if($errors->has('title'))
                                <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-md-3 control-label">作品の説明 <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            {{ Form::textarea(
                            'description',
                            $novel->description,
                            ['id' => 'description', 'class' => 'form-control', 'placeholder' => '説明（最大255文字）', 'rows' => 3]
                            ) }}

                            <div class="text-right">あと　文字</div>
                            @if($errors->has('description'))
                                <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tags" class="col-md-3 control-label">タグ</label>
                        <div class="col-md-9">
                            {{ Form::text('tags', '',['id' => 'tags', 'class' => 'form-control']) }}
                            @if($errors->has('tags'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('tags') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <label>
                                <input type="checkbox" name="has_first" @click="change"> １話目を投稿する
                                {{--{{ Form::checkbox('has_first', 1, false, ['id' => 'has_first', 'class' => 'form-control', '@click' => 'change']) }}--}}
                            </label>
                        </div>
                    </div>

                    <div class="form-group" v-show="has_first">
                        <label for="story" class="col-md-3 control-label">第一話</label>
                        <div class="col-md-9">
                            {{ Form::textarea('story', $novel->story, ['id' => 'story', 'class' => 'form-control', 'rows' => '20']) }}
                            @if($errors->has('story'))
                                <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('story') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <hr>

                    {!! Form::submit('登録する', ['class' => 'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}

                </div><!-- /.col-md-9 -->
            </div>
        </div>
    </div><!-- END .gtco-section -->


@endsection

@section('css')
@endsection

@section('js')
    <script>
        var has_first = new Vue({
            el: '#novel-form', /* novel-form 要素に対して Vue を適用する */
            data: {has_first: false},
            methods: {
                change: function (e) {
                    this.has_first = e.target.checked
                }
            }
        })
    </script>
@endsection