<div id="content" class="center" style="background-image: url({{ asset('client/images/background.jpg') }})">
    <div class="lg-form" style="height: auto;">
        <form class="login-form" wire:submit.prevent='store' action="">
            <h2 class="hd">Đăng ký</h2>
            <span class="hd-sub">Đăng ký với Email</span>
            <input type="text" wire:model='name' id="name" placeholder="Tên của bạn">
            @error('name')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <input type="email" wire:model='email' id="email" placeholder="Email tài khoản">
            @error('email')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <input type="password" wire:model='password' id="password" placeholder="Mật khẩu">
            @error('password')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <input type="password" wire:model='re_password' id="re_password" placeholder="Nhập lại mật khẩu">
            @error('re_password')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <div class="button">
                <div class="c-box">
                    <a class="center fg-pass" href="{{route('login')}}">
                        Đăng nhập
                    </a>
                </div>
                <button class="login-btn" style="cursor: pointer">Tạo tài khoản</button>
            </div>
            <div class="or center"><span>hoặc</span></div>
            <div class="center" style="flex-direction: column;">
                <div class="n-login center">
                    <img src="{{ asset('client/images/gg.svg') }}" alt="">
                    <a href="{{route('login_google')}}">
                        Tiếp tục với Google
                    </a>
                </div>
                <div class="n-login center">
                    <img src="{{ asset('client/images/icons8-home.svg') }}" alt="">
                    <a href="{{route('index')}}">
                        Quay lại trang chủ
                    </a>
                </div>
            </div>
            <div class="acp">
                <span>Bằng việc tạo tài khoản bạn đã đồng ý với <a href="">Thỏa thuận người dùng</a> và <a
                        href="">Chính sách bảo mật</a> của Kilala.</span>
            </div>
        </form>
    </div>
</div>
