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
 * Copybook package interface.
 *
 * @author Rodrigo Prado de Jesus <royopa@gmail.com>
 */
interface CopybookInterface
{
    /**
     * Returns an absolute or root-relative public path.
     *
     * @param string $path A path
     *
     * @return string The public path
     */
    public function getUrl($path);
}
