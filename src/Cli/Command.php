<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 26.12.17
 * Time: 01:40
 */

require_once("../Core/Autoloader.php");

use ClassDescriptor\Core\Autoloader;

Autoloader::register();

use ClassDescriptor\Core\Parser\Parser;

$parser = new Parser($argv[1]);
$parser->run();



