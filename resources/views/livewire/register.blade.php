<div id="content" class="center" style="background-image: url({{ asset('client/images/background.jpg') }})">
    <div class="lg-form" style="height: auto;">
        <form class="login-form" wire:submit.prevent='store' action="">
            <h2 class="hd">登録する</h2>
            <span class="hd-sub">メールでサインアップ</span>
            <input type="text" wire:model='name' id="name" placeholder="あなたの名前">
            @error('name')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <input type="email" wire:model='email' id="email" placeholder="アカウントのメールアドレス">
            @error('email')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <input type="password" wire:model='password' id="password" placeholder="パスワード">
            @error('password')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <input type="password" wire:model='re_password' id="re_password" placeholder="パスワードを再入力して">
            @error('re_password')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <div class="button">
                <div class="c-box">
                    <a class="center fg-pass" href="{{route('login')}}">
                        ログイン
                    </a>
                </div>
                <button class="login-btn" style="cursor: pointer">アカウントを作成する</button>
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
                    <a href="{{route('index')}}">
                        ホームページに戻る
                    </a>
                </div>
            </div>
            <div class="acp">
                <span>アカウントを作成すると、<a href="">報連相ラボのユーザー契約</a>および<a
                        href="">プライバシー ポリシー</a> に同意したことになります。</span>
            </div>
        </form>
    </div>
</div>
