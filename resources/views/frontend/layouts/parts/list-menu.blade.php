<div class="col-md-3">
    <ul class="list-group">
        <a href="{{ route('user.mypage') }}"><li class="list-group-item {{isActiveUrl('mypage')}}">登録している作品一覧</li></a>
        <a href="{{ route('user.novel.create') }}"><li class="list-group-item {{isActiveUrl('mypage/novel/create')}}">作品を新規登録</li></a>
        <a href="#"><li class="list-group-item {{isActiveUrl('mapage')}}">あなたのサイト情報</li></a>
        <a href="#"><li class="list-group-item {{isActiveUrl('mapage')}}">アカウント設定</li></a>
    </ul>
</div>