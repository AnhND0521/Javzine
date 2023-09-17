<div id="content">
    <div class="content-top">
        <div class="side-bar-1">
        </div>
        <div class="content-main">
            <div class="account-blc center">
                <h1>Tài khoản</h1>
            </div>
            <form class="acc-pro pro-dis" wire:submit.prevent="update">
                <h3>Thông tin tài khoản</h3>
                <span>Là thông tin xuất hiện công khai trên hồ sơ của bạn</span>
                <div>
                    <div class="name-block">
                        <label for="">Tên hiển thị</label> <br>
                        <input wire:model='name' type="text" class="name-pro"><br>
                        <label for="">Email</label> <br>
                        <input type="text" value="{{ Auth::user()->email }}" class="name-pro" disabled>
                    </div>
                    <div class="img-block">
                        <label for="img-update" style="cursor:pointer;">Chọn ảnh mới</label>
                        <input wire:model='avatar' type="file" id="img-update">
                        @if (!$avatar)
                            @if (!$currentAvatar)
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                                    style="background-color: #2b8ae8;" alt="">
                            @else
                                <img src="{{ asset('storage/'.Auth::user()->avatar) }}" style="background-color: #2b8ae8;"
                                    alt="">
                            @endif
                        @else
                            <img src="{{ $avatar->temporaryUrl() }}">
                        @endif

                    </div>

                </div>
                <div class="account-blc">
                    <button style="cursor: pointer;" class="btn-item">Chỉnh sửa <div wire:loading>...</div></button>
                    <a wire:click='logout' class="btn-logout btn-item">Đăng xuất</a>
                </div>
            </form>
            @if ($favoritePosts->count() > 0)
                <div class="save-pro" style="margin-top:50px">
                    <h3 style="margin-bottom:20px">Bài viết đã lưu</h3>
                    @foreach ($favoritePosts as $post)
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
                                    <span wire:key="{{ $post->id }}"
                                        wire:click='favoritePost({{ $post->id }})'>
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
                </div>
            @endif
        </div>

        <div class="side-bar-2">
        </div>
    </div>
    <div class="scroll-top">
        <span class="center"><i class="fa-solid fa-angle-up"></i></span>
    </div>
</div>
