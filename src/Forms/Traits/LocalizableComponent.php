<?php

namespace Laraboot\Forms\Traits;

use Laraboot\Localization\Locale;

trait LocalizableComponent
{
    /**
     * @var \Laraboot\Localization\Locale
     */
    protected $locale;

    /**
     * Determine if the label will be translated or not.
     *
     * @var bool
     */
    protected $transformLabel = true;

    /**
     * Add the given lang to the name attribute.
     *
     * @param $code
     * @param $name
     * @return $this
     */
    public function locale(Locale $locale = null)
    {
        $this->locale = $locale;

        $this->setDefaultLabel($this->name);

        return $this;
    }

    /**
     * @param $transformLabel
     * @return $this
     */
    public function transformLabel($transformLabel)
    {
        $this->transformLabel = $transformLabel;

        return $this;
    }

    /**
     * Transform the properties to be used in view.
     *
     * @param array $properties
     * @return array
     */
    protected function transformProperties(array $properties)
    {
        $locale = optional($this->locale);

        $nameHasBrackets = $this->nameHasBrackets;

        if ($locale->code) {
            $properties['nameWithoutBrackets'] = "{$this->nameWithoutBrackets}:{$this->locale->code}";

            if ($nameHasBrackets) {
                $properties['name'] = "{$this->nameWithoutBrackets}:{$this->locale->code}[]";
            } else {
                $properties['name'] = "{$this->nameWithoutBrackets}:{$this->locale->code}";
            }
        }

        if ($this->transformLabel && $locale->name) {
            $properties = array_merge($properties, [
                'label' => "{$this->label} ({$this->locale->native})",
            ]);
        }

        return $properties;
    }
}
