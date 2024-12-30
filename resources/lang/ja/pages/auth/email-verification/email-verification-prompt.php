<?php

return [

    'title' => 'メールアドレスの確認',

    'heading' => 'メールアドレスの確認',

    'actions' => [

        'resend_notification' => [
            'label' => '再送信する',
        ],

    ],

    'messages' => [
        'notification_not_received' => '送信したメールを受け取っていませんか？',
        'notification_sent' => ':email に確認メールを送信しました。メールの指示に従って、メールアドレスを確認してください。',
    ],

    'notifications' => [

        'notification_resent' => [
            'title' => 'メールを再送信しました。',
        ],

        'notification_resend_throttled' => [
            'title' => '再送信の試行回数が多すぎます',
            'body' => ':seconds 秒後にもう一度お試しください。',
        ],

    ],

];
