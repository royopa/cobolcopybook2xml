<?php

/*
 * This file is part of the CobolCopybook2Xml package.
 *
 * (c) Rodrigo Prado de Jesus <royopa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CobolCopybook2Xml\Converter;

/**
 * Xml2Array package interface.
 *
 * @author Rodrigo Prado de Jesus <royopa@gmail.com>
 */
class Xml2ArrayConverter
{
    public function extract($sxe = null)
    {
        if ( ! $sxe instanceOf \SimpleXMLElement) {
            return array();
        }

        $extract = array();

        foreach ($sxe->children() as $key => $value) {
            if (array_key_exists($key, $extract)) {
                if (!isset($extract[$key][0])) {
                    $tmp_extract = $extract[$key];
                    $extract[$key] = array();
                    $extract[$key][0] = $tmp_extract; 
                } else
                    $extract[$key] = (array) $extract[$key];
            } 

            if ($value->count()) {
                if (isset($extract[$key]) && is_array($extract[$key]))
                    $extract[$key][] = $this->extract($value);
                else
                    $extract[$key] = $this->extract($value);
            } else {
                if (isset($extract[$key]) && is_array($extract[$key]))
                    $extract[$key][] = empty(strval($value)) ? null : strval($value);
                else
                    $extract[$key] = empty(strval($value)) ? null : strval($value);
            }
        }

        return $extract;
    }
}
