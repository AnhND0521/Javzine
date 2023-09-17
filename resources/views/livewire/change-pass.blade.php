<div id="content" class="center" style="background-image: url({{ asset('client/images/background.jpg') }})">
    <div class="lg-form">
        <form class="login-form" wire:submit.prevent='update'>
            @if (session('success'))
                <div class="notify">{{ session('success') }}
                    <span class="close"><i class="fa-regular fa-circle-xmark"></i></span>
                </div>
            @endif
            <h2 class="hd">Đổi mật khẩu</h2>
            <input type="password" id="newPass" wire:model='newPass' placeholder="Mật khẩu mới">
            @error('newPass')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <input type="password" id="renewPass" wire:model='renewPass' placeholder="Nhập lại mật khẩu mới">
            @error('renewPass')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <div class="button">
                <button style="cursor: pointer" class="login-btn">Đổi mật khẩu</button>
            </div>
            <div class="or center"><span>hoặc</span></div>
            <div class="center" style="flex-direction: column;">
                <div class="n-login center">
                    <img src="{{ asset('client/images/icons8-home.svg') }}" alt="">
                    <a href="{{ route('index') }}">
                        Quay lại trang chủ
                    </a>
                </div>
            </div>
        </form>
    </div>
    <script>
        window.addEventListener('update', event => {
            setTimeout(function() {
                $(".notify").fadeIn(500);
            }, 0)
            setTimeout(function() {
                $(".notify").fadeOut(500); // Ẩn trong 0.5 giây
            }, 2000);
            $('.close').click(function() {
                $(".notify").fadeOut(500);
            })
        });
    </script>
</div>
