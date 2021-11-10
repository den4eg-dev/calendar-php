<?php

class DataTransfer
{

    public function get($key): string|array|int
    {
        return $_SESSION[$key];
    }

    public function set(string|array|int $data)
    {

        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }
    }
}
