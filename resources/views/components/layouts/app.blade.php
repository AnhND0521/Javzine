<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavZine</title>
    <link rel="icon" href="{{ asset('client/images/logoxx.png') }}" type="image/l-icon">
    <link rel="stylesheet" href="{{ asset('client/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/news.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <livewire:header />
    {{ $slot }}
    <livewire:footer />
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('client/js/home.js') }}"></script>

</html>
