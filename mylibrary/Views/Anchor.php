<?php

namespace MyLibrary\Views;

//use MyLibrary\Views\HtmlTag;



class Anchor extends HtmlTag implements IAppendable
{

    protected URL $url;
    protected string $innerText="";

    public function setURL(URL $url):Anchor
    {
        $this->url = $url;
        return $this;
    }

    public function setTextURL(string $url):Anchor
    {
        $this->url->setString($url);
        return $this;
    }
    public function toString():string
    {
        $props = parent::proString();

        return "<a $props href=".$this->url->toString().">$this->innerText</a>";
    }

    public function append(string $text):Anchor
    {
        $this->innerText .= $text;
        return  $this;
    }

    public function appendTag(HtmlTag $tag)
    {
        $this->innerText .=$tag->toString();
    }

    public function innerHtml(string $text):Anchor
    {
        $this->innerText = $text;
        return $this;
    }


}