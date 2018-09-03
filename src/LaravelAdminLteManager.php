<?php

namespace Elnooronline\LaravelAdminLte;

class LaravelAdminLteManager
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var array
     */
    private $appConfig;

    /**
     * LaravelAdminLteManager constructor.
     *
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->appConfig = config('app');
        $this->skin = $this->config['appearence']['skin'];
    }

    public function getGravatar($email)
    {
        return 'https://www.gravatar.com/avatar/'.md5($email);
    }
}