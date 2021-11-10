<?php

namespace website;

class Layout
{
    public string $title = '';
    public array $links = [
        'Home' => 'home',
        'Calendar' => 'calendar',
        'Events' => 'events'
    ];
    public array $javaScripts = ['index'];

    public function getJavaScripts(): array
    {
        return $this->javaScripts;
    }
    public function setJavaScripts(array | string $scripts): void
    {
        if(is_array($scripts)) {
            foreach ($scripts as $script) {
                $this->javaScripts[] = $script;
            }
        }else {
            $this->javaScripts[] = $scripts;
        }

    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setLinks(array $links): void
    {
        foreach ($links as $link) {
            $this->links[] = $link;
        }
    }

    public function getLinks(): array
    {
        return $this->links;
    }


    public function getContent(string $content = "", bool $string = false)
    {
        if ($string) echo $content;
        else include("lib/views/" . $content . ".php");
    }

    public function getHeader(): void
    {
        include "lib/views/header.php";
    }


    public function getFooter(): string
    {
        return include "lib/views/footer.php";
    }

}


