<?php

/*
 * This file is part of the CobolCopybook2Xml package.
 *
 * (c) Rodrigo Prado de Jesus <royopa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CobolCopybook2Xml\Copybook;

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

/**
 * Copybook test class.
 *
 * @author Rodrigo Prado de Jesus <royopa@gmail.com>
 */
class Copybook extends PHPUnit_Framework_TestCase
{
	private $path;

    /**
     * @return string
     */
    public function getPath()
    {
    	return $this->path;
    }

    /**
     * @return string
     */
    public function setPath($path)
    {
    	return $this->path = $path;
    }

    /**
     * @return string
     */
    public function getUrl($path)
    {
        return $this->path;
    }

    /**
     * @return File
     */
    public function loadFile()
    {
        if (file_exists($this->getPath()) === false) {
            return false;
        }

        try {
            return fopen($this->getPath(), "r");
        } catch (IOExceptionInterface $e) {
            echo "An error occurred while loading the Copybook file at ".$e->getPath();
        }
    }
}
