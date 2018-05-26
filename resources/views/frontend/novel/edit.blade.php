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
                        {!! Form::open(['method' => 'PUT', 'route' => ['novel.update', $novel], 'files'=> true, 'class' => 'form-horizontal', 'id' => 'novel-form']) !!}
                    @endif

                    <div class="well">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-3 control-label">作品名 <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                {{ Form::text('title', old('title'), ['id' => 'title', 'class' => 'form-control', 'placeholder' => '作品名']) }}
                                @if($errors->has('title'))
                                    <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('title') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-3 control-label">作品の説明 <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                {{ Form::textarea(
                                'description',
                                $novel->description,
                                ['id' => 'description', 'class' => 'form-control', 'placeholder' => '説明（最大255文字）', 'rows' => 3]
                                ) }}

                                <span class="help-block">
                                @if($errors->has('description'))
                                        <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                    @endif
                                    <div class="pull-right">あと　文字</div>
                            </span>


                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
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

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-sm-3 control-label">公開ステータス <span class="text-danger">*</span></label>
                            <div class="col-sm-9">

                                <label class="radio-inline">
                                    @if(old('status') == \App\Novel::CHECKED)
                                        {{ Form::radio('status', \App\Novel::CHECKED, '', ['class' => 'flat-blue', 'checked']) }}
                                    @elseif($novel->id !== null && $novel->status === \App\Novel::CHECKED)
                                        {{ Form::radio('status', \App\Novel::CHECKED, true, ['class' => 'flat-blue']) }}
                                    @else
                                        {{ Form::radio('status', \App\Novel::CHECKED, '', ['class' => 'flat-blue']) }}
                                    @endif
                                    公開
                                </label>
                                <label class="radio-inline">
                                    @if(old('status') == \App\Novel::DENIED)
                                        {{ Form::radio('status', \App\Novel::DENIED, '', ['class' => 'flat-blue', 'checked']) }}
                                    @elseif($novel->id === null || $novel->status === \App\Novel::DENIED)
                                        {{ Form::radio('status', \App\Novel::DENIED, true, ['class' => 'flat-blue']) }}
                                    @else
                                        {{ Form::radio('status', \App\Novel::DENIED, '', ['class' => 'flat-blue']) }}
                                    @endif
                                    非公開
                                </label>

                                @if($errors->has('status'))
                                    <span class="help-block">
							            <strong class="text-danger">{{ $errors->first('status') }}</strong>
						            </span>
                                @endif
                            </div>
                        </div><!-- form-group -->

                    </div><!-- /.well -->

                    <div class="form-group text-right">
                        {!! Form::submit('登録する', ['class' => 'btn btn-primary']) !!}
                    </div>

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