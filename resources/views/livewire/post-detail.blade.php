<div id="content">
    <style>
        @media (max-width: 1350px) {
            .side-bar-1 {
                display: none;
            }

            .side-bar-2 {
                display: none;
            }

            .content-main {
                width: 100% !important;
                margin-left: 0 !important;
            }
        }
    </style>
    <div class="content-top">

        <div class="side-bar-1">
        </div>
        {{-- @if (session('error'))
            <div class="notify" style="border:1px solid #c0392b !important;">{{ session('error') }}
                <span class="close"><i class="fa-regular fa-circle-xmark"></i></span>
            </div>
        @elseif (session('success'))
            <div class="notify">{{ session('success') }}
                <span class="close"><i class="fa-regular fa-circle-xmark"></i></span>
            </div>
        @endif --}}
        <div class="content-main">
            <div class="news-main">
                <article>
                    <div class="category"><span>{{ mb_strtoupper($post->category->name, 'UTF-8') }}</span></div>
                    <h1>{{ $post->title }}</h1>
                    <p class="intro"><i>{{ $post->intro }}</i></p>
                    <div class="post_content">
                        {!! $post->content !!}
                    </div>
                </article>

                <div class="more-news">
                    <span class="news-hd">Xem thêm</span>
                    <div class="more-news-dis">
                        <a href="{{ route('post_detail', $more->id) }}" wire:navigate class="news-img">
                            <img src="{{ asset('storage/' . $more->thumbnail) }}" alt="">
                        </a>
                        <a href="{{ route('post_detail', $more->id) }}" wire:navigate class="news-dis center">
                            <span class="news-hd">{{ $more->title }}</span>
                        </a>
                    </div>
                </div>
                <span class="news-hd">JAVZine.vn</span>
                <div class="author">
                    <div class="detail">
                        <span>{{ date_format($post->created_at, 'Y-m-d') }}</span><br>
                        <span>Bài: {{ $post->user->name }}</span><br>
                        <span>Nguồn: JavZine</span>
                    </div>
                    <div class="tag">
                        <span>Tag:</span>
                        <div class="list-tag">
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('search_results', $tag) }}">#{{ $tag }}</a>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="news-btn">
                    <a class="comment-button">
                        <i class="fa-regular fa-comment fa-xl" style="color: #000000;"></i>
                    </a>
                    @if (Auth::check())
                        <a style="cursor: pointer" wire:click='favoritePost({{ $post->id }})'>
                            <i class="{{ Auth::user()->favoritePosts->where('id', $post->id)->first()? 'fa-solid': 'fa-regular' }} fa-bookmark fa-xl"
                                style="{{ Auth::user()->favoritePosts->where('id', $post->id)->first()? 'color:#2b8ae8': 'color:#000' }}"></i>
                        </a>
                    @else
                        <a style="cursor: pointer" wire:click='favoritePost({{ $post->id }})'>
                            <i class="fa-regular fa-bookmark fa-xl" style="color:#000"></i>
                        </a>
                    @endif
                    <a href="#">
                        <i class="fa-regular fa-share-from-square fa-xl" style="color: #000000;"></i>
                    </a>
                    <a class="btn-feedback">
                        <i class="fa-regular fa-flag fa-xl" style="color: #000000;"></i>
                    </a>
                </div>
            </div>
            <div class="login-request">
                @if (!Auth::check())
                    <div class="lt-blc">
                        <span>Đăng nhập tài khoản để bình luận</span>
                    </div>
                    <div class="rt-blc">
                        <a href="{{ route('login') }}">Đăng nhập</a>
                        <a href="{{ route('register') }}">Đăng ký</a>
                    </div>
                @endif
                @if (Auth::check())
                    <form class="comment" wire:submit.prevent="Send">
                        <textarea wire:model='body' placeholder="Nhập bình luận của bạn" cols="15" rows="8"></textarea>
                        <div class="submit"><button>Đăng bình luận</button></div>
                    </form>
                @endif
                <div class="bot-blc">
                    <!-- <span>Không có bình luận nào.</span> -->
                    <ul class="list-comment">
                        @if ($comments->count() > 0)
                            @foreach ($comments as $comment)
                                <li class="comment-item">
                                    <div class="img-user">
                                        @if ($comment->user->avatar)
                                            <img src="https://ui-avatars.com/api/?name={{ $comment->user->name }}"
                                                style="background-color: #2b8ae8;" alt="">
                                        @else
                                            <img src="{{ asset('storage/' . $comment->user->avatar) }}"
                                                style="background-color: #2b8ae8;" alt="">
                                        @endif
                                    </div>
                                    <div class="user-detail">
                                        <div class="top">
                                            <span class="username">{{ $comment->user->name }}</span>
                                            <span
                                                class="time">{{ date_format($comment->created_at, 'Y-m-d') }}</span>
                                        </div>
                                        <div class="bot">
                                            <span>{{ $comment->body }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <span style="color: #4c4c4c;font-size:18px;font-weight:500">Không có bình luận nào</span>
                        @endif


                    </ul>
                </div>
            </div>

            <div class="more-news-item">
                <p>Bài viết đề xuất</p>
                @foreach ($recomment as $post_rcm)
                    <div class="content-item">
                        <a href="{{ route('post_detail', $post_rcm->id) }}" wire:navigate class="cnt-img">
                            <img src="{{ asset('storage/' . $post_rcm->thumbnail) }}" alt="">
                        </a>
                        <div class="cnt-dis">
                            <a href="{{ route('post_detail', $post_rcm->id) }}" wire:navigate class="cnt-dis-top">
                                <span class="cnt-hd">{{ mb_strtoupper($post_rcm->category->name, 'UTF-8') }}</span>
                                <br>
                                <span>{{ $post_rcm->title }}</span>
                            </a>
                            <div class="cnt-dis-bot">
                                <span>{{ date_format($post_rcm->created_at, 'Y-m-d') }}</span>
                                <span wire:key="{{ $post_rcm->id }}" wire:click='favoritePost({{ $post_rcm->id }})'>
                                    @if (Auth::check())
                                        <i class="{{ Auth::user()->favoritePosts->where('id', $post_rcm->id)->first()? 'fa-solid': 'fa-regular' }} fa-bookmark fa-xl"
                                            style="{{ Auth::user()->favoritePosts->where('id', $post_rcm->id)->first()? 'color:#2b8ae8': 'color:#000' }}"></i>
                                        {{-- @else
                                    <i class="fa-regular fa-bookmark fa-xl"
                                        style="color:#000"></i> --}}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="body-shadow">
            <div class="bs-content">
                <form id="feedback" wire:submit.prevent="sendFeedback">
                    <div class="fb-content">
                        <textarea wire:model='content' placeholder="Nhập góp ý của bạn" id=""></textarea>
                        {{-- @error('content')
                            <span>{{$message}}</span>
                        @enderror --}}
                    </div>
                    <div id="list-btn">
                        <a class="btn btn-close center">Đóng</a>
                        <button class="btn-send btn">Gửi ý kiến</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="side-bar-2">
        </div>
    </div>
    <div class="scroll-top">
        <span class="center"><i class="fa-solid fa-angle-up"></i></span>
    </div>
</div>
