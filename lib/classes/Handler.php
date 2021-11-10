<?php


use website\Layout;

class Handler extends Layout
{
    public function __construct(array $data)
    {
//        print_p($data);
        Layout::setLinks(['Home' => 'home',
            'Calendar' => 'calendar',
            'Events' => 'events']);
        $this->setScripts($data['links']);
    }
}