<?php

declare(strict_types=1);

namespace AndreyPootMay\CrudTareasMvc\Tests;

abstract class  TestCase extends \PHPUnit\Framework\TestCase
{
    public static function generateFullName(string $firstName, string $lastName): string
    {
        return $firstName . ' ' . $lastName;
    }
}