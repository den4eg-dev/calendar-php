<?php

namespace website;

use JetBrains\PhpStorm\Pure;
use mysql\Database;

class EventHandler extends Layout
{
    private object $db;

    public string $event_pk;

    #[Pure] public function __construct(string $event_pk = '')
    {
        $this->db = new Database();
        $this->event_pk = $event_pk;
    }

    public function selectOne(): array
    {
        $sql_query = "SELECT * FROM events
    
                      JOIN events__types
                      ON events.type_fk = events__types.type_pk
        
                      WHERE event_pk = '$this->event_pk'";

        $data = $this->db->select($sql_query);
//        var_dump($data);

        if(isset($data[0]))  return $data[0];
        return $data;
    }
    public function selectTypes(): array
    {
        $sql_query = "SELECT * FROM events__types";

        return $this->db->select($sql_query);

    }

    public function update(array $data)
    {

        $sql_query = "";

        $count = 0;
        foreach ($data as $key => $value) {
            $count++;
            if (count($data) > 1) {
                $coma = count($data) == $count ? "" : ",";
                $sql_query .= "$key='$value'$coma";
            } else {
                $sql_query .= "$key='$value'";
            }
        }


        $query = "UPDATE events 
                SET " . $sql_query . "
                WHERE event_pk = " . $this->event_pk;


        $this->db->update($query, $data);

    }

    public function create(array $data)
    {
        $sql_query_keys="(";
        $sql_query_values="(";

        $count = 0;
        foreach ($data as $key => $value) {
            $count++;
            if (count($data) > 1) {

                $coma = count($data) == $count ? "" : ",";
                $sql_query_keys .= "$key $coma";
                $sql_query_values .= "'$value'$coma ";
            } else {
                $sql_query_keys .= "$key";
                $sql_query_values .= "'$value'";
            }
        }
        $sql_query_keys.=")";
        $sql_query_values.=")";
        $query = "INSERT INTO events $sql_query_keys 
                  VALUES  $sql_query_values ";

        $this->db->create($query, $data);
    }


    public function delete()
    {
        $query = "DELETE FROM events
                  WHERE event_pk = '$this->event_pk'";

        $this->db->delete($query);
    }


}