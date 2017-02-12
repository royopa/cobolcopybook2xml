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
class CopybookMaker
{
    private $copybook;

    /**
     * @return Copybook
     */
    public function getCopybook()
    {
        return $this->copybook;
    }

    /**
     * @return void
     */
    public function setCopybook(Copybook $copybook)
    {
        $this->copybook = $copybook;
    }

    /**
     * @return CopybookCleaner
     */
    public function __construct(Copybook $copybook)
    {
        $this->copybook = $copybook;

        return $this;
    }
}
