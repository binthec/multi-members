<div class="col-md-3">
    <ul class="list-group">
        <a href="{{ route('user.mypage') }}" class="list-group-item {{isActiveUrl('mypage')}}">登録している作品一覧</a>
        <a href="{{ route('user.novel.create') }}" class="list-group-item {{isActiveUrl('mypage/novel/create')}}">作品を新規登録</a>
        <a href="#" class="list-group-item {{isActiveUrl('mapage')}}">あなたのサイト情報</a>
        <a href="#" class="list-group-item {{isActiveUrl('mapage')}}">アカウント設定</a>
    </ul>
</div>