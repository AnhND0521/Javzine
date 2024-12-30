<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JAVZine</title>
    <link rel="icon" href="{{ asset('client/images/logoxx.png') }}" type="image/l-icon">
    <link rel="stylesheet" href="{{ asset('client/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/news.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/profile.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/js/app.js')
    @livewireStyles
</head>

<body>
    @auth
        <livewire:notification_handle />
    @endauth
    <livewire:header />
    {{ $slot }}
    <livewire:footer />
</body>
@livewireScripts
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('client/js/home.js') }}"></script>
<script type="module">
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Initializing Laravel Echo...');

        window.Echo.private('notifications.' + {{ auth()->id() }})
            .listen('.NotificationEvent', (data) => {
                console.log('Notification received:', data);
                const link = document.createElement("a");
                link.href = `/Javzine/post/${data.post_id || 'undefined'}`;
                link.innerHTML = `${data.body}`;
                link.style.color = "#fff";
                link.style.textDecoration = "none";
                let toastRealTime = Toastify({
                    node: link,
                    duration: 0,
                    close: true,
                    gravity: "top",
                    position: "right",
                    style: {
                        backgroundColor: "linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 0%, rgba(0,212,255,1) 100%, rgba(1,111,151,1) 100%)",
                    }
                }).showToast();

                setTimeout(() => {
                    const closeButton = toastRealTime.toastElement.querySelector(".toast-close");
                    if (closeButton) {
                        closeButton.addEventListener("click", () => {
                            console.log(
                                `Close button clicked for notification ID: ${data.id}`
                            );
                            Livewire.dispatch('markNotificationAsRead', {
                                id: data.id
                            });
                        });
                    }
                }, 100);
            })
            .error((error) => {
                console.error('Error connecting to channel:', error);
            });
    });
</script>

</html>
