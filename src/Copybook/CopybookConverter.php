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

/**
 * Copybook package.
 *
 * @author Rodrigo Prado de Jesus <royopa@gmail.com>
 */
class CopybookConverter  extends CopybookMaker implements CopybookConverterInterface
{
    public function convertToXml()
    {
        shell_exec('java -jar ' . __DIR__ . '/cb2xml.jar ' . $this->getCopybook()->getBasePath() . '/temp/cleanBook.txt > ' . $this->getCopybook()->getBasePath() . '/temp/cleanBook.xml');
    }
}
