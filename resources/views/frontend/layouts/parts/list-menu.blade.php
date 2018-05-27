<div class="col-md-3">
    <ul class="list-group">
        <a href="{{ route('user.site.edit') }}" class="list-group-item {{isActiveUrl('mypage/site/edit')}}">あなたのサイト情報</a>
        @if(Auth::guard('user')->user()->hasSite())
            <a href="{{ route('user.novel') }}" class="list-group-item {{isActiveUrl('mypage/novel')}}">登録している作品一覧</a>
            <a href="{{ route('user.novel.create') }}" class="list-group-item {{isActiveUrl('mypage/novel/create')}}">作品を新規登録</a>
        @endif
    </ul>

    <ul class="list-group">
        <a href={{ route('user.edit') }}#" class="list-group-item {{isActiveUrl('mypage/user/edit')}}">アカウント設定</a>
    </ul>
</div>