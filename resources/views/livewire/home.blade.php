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
            <span class="hd">CATEGORY</span>
            <div class="cate-blc-top">
                @foreach ($cats as $cat)
                    <a href="{{ route('category', $cat->id) }}" wire:navigate class="cate-item">
                        <div class="center"><i class="{{ $cat->icon }}" style="color: {{ $cat->color }}"></i></div>
                        <span>{{ $cat->name }}</span>
                    </a>
                @endforeach


            </div>
            <div class="res-trend">
                <span class="hd">TRENDING</span>
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
                <span class="hd">KILALA'S PICK</span>
                <div class="card">
                    <img src="{{ asset('client/images/anh1.jpg') }}" alt="">
                    <div class="pick-dis">
                        <span class="cnt center">Miso Chiruka</span>
                        <span class="center">1 Đại Cồ Việt, Hai Bà Trưng, Hà Nội</span>
                        <div class="pick-dis-bot">
                            <span wire:click='favoritePost({{ $miso->id }})'>
                                @if (Auth::check())
                                    <i class="{{ Auth::user()->favoritePosts->where('id',$miso->id)->first()? 'fa-solid': 'fa-regular' }} fa-bookmark fa-xl"
                                        style="{{ Auth::user()->favoritePosts->where('id', $miso->id)->first()? 'color:#2b8ae8': 'color:#000' }}"></i>
                                    {{-- @else
                                <i class="fa-regular fa-bookmark fa-xl"
                                    style="color:#000"></i> --}}
                                @endif
                            </span>
                            <a href="{{route('post_detail',$miso->id)}}" wire:navigate>
                                <i class="fa-solid fa-arrow-right fa-xl" style="color: #71a5fe;"></i>
                            </a>


                        </div>
                    </div>
                </div>
            </div>
            <div class="res-j-dict">
                <div class="j-dict">
                    <span class="hd">J-DICT</span>
                    <div class="j-dis">
                        <span class="center">Manatsubi</span> <br>
                        <span class="center" style="color: #2b8ae8; font-size: 24px; font-weight: 600;">真夏日</span> <br>
                        <span class="center" style="font-size: 20px;
                        font-weight: 600;">Chân Hạ
                            Nhật</span> <br>
                        <span class="center">Những ngày hè khi nhiệt độ chạm hoặc vượt ngưỡng 30*C</span> <br>
                        <div class="j-dis-bot">
                            <span wire:click='favoritePost({{ $natsu->id }})'>
                                @if (Auth::check())
                                    <i class="{{ Auth::user()->favoritePosts->where('id',$natsu->id)->first()? 'fa-solid': 'fa-regular' }} fa-bookmark fa-xl"
                                        style="{{ Auth::user()->favoritePosts->where('id', $natsu->id)->first()? 'color:#2b8ae8': 'color:#000' }}"></i>
                                    {{-- @else
                                <i class="fa-regular fa-bookmark fa-xl"
                                    style="color:#000"></i> --}}
                                @endif
                            </span>
                            <a href="{{route('post_detail',$natsu->id)}}"  wire:navigate>
                                <i class="fa-solid fa-arrow-right fa-xl" style="color: #71a5fe;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-main">
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
                    <button>Đã hết bài viết</button>
                @else
                    <button wire:click='add'>Xem thêm bài viết</button>
                @endif
            </div>
        </div>

        <div class="side-bar-2">
            <span class="hd">TRENDING</span>
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

            <div class="j-dict">
                <span class="hd">J-DICT</span>
                <div class="j-dis">
                    <span class="center">Manatsubi</span> <br>
                    <span class="center" style="color: #2b8ae8; font-size: 24px; font-weight: 600;">真夏日</span> <br>
                    <span class="center" style="font-size: 20px;
                    font-weight: 600;">Chân Hạ
                        Nhật</span> <br>
                    <span class="center">Những ngày hè khi nhiệt độ chạm hoặc vượt ngưỡng 30*C</span> <br>
                    <div class="j-dis-bot">
                        <span wire:click='favoritePost({{ $natsu->id }})'>
                            @if (Auth::check())
                                <i class="{{ Auth::user()->favoritePosts->where('id',$natsu->id)->first()? 'fa-solid': 'fa-regular' }} fa-bookmark fa-xl"
                                    style="{{ Auth::user()->favoritePosts->where('id', $natsu->id)->first()? 'color:#2b8ae8': 'color:#000' }}"></i>
                                {{-- @else
                            <i class="fa-regular fa-bookmark fa-xl"
                                style="color:#000"></i> --}}
                            @endif
                        </span>
                        <a href="{{route('post_detail',$natsu->id)}}"  wire:navigate>
                            <i class="fa-solid fa-arrow-right fa-xl" style="color: #71a5fe;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-top">
        <span class="center"><i class="fa-solid fa-angle-up"></i></span>
    </div>

</div>

<!-- end content -->
