@foreach($novels as $novel)
    <div class="col-md-6">
        <div class="site">
            <div class="banner">
                <a href="#" class="">
                    <img src="{{ asset('/frontend/banners/02.gif') }}">
                    <i class="ti-new-window"></i>
                </a>

                @if($novel->story !== null)
                    <a href="#" class="first-novel pull-right">
                        <span>１話を読む</span>
                    </a>
                @endif

            </div>
            <div class="text">
                <a href="#" class="">
                    <p class="title">{{ $novel->title }}</p>
                </a>
                <p class="description">{{ $novel->description }}</p>
            </div>
        </div>
    </div>
@endforeach