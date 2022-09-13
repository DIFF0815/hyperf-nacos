<?php

namespace App\JsonRpc;

interface TcpFooServiceInterface
{
    public function foo(array $params);

    public function sum(array $params);
}