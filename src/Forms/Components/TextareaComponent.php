<?php

namespace Laraboot\Forms\Components;


use Laraboot\Contracts\Forms\Components\LocalizableComponent;
use Laraboot\Forms\Traits\LocalizableComponent as LocalizableComponentTrait;

class TextareaComponent extends TextualComponent implements LocalizableComponent
{
    use LocalizableComponentTrait;

    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'laraboot::forms.textarea';

    /**
     * Set textarea cols attribute.
     *
     * @param $cols
     * @return $this
     */
    public function cols($cols)
    {
        $this->attributes['cols'] = $cols;

        return $this;
    }

    /**
     * Set textarea rows attribute.
     *
     * @param $rows
     * @return $this
     */
    public function rows($rows)
    {
        $this->attributes['rows'] = $rows;

        return $this;
    }
}