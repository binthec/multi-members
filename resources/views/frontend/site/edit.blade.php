@extends('frontend.layouts.app')

@section('bodyId', 'mypage')
@section('gtco_header_title', 'MyPage')
@section('gtco_header_subscription', 'サイト情報を編集します。')

@section('content')

    @include('frontend.layouts.parts.gtco-header')

    <div class="gtco-section list-menu">
        <div class="gtco-container">
            <div class="row">

                @include('frontend.layouts.parts.list-menu')

                <div class="col-md-9">

                    <h4>
                        サイト情報を入力してください。
                        @if(!Auth::guard('user')->user()->hasSite())
                            <br>
                            <small class="text-danger"><i class="icon-warning"></i> サイト情報を登録すると、作品を登録出来るようになります。</small>
                        @endif
                    </h4>


                    {!! Form::open(['method' => 'PUT', 'route' => ['user.site.update', $site], 'files'=> true, 'class' => 'form-horizontal', 'id' => 'novel-form']) !!}

                    <div class="well">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-3 control-label">サイト名 <span class="required-star">＊</span></label>
                            <div class="col-md-9">
                                {{ Form::text('title', $site->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'サイト名']) }}
                                @if($errors->has('title'))
                                    <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('title') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-md-3 control-label">URL <span class="required-star">＊</span></label>
                            <div class="col-md-9">
                                {{ Form::text('url', $site->url, ['id' => 'url', 'class' => 'form-control', 'placeholder' => 'url']) }}
                                @if($errors->has('url'))
                                    <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('url') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-3 control-label">サイトの説明 <span class="required-star">＊</span></label>
                            <div class="col-md-9">
                                {{ Form::textarea(
                                'description',
                                $site->description,
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

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-sm-3 control-label">公開ステータス <span class="required-star">＊</span></label>
                            <div class="col-sm-9">

                                <label class="radio-inline">
                                    @if(old('status') == \App\Site::CHECKED)
                                        {{ Form::radio('status', \App\Site::CHECKED, '', ['class' => 'flat-blue', 'checked']) }}
                                    @elseif($site->id !== null && $site->status === \App\Site::CHECKED)
                                        {{ Form::radio('status', \App\Site::CHECKED, true, ['class' => 'flat-blue']) }}
                                    @else
                                        {{ Form::radio('status', \App\Site::CHECKED, '', ['class' => 'flat-blue']) }}
                                    @endif
                                    公開
                                </label>
                                <label class="radio-inline">
                                    @if(old('status') == \App\Site::DENIED)
                                        {{ Form::radio('status', \App\Site::DENIED, '', ['class' => 'flat-blue', 'checked']) }}
                                    @elseif($site->id === null || $site->status === \App\Site::DENIED)
                                        {{ Form::radio('status', \App\Site::DENIED, true, ['class' => 'flat-blue']) }}
                                    @else
                                        {{ Form::radio('status', \App\Site::DENIED, '', ['class' => 'flat-blue']) }}
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
                        {!! Form::submit('更　新', ['class' => 'btn btn-primary']) !!}
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