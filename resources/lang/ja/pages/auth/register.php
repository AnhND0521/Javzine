<?php

return [

    'title' => '登録',

    'heading' => 'サインアップ',

    'actions' => [

        'login' => [
            'before' => 'または',
            'label' => 'アカウントにサインイン',
        ],

    ],

    'form' => [

        'email' => [
            'label' => 'メールアドレス',
        ],

        'name' => [
            'label' => '名前',
        ],

        'password' => [
            'label' => 'パスワード',
            'validation_attribute' => 'パスワード',
        ],

        'password_confirmation' => [
            'label' => 'パスワードの確認',
        ],

        'actions' => [

            'register' => [
                'label' => 'サインアップ',
            ],

        ],

    ],

    'notifications' => [

        'throttled' => [
            'title' => '登録試行回数が多すぎます',
            'body' => ':seconds 秒後にもう一度お試しください。',
        ],

    ],

];
