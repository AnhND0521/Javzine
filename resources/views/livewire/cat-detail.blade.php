<div id="content">
    <div class="content-top">
        <div class="side-bar-1">
        </div>

        <div class="content-main">
            <span class="danhmuc">{{ $cat->name }}</span>
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
                    <button wire:click='more'>もっと記事を見る</button>
                @endif
            </div>
        </div>

        <div class="side-bar-2">

        </div>
    </div>
    <div class="scroll-top">
        <span class="center"><i class="fa-solid fa-angle-up"></i></span>
    </div>
</div>
