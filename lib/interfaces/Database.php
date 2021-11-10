<?php


namespace lib\interfaces;

interface Database
{
public function __construct(string $HOST, string $PASSWORD, string $DB_NAME, string $LOGIN);
public function __destruct();

}