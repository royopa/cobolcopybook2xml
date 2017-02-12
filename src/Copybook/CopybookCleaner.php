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
class CopybookCleaner extends CopybookMaker implements CopybookCleanerInterface
{
    public function clean()
    {
        shell_exec('python ' . __DIR__ . '/cobol.py ' . $this->getCopybook()->getPath() . '> ./temp/cleanBook.txt');
    }
}
