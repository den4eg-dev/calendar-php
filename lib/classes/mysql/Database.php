<?php

namespace mysql;


use mysqli_result;

class Database
{
    private string $db_host;
    private string $db_login;
    private string $db_password;
    private string $db_name;
    private string $db_port;

    protected bool|\mysqli|null $connection;


    public function get_query_from_file(string $filename): string
    {
        return file_get_contents("lib/sql/" . $filename . ".sql");
    }


    public function __construct()
    {
        $this->db_host = DB_HOST;
        $this->db_login = DB_LOGIN;
        $this->db_password = DB_PASSWORD;
        $this->db_name = DB_NAME;
        $this->db_port = DB_PORT;

    }


    public function sql_request(string $sql_query, array $data = []): bool|mysqli_result
    {
//        $sql_query = $this->get_query_from_file($sql_query);
        $this->connect();

        if (count($data) > 0) {
            foreach ($data as $key => $value) {
                $data[$key] = mysqli_real_escape_string($this->connection, $value);
                $sql_query = str_replace(":" . $key, "'" . $value . "'", $sql_query);
            }
        }
        return mysqli_query($this->connection, $sql_query);
    }

    public function select(string $sql_query, array $data = []): array
    {
        $response = $this->sql_request($sql_query, $data);
        $data_list = array();
        while ($item = mysqli_fetch_assoc($response)) {
            $data_list[] = $item;
        }
        return $data_list;
    }

    public function update(string $sql_query, array $data = []): void
    {
        $this->sql_request($sql_query, $data);
    }

    public function create(string $sql_query, array $data = []): void
    {
        $this->sql_request($sql_query, $data);
    }

    public function delete(string $sql_query, array $data = []): void
    {
        $this->sql_request($sql_query, $data);

    }

    public function connect(): bool|\mysqli|null
    {
        $conn = mysqli_connect($this->db_host, $this->db_login, $this->db_password, $this->db_name, $this->db_port);
        mysqli_query($conn, "SET names utf8");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $this->connection = $conn;
    }

    public function disconnect($con): void
    {
        mysqli_close($con);
    }

    public function __destruct()
    {

        $this->disconnect($this->connection);
    }
}


