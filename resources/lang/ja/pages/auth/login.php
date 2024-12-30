<?php

return [

    'title' => 'ログイン',

    'heading' => 'サインイン',

    'actions' => [

        'register' => [
            'before' => 'または',
            'label' => 'アカウントを作成する',
        ],

        'request_password_reset' => [
            'label' => 'パスワードを忘れた場合',
        ],

    ],

    'form' => [

        'email' => [
            'label' => 'メールアドレス',
        ],

        'password' => [
            'label' => 'パスワード',
        ],

        'remember' => [
            'label' => 'ログイン状態を保持する',
        ],

        'actions' => [

            'authenticate' => [
                'label' => 'サインイン',
            ],

        ],

    ],

    'messages' => [

        'failed' => 'これらの認証情報は、当社の記録と一致しません。',

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'ログイン試行回数が多すぎます',
            'body' => ':seconds 秒後にもう一度お試しください。',
        ],

    ],

];
