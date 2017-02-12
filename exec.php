<?php

require __DIR__ . '/vendor/autoload.php';

use CobolCopybook2Xml\Copybook\Copybook;
use CobolCopybook2Xml\Copybook\CopybookCleaner;
use CobolCopybook2Xml\Copybook\CopybookConverter;
use CobolCopybook2Xml\Copybook\CopybookSchemaGenerator;
use CobolCopybook2Xml\Copybook\CopybookCsvGenerator;
use Symfony\Component\DomCrawler\Crawler;

$path = __DIR__ . './copybooks_src/example.copybook';

$copybook = new Copybook($path, __DIR__);

$csvGenerator = new CopybookCsvGenerator();

$csvGenerator->setSchemaFile(__DIR__ . '/schema/example.schema');
//$csvGenerator->setDataFile(__DIR__ . '/data_in_out/DES.TAG.MZ.BGT1.I404GMC1.D160112_DETALHES');
//$csvGenerator->setSaidaFile($csvGenerator->getDataFile() . '.csv');
//$csvGenerator->generateCsv();

echo 'Ok, verifique o arquivo csv na pasta de saida data_in_out';

