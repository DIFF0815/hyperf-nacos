<?php

namespace App\JsonRpc;

interface CalculatorServiceInterface
{
    public function add(int $a, int $b): int;

    public function multiplication(int $a, int $b): int;
}