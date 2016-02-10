<?php

/*
 * This File is part of the Thapp\Propreader package
 *
 * (c) iwyg <mail@thomas-appel.com>
 *
 * For full copyright and license information, please refer to the LICENSE file
 * that was distributed with this package.
 */

namespace Thapp\Propreader;

/**
 * @class PropReader
 *
 * @package Thapp\Propreader
 * @version $Id$
 * @author iwyg <mail@thomas-appel.com>
 */
class PropReader
{
    /**
     * read
     *
     * @param object $object
     * @param string $props
     *
     * @return array
     */
    public function read($object, ...$props)
    {
        $len = strlen($baseKey = get_class($object));
        $fProps = !empty($props);

        return $this->map(array_filter((array)$object, function ($value, $key) use ($baseKey, $fProps, $len, $props) {
            if (1 !== strrpos($key, $baseKey)) {
                return false;
            }

            if ($fProps) {
                return in_array(substr($key, $len + 2), $props);
            }

            return true;
        }, ARRAY_FILTER_USE_BOTH), $len + 2);
    }

    /**
     * map
     *
     * @param array $props
     * @param int $offset
     *
     * @return array
     */
    private function map(array $props, $offset)
    {
        return array_combine(array_map(function ($value) use ($offset) {
            return substr($value, $offset);
        }, array_keys($props)), array_values($props));
    }
}
