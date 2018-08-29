<?php

namespace Laraboot\Forms\Components;

class SubmitComponent extends BaseComponent
{
    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'laraboot::forms.submit';

    /**
     * The button class name.
     *
     * @var string
     */
    protected $className = 'btn-danger';

    /**
     * Initialized the input arguments.
     *
     * @param null $label
     * @param null $name
     * @param null $value
     * @return $this
     */
    public function init($label = null, $name = null)
    {
        $this->name($name);
        $this->label($label);

        return $this;
    }

    /**
     * Set primary style for the button.
     *
     * @return $this
     */
    public function primary()
    {
        $this->className = 'btn-primary';

        return $this;
    }

    /**
     * Set danger style for the button.
     *
     * @return $this
     */
    public function danger()
    {
        $this->className = 'btn-danger';

        return $this;
    }

    /**
     * Set info style for the button.
     *
     * @return $this
     */
    public function info()
    {
        $this->className = 'btn-info';

        return $this;
    }

    /**
     * Set success style for the button.
     *
     * @return $this
     */
    public function success()
    {
        $this->className = 'btn-success';

        return $this;
    }

    /**
     * Set warning style for the button.
     *
     * @return $this
     */
    public function warning()
    {
        $this->className = 'btn-warning';

        return $this;
    }

    /**
     * The variables with registerd in view component.
     *
     * @return array
     */
    protected function viewComposer()
    {
        return [
            'className' => $this->className,
        ];
    }
}
