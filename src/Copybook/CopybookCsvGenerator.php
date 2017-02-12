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
class CopybookCsvGenerator
{
    private $schemaFile;
    private $dataFile;
    private $saidaFile;

    public function setSchemaFile($schemaFile)
    {
        $this->schemaFile = $schemaFile;
    }

    public function setDataFile($dataFile)
    {
        $this->dataFile = $dataFile;
    }

    public function setSaidaFile($saidaFile)
    {
        $this->saidaFile = $saidaFile;
    }

    public function getDataFile()
    {
        return $this->dataFile;
    }

    public function generateCsv()
    {
        $command = ('in2csv.exe --schema ' . $this->schemaFile . ' -v ' . $this->dataFile . ' > ' . $this->saidaFile);
        shell_exec($command);
    }
}
