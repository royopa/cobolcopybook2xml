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
class CopybookSchemaGenerator extends CopybookMaker implements CopybookSchemaGeneratorInterface
{
    public function generateSchema()
    {
        $xmlIterator = $this->getCopybook()->getXmlIterator();
        
        foreach ($xmlIterator as $k => $value) {
            //$indicadorRegistro = $value['@attributes']['tipo-reg'];
            //$tamanhoRegistro = $value['@attributes']['storage-length'];
            $nomeRegistro = $value['@attributes']['name'];
            
            $nomeSchemaFile = $this->getCopybook()->getBasePath() . '/schema/' . $nomeRegistro . '.schema';

            $schema_file = fopen($nomeSchemaFile, 'w') or die('Unable to open file!');
            $text = "column,start,length\n";
            fwrite($schema_file, $text);

            $items = $value['item'];

            foreach ($items as $key => $value) {

                if ( ! array_key_exists('@attributes', $value)) {
                    continue;
                }

                $level     = $value['@attributes']['level'];
                $length   = $value['@attributes']['storage-length'];
                $name    = $value['@attributes']['name'];
                $position = (int) $value['@attributes']['position'] - 1;
            
                $text = "$name,$position,$length\n";
                
                fwrite($schema_file, $text);
            }

            fclose($schema_file);
        }
    }
}
