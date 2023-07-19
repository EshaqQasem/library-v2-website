<?php

namespace MyLibrary\Views;
//require_once "vendor/autoload.php";
class URL
{
    protected string $fullDomain;

    /**
     * @param string $stringURL
     */
    public function __construct(string $stringURL)
    {
        $this->setString($stringURL);
    }

    public function setString(string $stringURL)
    {
        $stringURL = trim($stringURL);
        $this->fullDomain = $stringURL;
    }
    public function toString():string
    {
        return $this->fullDomain;
    }

    public function addProperty(string $proName,string $value)
    {
        $this->fullDomain.="&".$proName."=".$value;
    }
}