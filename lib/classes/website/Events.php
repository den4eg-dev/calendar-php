<?php

namespace website;
class Events extends Layout
{
//    public string $data = "";

    public function __construct(string $content = "")
    {

    $this->setTitle('events');

        $this->getHeader();
        $this->getContent($content);
        $this->getFooter();
    }

    public function getContent(string $content = "")
    {
        if (str_starts_with($content, '#')) {
            echo substr($content, 1, strlen($content));

        } else if (trim($content) !== "") {
            include("lib/views/" . $content . ".php");

        }
    }
}