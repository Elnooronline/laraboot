<?php

namespace Laraboot\Forms\Components;

use Laraboot\Contracts\Forms\Components\LocalizableComponent;
use Laraboot\Forms\Components\Traits\HasMinLengthAndMaxLengthAttributes;
use Laraboot\Forms\Traits\LocalizableComponent as LocalizableComponentTrait;

class TextComponent extends TextualComponent implements LocalizableComponent
{
    use LocalizableComponentTrait, HasMinLengthAndMaxLengthAttributes;

    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'laraboot::forms.text';
}