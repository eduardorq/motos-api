<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class MotoTest extends ApiTestCase
{

    public function testGetMotos(): void
    {
        $response = static::createClient()->request('GET', '/api/motos');

        $this->assertResponseIsSuccessful();
        $this->assertJsonContains([
            '@context' => '/api/contexts/Moto',
            '@id' => '/api/motos',
            '@type' => 'hydra:Collection'
        ]);
    }

    public function testCreateMoto(): void
    {
        $client = static::createClient();
        $response = $client->request('POST', '/api/motos', [
            'json' => [
                'modelo' => 'CBR',
                'cilindrada' => 600,
                'marca' => 'Honda',
                'tipo' => 'Sport',
                'extras' => ['ABS'],
                'peso' => 145,
                'edicion_limitada' => false
            ]
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            'modelo' => 'CBR',
            'cilindrada' => 600,
            'marca' => 'Honda'
        ]);
    }

    public function testUpdateMoto(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/motos', [
            'json' => [
                'modelo' => 'MT-09',
                'cilindrada' => 847,
                'marca' => 'Yamaha',
                'tipo' => 'Naked',
                'extras' => ['ABS'],
                'peso' => 193,
                'edicion_limitada' => false
            ]
        ]);


        $motoId = $client->getResponse()->toArray()['id'];

        $response = $client->request('PUT', '/api/motos/' . $motoId, [
            'json' => [
                'modelo' => 'MT-09 Updated',
                'cilindrada' => 847,
                'marca' => 'Yamaha',
                'tipo' => 'Naked',
                'extras' => ['ABS', 'Traction Control'],
                'peso' => 193,
                'edicion_limitada' => true
            ]
        ]);

        $this->assertResponseStatusCodeSame(200);
        $this->assertJsonContains([
            'modelo' => 'MT-09 Updated'
        ]);
    }

    public function testPatchMoto(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/motos', [
            'json' => [
                'modelo' => 'MT-10',
                'cilindrada' => 998,
                'marca' => 'Yamaha',
                'tipo' => 'Naked',
                'extras' => ['ABS'],
                'peso' => 210,
                'edicion_limitada' => false
            ]
        ]);

        $motoId = $client->getResponse()->toArray()['id'];

        $response = $client->request('PATCH', '/api/motos/' . $motoId, [
            'headers' => [
                'Content-Type' => 'application/merge-patch+json',
            ],
            'json' => [
                'extras' => ['ABS', 'Cruise Control']
            ]
        ]);

        $this->assertResponseStatusCodeSame(200);
        $this->assertJsonContains([
            'extras' => ['ABS', 'Cruise Control']
        ]);
    }

    public function testDeleteMoto(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/motos', [
            'json' => [
                'modelo' => 'MT-11',
                'cilindrada' => 1100,
                'marca' => 'Yamaha',
                'tipo' => 'Naked',
                'extras' => ['ABS'],
                'peso' => 215,
                'edicion_limitada' => false
            ]
        ]);

        $motoId = $client->getResponse()->toArray()['id'];

        $response = $client->request('DELETE', '/api/motos/' . $motoId);

        $this->assertResponseStatusCodeSame(204);

        $client->request('GET', '/api/motos/' . $motoId);
        $this->assertResponseStatusCodeSame(404);
    }
}