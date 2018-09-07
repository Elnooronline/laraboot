<?php

return [

    /*
     * The logo of the dashboard.
     */
    'logo' => '<b>Lara</b>boot',


    /*
     * The small logo of the dashboard.
     */
    'small_logo' => '<b>L</b>b',

    /*
     * The name of the dashboard.
     */
    'name' => env('APP_NAME', 'Laraboot'),

    'appearence' => [

        /*
         * Supported values are black, black-light, blue, blue-light,
         *  green, green-light, purple, purple-light,
         *  red, red-light, yellow and yello-light.
         */
        'skin' => 'red',

        /*
         * The direction of the dashboard.
         */
        'dir' => 'ltr',

        /*
         * The header items that will be rendered.
         */
        'header' => [
            'items' => [
                'laraboot::panel.layout.header.messages',
                'laraboot::panel.layout.header.notifications',
                'laraboot::panel.layout.header.tasks',
                'laraboot::panel.layout.header.user',
                //'laraboot::panel.layout.header.logout',
            ],
        ],

        /*
         * The sidebar items that will be rendered.
         */
        'sidebar' => [
            'items' => [
                'laraboot::panel.layout.sidebar.user-panel',
                'laraboot::panel.layout.sidebar.search-form',
                'laraboot::panel.layout.sidebar.items',
            ],
        ],
    ],

    'urls' => [
        /*
        |--------------------------------------------------------------------------
        | URLs
        |--------------------------------------------------------------------------
        |
        | Register here your dashboard main urls, base, logout, login, etc...
        | The options that can be nullable is register and password_request meaning that it can be disabled.
        |
        */
        'base' => '/',
        'logout' => 'logout',
        'login' => 'login',
        'register' => 'register',
        'password_request' => 'password/reset',
        'password_email' => 'password/email',
        'password_reset' => 'password/reset',
    ],
];
