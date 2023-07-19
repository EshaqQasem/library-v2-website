<?php

namespace MyLibrary\Views;

interface IAppendable
{
    public function append(string $text);
    public function appendTag(HtmlTag $tag);
    public function innerHtml(string $text);
}