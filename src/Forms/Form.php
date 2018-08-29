<?php

namespace Laraboot\Forms;

use Collective\Html\FormBuilder;
use Laraboot\Localization\Locale;
use Laraboot\Forms\Traits\HasOpenAndClose;
use Laraboot\Forms\Components\FileComponent;
use Laraboot\Forms\Components\TextComponent;
use Laraboot\Forms\Components\TimeComponent;
use Laraboot\Forms\Components\DateComponent;
use Laraboot\Forms\Components\EmailComponent;
use Laraboot\Forms\Components\RadioComponent;
use Laraboot\Forms\Components\NumberComponent;
use Laraboot\Forms\Components\SelectComponent;
use Laraboot\Forms\Components\SubmitComponent;
use Laraboot\Forms\Components\PasswordComponent;
use Laraboot\Forms\Components\CheckboxComponent;
use Laraboot\Forms\Components\TextareaComponent;
use Laraboot\Contracts\Forms\Components\LocalizableComponent;

class Form
{
    use HasOpenAndClose;

    private $resource;

    /**
     * @var \Laraboot\Localization\Locale
     */
    protected $locale;

    /**
     * @var \Laraboot\Localization\Locale[]
     */
    protected $locales = [];

    /**
     * @var array
     */
    protected $components = [
        'text' => TextComponent::class,
        'textarea' => TextareaComponent::class,
        'password' => PasswordComponent::class,
        'submit' => SubmitComponent::class,
        'email' => EmailComponent::class,
        'number' => NumberComponent::class,
        'select' => SelectComponent::class,
        'date' => DateComponent::class,
        'time' => TimeComponent::class,
        'checkbox' => CheckboxComponent::class,
        'radio' => RadioComponent::class,
        'file' => FileComponent::class,
    ];

    /**
     * @var
     */
    protected static $instance;

    /**
     * BsForm constructor.
     */
    private function __construct()
    {
        // TODO:: bind this to the service container
        $this->locales = Locale::all();
    }

    /**
     * @param $name
     * @param $component
     */
    public function registerComponent($name, $component)
    {
        $this->components[$name] = $component;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (isset($this->components[$name])) {
            $instance = new $this->components[$name]($this->resource);

            if ($instance instanceof LocalizableComponent) {
                $instance->locale($this->locale);

                if ($this->locale) {
                    $instance->transformLabel(false);
                }
            }

            return $instance->init(...$arguments);
        }
        if (in_array($name, $this->getFormBuilderMethods())) {
            return app('form')->{$name}(...$arguments);
        }

        $className = __CLASS__;
        throw new MethodNotFoundException("method {$name} not found in {$className}!", $name, $className);
    }

    /**
     * Set the default locale code.
     *
     * @param $code
     * @return $this
     */
    public function locale(Locale $locale = null)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @param $resource
     * @return $this
     */
    public function resource($resource)
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getFormBuilderMethods()
    {
        $class = new \ReflectionClass(FormBuilder::class);
        $methods = $class->getMethods(\ReflectionMethod::IS_PUBLIC);
        $methodsList = [];
        foreach ($methods as $method) {
            if (!starts_with($method->getName(), '__')) {
                $methodsList[] = $method->getName();
            }
        }
        return $methodsList;
    }

    /**
     * @return static
     */
    public static function getInstance()
    {
        if ($instance = static::$instance) {
            return $instance;
        }

        return static::$instance = new static();
    }

    /**
     * @return \Laraboot\Localization\Locale[]
     */
    public function getLocales()
    {
        return $this->locales;
    }

    private function __clone()
    {
        //
    }
}