<div id="content" class="center" style="background-image: url({{ asset('client/images/background.jpg') }})">
    <div class="lg-form">
        <form class="login-form" wire:submit.prevent='resetPass'>
            @if (session('error'))
                <div class="notify" style="border:1px solid #c0392b !important;">{{ session('error') }}
                    <span class="close"><i class="fa-regular fa-circle-xmark"></i></span>
                </div>
            @elseif (session('success'))
                <div class="notify">{{ session('success') }}
                    <span class="close"><i class="fa-regular fa-circle-xmark"></i></span>
                </div>
            @endif
            <h2 class="hd">パスワードを回復する</h2>
            <span class="hd-sub">メールアドレスを入力して</span>
            <input type="email" wire:model='email' id="email" placeholder="電子メールアドレス">
            @error('email')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <div class="button">
                <a href="{{ route('login') }}" wire:navigate class="fg-pass center">ログイン</a>
                <button style="cursor: pointer" class="login-btn">パスワードを取得する<div wire:loading>
                        ...
                    </div></button>
            </div>
            <div class="or center"><span>または</span></div>
            <div class="center" style="flex-direction: column;">
                <div class="n-login center">
                    <img src="{{ asset('client/images/gg.svg') }}" alt="">
                    <a href="{{route('login_google')}}">
                        Google を続ける
                    </a>
                </div>
                <div class="n-login center">
                    <img src="{{ asset('client/images/icons8-home.svg') }}" alt="">
                    <a href="">
                        ホームページに戻る
                    </a>
                </div>
            </div>
            <div class="regis">
                <span class="center">まだアカウントを持たない</span>
                <a href="{{ route('register') }}" wire:navigate class="regis-button">登録する</a>
            </div>
        </form>
    </div>
    <script>
        window.addEventListener('resetPass', event => {
            setTimeout(function() {
                $(".notify").fadeIn(500);
            }, 0)
            setTimeout(function() {
                $(".notify").fadeOut(500); // Ẩn trong 0.5 giây
            }, 4000);
            $('.close').click(function() {
                $(".notify").fadeOut(500);
            })
        });
    </script>
</div>
