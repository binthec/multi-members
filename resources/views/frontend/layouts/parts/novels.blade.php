{{ $novels->links() }}

@foreach($novels as $novel)

    <div class="site">

        <div class="site-title">
            <a href="{{ $novel->site->url }}" target="_blank" class="">
                {{ $novel->title }}&ensp;<i class="ti-new-window"></i>
            </a>
        </div><!-- /.title -->

        <div class="top clearfix">
            <div class="banner">
                <a href="{{ $novel->site->url }}" target="_blank">
                    <img src="{{ asset('/frontend/banners/02.gif') }}">
                </a>
            </div><!-- /.banner -->
            <div class="tags">
                @if($novel->tags->count() > 0)
                    @foreach($novel->tags as $tag)
                        [<a href="#" class="tag">{{ $tag->name }}</a>]
                    @endforeach
                @endif
            </div><!-- /.tags -->
        </div><!-- /.top -->

        <div class="bottom clearfix">
            <p class="description">{{ $novel->description }}</p>
            <hr>
            @if($novel->story !== null)
                <a href="#" class="first"><span>１話を読む</span></a>&ensp;
            @endif
            <a href="{{ route('site', $novel->site) }}" class="others">サイト情報</a>
        </div>

    </div><!-- /.bottom -->

@endforeach

{{ $novels->links() }}