<?php

namespace MyLibrary\Views;

class ListItem extends HtmlTag implements IAppendable
{

    private ?string $innerHtml;
    public function toString(): string
    {
       return "<li>";
    }

    public function append(string $text)
    {
        // TODO: Implement append() method.
    }

    public function appendTag(HtmlTag $tag)
    {
        // TODO: Implement appendTag() method.
    }

    public function innerHtml(string $text)
    {

    }
}