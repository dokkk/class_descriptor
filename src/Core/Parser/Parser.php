<?php
/**
 * Created by PhpStorm.
 * User: dcaruso
 * Date: 25.12.17
 * Time: 19:44
 */

namespace ClassDescriptor\Core\Parser;

use ClassDescriptor\Core\Descriptors\Factory\DescriptorFactory;
use ClassDescriptor\Core\Descriptors\InterfaceDescriptor;
use ReflectionClass;

/**
 * Class Parser
 * @package ClassDescriptor\Core\Parser
 */
class Parser implements ParserInterface
{
    /**
     * @const int
     */
    const ONLY_SELF = 0;

    /**
     * @const int
     */
    const SAME_LEVEL = 1;

    /**
     * @const int
     */
    const UPPER_LEVEL = 2;

    /**
     * @const int
     */
    const ALL = 3;

    /**
     * @var string
     */
    private $path;
    /**
     * @var bool
     */
    private $isFile;

    /**
     * Parser constructor.
     * @param string $path
     * @throws ParserException
     */
    public function __construct(string $path)
    {
        $this->path = $path;

        if(empty($this->path))
        {
           throw new \InvalidArgumentException("Argument path must be not empty");
        }

        if(!file_exists($this->path))
        {
            throw new ParserException("Given path '$this->path' is not existing");
        }

        $this->isFile = true;
        if(is_dir($this->path))
        {
            $this->isFile = false;
        }
    }

    /**
     * @return bool
     */
    public function isFile(): bool
    {
        return $this->isFile;
    }

    /**
     * @param int $level
     * @throws ParserException
     * @throws \ClassDescriptor\Core\Descriptors\Factory\DescriptorFactoryException
     */
    public function run(int $level = self::ONLY_SELF)
    {

        if($this->isFile())
        {
            $tokens = $this->getTokens($this->path);

            $nameSpace = "";
            $descriptorName = "";
            $descriptorType = "";
            $extends = [];
            $interfaces = [];
            $gettingNamespace = false;
            $gettingDescriptorName = false;
            $gettingImplements = false;
            $gettingExtends = false;

            foreach ($tokens as $token) {
                if (is_array($token)) {
                    $tokenName = token_name($token[0]);
                    //echo $tokenName, PHP_EOL;
                    switch ($tokenName)
                    {
                        case "T_NAMESPACE":
                            $gettingNamespace = true;
                            break;

                        case "T_INTERFACE":
                            $descriptorType = DescriptorFactory::INTERFACE_DESCRIPTOR;
                            $gettingDescriptorName = true;
                            break;
                        case "T_CLASS":
                            $descriptorType = DescriptorFactory::CLASS_DESCRIPTOR;
                            $gettingDescriptorName = true;
                            break;

                        case "T_TRAIT":
                            $descriptorType = DescriptorFactory::TRAIT_DESCRIPTOR;
                            //TO DO
                            break;

                        //If the token is a string and $gettingDescriptorName === true, build descriptor name string
                        case "T_STRING":
                            if ($gettingDescriptorName === true)
                            {
                                //Store the token's value as the class name
                                $descriptorName = $token[1];
                                $gettingDescriptorName = false;
                                break;
                            }

                        //If the token is a string or the namespace separator, and $gettingNamespace === true, build namespace string
                        case "T_NS_SEPARATOR":
                            if ($gettingNamespace === true)
                            {
                                //Append the token's value to the name of the namespace
                                $nameSpace .= $token[1];
                            }
                            elseif ($gettingExtends === true)
                            {
                                $extends[] = $token[1];
                                $gettingExtends = false;
                            }
                            elseif ($gettingImplements === true)
                            {
                                $interfaces[] = $token[1];
                            }
                            break;
                        case "T_WHITESPACE":
                            if($gettingImplements === true) {
                                $gettingImplements = false;
                            }
                            if($gettingExtends === true) {
                                $gettingExtends = false;
                            }
                            break;
                        //
                        case "T_EXTENDS":
                            $gettingExtends = true;
                            breaK;
                        //
                        case "T_IMPLEMENTS":
                            $gettingImplements = true;
                            breaK;
                    }

                    //TO DO in case not a Class or Interface or Trait
                    if(false)
                    {
                        throw new ParserException("Given file must be a Class, an Interface or a Trait");
                    }
                }
                elseif ($token === ';') {
                    //If the token is the semicolon, then we're done with the namespace declaration
                    $gettingNamespace = false;
                }
                elseif ($token !== ',') {
                    if($gettingImplements === true) {
                        $gettingImplements = false;
                    }
                }
            }
            echo "nameSpace= ".$nameSpace, PHP_EOL;
            echo "descriptorName: ".$descriptorName, PHP_EOL;
            //var_dump($extends);

            include $this->path;
            $reflectionClass = new ReflectionClass($nameSpace."\\".$descriptorName);

            $descriptor = DescriptorFactory::create($descriptorType, $reflectionClass);

//            switch ($descriptorType)
//            {
//                case DescriptorFactory::INTERFACE_DESCRIPTOR:
//                    $interfaces = $reflectionClass->getInterfaces();
//                    //$descriptor = new InterfaceDescriptor("descriptorName", "nameSpace");
//                    break;
//                case DescriptorFactory::CLASS_DESCRIPTOR:
//                    $interfaces = $reflectionClass->getInterfaces();
//                    $parent = $reflectionClass->getParentClass();
//                    var_dump($interfaces);
//                    //$descriptor = new InterfaceDescriptor("descriptorName", "nameSpace");
//                    break;
//                case DescriptorFactory::TRAIT_DESCRIPTOR:
//                    //$descriptor = new InterfaceDescriptor("descriptorName", "nameSpace");
//                    break;
//            }
        }
        else
        {
            //TO DO loop dir
        }
    }

    /**
     * @param string $filePath
     * @return array
     */
    private function getTokens(string $filePath): array
    {
        return token_get_all(file_get_contents($filePath));
    }
}