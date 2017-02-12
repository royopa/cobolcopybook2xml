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
use CobolCopybook2Xml\Converter\Xml2ArrayConverter;
use XmlIterator\XmlIterator;

/**
 * Copybook package interface.
 *
 * @author Rodrigo Prado de Jesus <royopa@gmail.com>
 */
class Copybook implements CopybookInterface
{
    private $path;
    private $xmlPath;
    private $basePath;

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
        if (file_exists($path) === false) {
            throw new \Exception("An error occurred while loading the Copybook file at ".$path);
        }
        
        return $this->path = $path;
    }

    /**
     * @return string
     */
    public function setBasePath($basePath)
    {
        return $this->basePath = $basePath;
    }

    /**
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath;
    }    

    /**
     * @return string
     */
    public function getXmlPath()
    {
        if ( ! $this->xmlPath) {
            $this->xmlPath = $this->getBasePath() . '/temp/cleanBook.xml';
        }

        return $this->xmlPath;
    }

    /**
     * @return string
     */
    public function setXmlPath($xmlPath)
    {
        return $this->xmlPath = $xmlPath;
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
            throw new \Exception("An error occurred while loading the Copybook file at ".$this->getPath());
        }

        try {
            return fopen($this->getPath(), "r");
        } catch (IOExceptionInterface $e) {
            echo "An error occurred while loading the Copybook file at ".$e->getPath();
        }
    }

    /**
     * @return File
     */
    public function loadXmlFile()
    {
        if (file_exists($this->getXmlPath()) === false) {
            throw new \Exception("An error occurred while loading the xml Copybook file at ".$this->getXmlPath());
        }

        try {
            return simplexml_load_file($this->getXmlPath());
        } catch (IOExceptionInterface $e) {
            echo "An error occurred while loading the xml Copybook file at ".$e->getXmlPath();
        }
    }

    /**
     * @return Iterator
     */
    public function getXmlIterator()
    {
        return new XmlIterator($this->getXmlPath(), 'item');
    }

    public function __construct($path, $basePath)
    {
        $this->setPath($path);
        $this->setBasePath($basePath);
        $this->process();
    }

    public function process()
    {
        $copybookCleaner = new CopybookCleaner($this);
        $copybookCleaner->clean();

        $copybookConverter = new CopybookConverter($this);
        $copybookConverter->convertToXml();

        $copybookSchemaGenerator = new CopybookSchemaGenerator($this);
        $copybookSchemaGenerator->generateSchema();
    }
}
