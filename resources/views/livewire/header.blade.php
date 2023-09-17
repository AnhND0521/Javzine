<div id="header">
    <div class="heading">
        <a href="{{ route('index') }}" class="logo" wire:navigate>
            <img src="{{ asset('client/images/logo.png') }}" alt="">
        </a>
        <div class="search center ">
            <form class="search-box {{ $key == '' ? '' : 'border-hidden' }}" wire:submit='sendKey'>
                <button>
                    <i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i>
                </button>
                <input type="text" wire:model='key' wire:keyup="search"
                    placeholder="Nhập từ khóa, chủ đề, tác giả,...">
                @if ($key != '')
                    <ul id="result">
                        @foreach ($searchPosts as $result)
                            <li><a href="{{ route('post_detail', $result->id) }}" wire:navigate><i
                                        class="fa-solid fa-magnifying-glass"></i>{{ $result->title }}</a></li>
                        @endforeach
                    </ul>
                @endif

            </form>
        </div>

        @if (!Auth::check())
            <div class="log-btn center">
                <a href="{{ route('login') }}" class="sign-in-btn center">
                    Đăng nhập
                </a>
                <a href="{{ route('register') }}" class="regis-btn center">
                    Đăng ký
                </a>
            </div>
        @else
            <div class="auth">
                @if (!$userAvatar)
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                        style="background-color: #2b8ae8;" alt="">
                @else
                    <img src="{{ asset('storage/' . $userAvatar) }}" style="background-color: #2b8ae8;" alt="">
                @endif
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="dropdown-profile">
                <div>
                    <a href="{{ route('profile') }}" wire:navigate>Tài khoản</a>
                    <a href="{{url('admin/posts')}}">Quản lý bài viết</a>
                    <a href="{{ route('change_pass') }}">Đổi mật khẩu</a>
                    <a href="#" wire:click='logout'>Đăng xuất</a>
                </div>
            </div>
        @endif
    </div>

    <div class="nav-bar">
        <div class="left-nav">
            <button class="nav-btn" type="button">
                <i class="fa-solid fa-bars-staggered fa-2xl" style="color: #000000;"></i>
            </button>
            <a href="{{ route('index') }}" wire:navigate>
                <img src="{{ asset('client/images/logo.png') }}" alt="">
            </a>
        </div>
        <div class="right-nav">
            @if (Auth::check())
                <a href="{{route('profile')}}" wire:navigate>
                    <i class="fa-solid fa-user fa-xl" style="color: #000000;"></i>
                </a>
            @else
                <a href="{{route('login')}}">
                    <i class="fa-solid fa-user fa-xl" style="color: #000000;"></i>
                </a>
            @endif

        </div>
        <div class="shadow">
        </div>
        <div class="nav-respon">
            <div class="close-nav">
                <i class="fa-solid fa-x"></i>
            </div>
            <div class="nav-content">
                <h3>Category</h3>
                <div class="cate-blc-top">
                    @foreach ($cats as $cat)
                        <a href="{{ route('category', $cat->id) }}" class="cate-item" wire:navigate style="">
                            <div class="center"><i class="{{ $cat->icon }}" style="color: {{ $cat->color }}"></i>
                            </div>
                            <span>{{ $cat->name }}</span>
                        </a>
                    @endforeach
                </div>
                <h3>Theo dõi chúng tôi</h3>
                <div class="follow">
                    <i class="fa-brands fa-facebook fa-2xl" style="color: #2f42d0;"></i>
                    <i class="fa-brands fa-youtube fa-2xl" style="color: #ee2b2b;"></i>
                    <i class="fa-brands fa-instagram fa-2xl" style="color: #000000;"></i>
                    <i class="fa-brands fa-pinterest-p fa-2xl" style="color: #000000;"></i>
                    <i class="fa-brands fa-tiktok fa-2xl" style="color: #000000;"></i>
                </div>
                <div class="link-blc">
                    <a href="">Liên hệ</a>
                    <a href="">Cộng tác nội dung</a>
                    <a href="">Chính sách bảo mật</a>
                    <a style="border: none;" href="">Thỏa thuận người dùng</a>
                </div>
            </div>
        </div>
    </div>
    @if ($key != '')
        <div class="box-shadow" wire:click='resetKey'>
        </div>
    @endif
</div>
