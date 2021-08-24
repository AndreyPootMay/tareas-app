<?php

declare(strict_types=1);

namespace AndreyPootMay\CrudTareasMvc\Tests\Unit;

use AndreyPootMay\CrudTareasMvc\Tests\TestCase;

final class FirstTest extends TestCase
{
    public function testIf2IsGreatherThanOne()
    {
        $this->assertTrue((2 > 1));
    }

    public function testPersonProperties()
    {
        $person = [
            'nombre' => 'Jaime',
            'edad' => 20,
            'correo_electronico' => 'jaime_duende@correo.com'
        ];

        $this->assertArrayHasKey('nombre', $person);
        $this->assertArrayHasKey('edad', $person);
        $this->assertArrayHasKey('correo_electronico', $person);

        $this->assertIsInt($person['edad']);
    }
}