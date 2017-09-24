<?php

namespace Sogut\Core;

interface IDBConnection
{
    public function connect();

    public function disconnect();

    public function getDb();
}