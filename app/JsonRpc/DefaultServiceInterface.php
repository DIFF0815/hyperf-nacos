<?php

namespace App\JsonRpc;

interface DefaultServiceInterface
{
    public function add(array $params): int;

    public function multiplication(array $params): int;

}