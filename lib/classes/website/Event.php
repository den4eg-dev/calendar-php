<?php

namespace website;

use database\Mysqli;

class Event extends Layout
{
    private object $db;

    public string $event_pk;
    public string $event_title;
    public string $event_date;
    public string $time_start;
    public string $time_end;
    public string $description;

    public function __construct(array $data, string $event_pk = '')
    {
        $this->db = new Mysqli();
        $this->event_pk = $event_pk;
        $this->selectOne();

        $this->setTitle($this->event_title);
        $this->getHeader();

        $this->getContent($data['view']);
        $this->getFooter();

        $this->setJavaScripts($data['javaScripts']);


    }

    public function setData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function selectOne()
    {

        $sql_query = "SELECT * FROM events
                     WHERE event_pk = $this->event_pk";
        $data = $this->db->select($sql_query);

        $this->setData($data[0]);

    }



}