<?php

namespace Laraboot\Forms\Components;

use Laraboot\Forms\Components\Traits\HasMinAndMaxAttributes;

class NumberComponent extends TextualComponent
{
    use HasMinAndMaxAttributes;

    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'laraboot::forms.number';
}
