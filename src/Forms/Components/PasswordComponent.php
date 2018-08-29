<?php

namespace Laraboot\Forms\Components;

use Laraboot\Forms\Components\Traits\HasMinLengthAndMaxLengthAttributes;

class PasswordComponent extends TextualComponent
{
    use HasMinLengthAndMaxLengthAttributes;

    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'laraboot::forms.password';
}