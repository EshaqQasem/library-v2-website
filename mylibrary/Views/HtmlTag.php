<?php

namespace MyLibrary\Views;

abstract class HtmlTag
{
    protected ?string $id=null;
    protected ?string $name;
    protected ?string $class;

    public function __construct()
    {
        //$this->id = $this->name = $this->class = "";
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass(string $class): void
    {
        $this->class = $class;
    }

    public function addClass(string $class)
    {
        $this->class.=" $class ";
    }

    protected function proString():string
    {

        return $this->id? "id =$this->id":"";
        /*$this->name?"name=$this->name":"").
        $this->class?"class=$this->class":"";
        */
    }

    public abstract function toString():string;

}