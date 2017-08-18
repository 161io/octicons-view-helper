<?php
/**
 * Copyright (c) 161 SARL, https://161.io
 */

namespace Io161\Octicons\View\Helper;

use Zend\Json\Json;
use Zend\View\Helper\AbstractHelper;

/**
 * Helper: $this->octicon();
 */
class Octicon extends AbstractHelper
{
    /**
     * @var array
     */
    protected $datas;

    /**
     * @param  string $name
     * @param  array|float $ratioOrOptions
     * @return string
     */
    public function __invoke(string $name, $ratioOrOptions = []): string
    {
        $data = $this->getDatas($name);
        if (!$data) {
            return $this->renderError($name);
        }

        return $this->renderIcon($name, $data, new OcticonOptions($ratioOrOptions));
    }

    /**
     * @param  string $name
     * @param  array $icon
     * @param  OcticonOptions $options
     * @return string
     */
    public function renderIcon(string $name, array $icon, OcticonOptions $options): string
    {
        $width = (int) $icon['width'];
        $height = (int) $icon['height'];

        $svg  = '<svg version="1.1" aria-hidden="true"';
        $svg .= ' class="' . $options->getClass() . ' octicon-' . $name . '"';
        $svg .= ' viewBox="0 0 ' . $width . ' ' . $height . '"';
        $svg .= ' width="' . round($width * $options->getRatio()) . '"';
        $svg .= ' height="' . round($height * $options->getRatio()) . '"';
        $svg .= '>';
        $svg .= $icon['path'];
        $svg .= '</svg>';

        return $svg;
    }

    /**
     * @param  string $name
     * @return string
     */
    public function renderError(string $name): string
    {
        $msg  = '<strong class="text-danger">';
        $msg .=   'Octicon &quot;' . htmlspecialchars($name) . '&quot; was not found ';
        $msg .=   '<a href="https://octicons.github.com" target="_blank">(help)</a>';
        $msg .= '</strong>';

        return $msg;
    }

    /**
     * @param  string $name
     * @return array
     */
    public function getDatas(string $name = null): array
    {
        if (null === $this->datas) {
            $content = file_get_contents(__DIR__ . '/../../../octicons/data.json');
            $this->datas = Json::decode($content, Json::TYPE_ARRAY);
        }

        if (null !== $name) {
            return $this->datas[$name] ?? [];
        }

        return $this->datas;
    }
}
