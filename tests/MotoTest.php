<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class MotoTest extends ApiTestCase
{
    public function testCreateMoto(): void
    {
        $response = static::createClient()->request('POST', '/api/motos', ['json' => [
            'modelo' => 'MT-07',
            'cilindrada' => 689,
            'marca' => 'Yamaha',
            'tipo' => 'Naked',
            'extras' => ['ABS', 'Quickshifter'],
            'edicionLimitada' => false,
        ]]);

        $this->assertResponseStatusCodeSame(201);
    }
}
