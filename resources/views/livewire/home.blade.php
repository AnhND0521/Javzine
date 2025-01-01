<div id="content">
    {{-- @if (session('error'))
        <div class="notify" style="border:1px solid #c0392b !important;">{{ session('error') }}
            <span class="close"><i class="fa-regular fa-circle-xmark"></i></span>
        </div>
    @elseif (session('success'))
        <div class="notify">{{ session('success') }}
            <span class="close"><i class="fa-regular fa-circle-xmark"></i></span>
        </div>
    @endif --}}
    <div class="content-top">
        <div class="side-bar-1">
            <span class="hd">カテゴリ</span>
            <div class="cate-blc-top">
                @foreach ($cats as $cat)
                    <a href="{{ route('category', $cat->id) }}" wire:navigate class="cate-item">
                        <div class="center"><i class="{{ $cat->icon }}" style="color: {{ $cat->color }}"></i></div>
                        <span>{{ $cat->name }}</span>
                    </a>
                @endforeach
                <a href="{{ route('horenso') }}" wire:navigate class="cate-item">
                    <div class="center"><i class="fa-regular fa-file fa-xl" style="color: #9b59b6"></i></div>
                    <span>報連相テンプレート</span>
                </a>
            </div>
            <div class="res-trend">
                <span class="hd">トレンド</span>
                <div class="trending">
                    <div class="trend-cnt">
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($trend as $post_trend)
                            <a href="#" class="trend-item">
                                <span class="number center">{{ $count++ }}</span>
                                <span class="center">{{ $post_trend->title }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="cate-blc-bot">
                <span class="hd">報連相ラボのおすすめ</span>
                <div class="card">
                    <img src="{{ asset('client/images/anh1.jpg') }}" alt="">
                    <div class="pick-dis">
                        <span class="cnt center">みそちるか</span>
                        <span class="center">1 Dai Co Viet、ハイバーチュン、ハノイ</span>
                        <div class="pick-dis-bot">
                            <span wire:click='favoritePost({{ $miso->id }})'>
                                @if (Auth::check())
                                    <i class="{{ Auth::user()->favoritePosts->where('id', $miso->id)->first()? 'fa-solid': 'fa-regular' }} fa-bookmark fa-xl"
                                        style="{{ Auth::user()->favoritePosts->where('id', $miso->id)->first()? 'color:#2b8ae8': 'color:#000' }}"></i>
                                    {{-- @else
                                <i class="fa-regular fa-bookmark fa-xl"
                                    style="color:#000"></i> --}}
                                @endif
                            </span>
                            <a href="{{ route('post_detail', $miso->id) }}" wire:navigate>
                                <i class="fa-solid fa-arrow-right fa-xl" style="color: #71a5fe;"></i>
                            </a>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-main">
            @if ($loggedin)
                <a href="http://localhost:8080/Javzine/admin/posts/create"><button style="background-color:#2b8ae8; color: white; width:100%; height: 50px; font-weight: bold; font-size: 14pt; margin-bottom: 20px">投稿を作成</button></a>
            @endif
            @foreach ($posts as $post)
                <div class="content-item">
                    <a href="{{ route('post_detail', $post->id) }}" wire:navigate class="cnt-img">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="">
                    </a>
                    <div class="cnt-dis">
                        <a href="{{ route('post_detail', $post->id) }}" wire:navigate class="cnt-dis-top">
                            <span class="cnt-hd">{{ mb_strtoupper($post->category->name, 'UTF-8') }}</span> <br>
                            <span>{{ $post->title }}</span>
                        </a>
                        <div class="cnt-dis-bot">
                            <span>{{ date_format($post->created_at, 'Y-m-d') }}</span>
                            <span wire:key="{{ $post->id }}" wire:click='favoritePost({{ $post->id }})'>
                                @if (Auth::check())
                                    <i class="{{ Auth::user()->favoritePosts->where('id', $post->id)->first()? 'fa-solid': 'fa-regular' }} fa-bookmark fa-xl"
                                        style="{{ Auth::user()->favoritePosts->where('id', $post->id)->first()? 'color:#2b8ae8': 'color:#000' }}"></i>
                                    {{-- @else
                                    <i class="fa-regular fa-bookmark fa-xl"
                                        style="color:#000"></i> --}}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="more-btn center">
                @if ($posts->count() == $max)
                    <button>記事は終わった</button>
                @else
                    {{-- <button wire:click='add'>{{ $count }}</button> --}}
                    <button wire:click='add'>もっと記事を見る</button>
                @endif
            </div>
        </div>

        <div class="side-bar-2">
            <span class="hd">トレンド</span>
            <div class="trending">
                <div class="trend-cnt">
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($trend as $post_trend)
                        <a href="{{ route('post_detail', $post_trend->id) }}" wire:navigate class="trend-item">
                            <span class="number center">{{ $count++ }}</span>
                            <span class="center">{{ $post_trend->title }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-top">
        <span class="center"><i class="fa-solid fa-angle-up"></i></span>
    </div>

</div>

<!-- end content -->
