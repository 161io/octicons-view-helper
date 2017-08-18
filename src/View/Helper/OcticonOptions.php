<?php
/**
 * Copyright (c) 161 SARL, https://161.io
 */

namespace Io161\Octicons\View\Helper;

use Zend\Stdlib\AbstractOptions;

class OcticonOptions extends AbstractOptions
{
    /**
     * @var float
     */
    protected $ratio = 1;

    /**
     * @var string
     */
    protected $class = 'octicon';

    /**
     * @param array|null|\Traversable $options
     */
    public function __construct($options = null)
    {
        if (is_numeric($options)) {
            $options = [
                'ratio' => $options,
            ];
        }

        parent::__construct($options);
    }

    /**
     * @return float
     */
    public function getRatio(): float
    {
        return $this->ratio;
    }

    /**
     * @param  float $ratio
     * @return self
     */
    public function setRatio(float $ratio)
    {
        if ($ratio <= 0) {
            $ratio = 1;
        }

        $this->ratio = $ratio;
        return $this;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param  string $class
     * @return self
     */
    public function setClass(string $class)
    {
        $this->class = $class;
        return $this;
    }
}
