<?php

namespace Laraboot\Forms\Components\Traits;

trait HasPlaceholder
{
    /**
     * @param $placeholder
     * @return $this
     */
    public function placeholder($placeholder)
    {
        $this->attributes['placeholder'] = $placeholder;

        return $this;
    }
}