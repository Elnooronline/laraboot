<?php

namespace Laraboot\Contracts\Forms\Components;

use Laraboot\Localization\Locale;

interface LocalizableComponent
{
    public function locale(Locale $locale = null);
}
