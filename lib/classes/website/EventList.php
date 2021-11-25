<?php

namespace website;



use mysql\Database;

class EventList extends Layout
{

    public array $events = [];

    public string $current_date;
    public string $current_time;
    public string $time_plus_one_hour;


    public function setCurrentDate(): void
    {
        $this->current_date = date("Y-m-d");
    }

    public function setCurrentTime(): void
    {
        $this->current_time = date('H:i');
    }

    public function setCurrentTimePlusOneHour(): void
    {
        $timestamp = strtotime($this->current_time) + 60 * 60;
        $this->time_plus_one_hour = date('H:i', $timestamp);
    }



    public function __construct()
    {

//            $this->setCurrentDate();
//            $this->setCurrentTime();
//            $this->setCurrentTimePlusOneHour();

            $this->getEvents();
//            isset($data['javaScripts']) ?? $this->setJavaScripts($data['javaScripts']);
//            $this->setTitle($data['page_title']);

//            $this->getHeader();
//            $this->getContent($data['view']);
//            $this->getFooter();


    }


    public function getEvents(): void
    {
        $db = new Database();

        $sql = "SELECT * FROM events
                JOIN events__types
                ON events.type_fk = events__types.type_pk
                ORDER by event_date DESC";

        $this->events = $db->select($sql);

    }



}