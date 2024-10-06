<?php

namespace App\DataFixtures;

use App\Entity\Moto;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $motos = [
            [
                'modelo' => 'CBR',
                'cilindrada' => 600,
                'marca' => 'Honda',
                'tipo' => 'Sport',
                'extras' => ['ABS'],
                'peso' => 193,
                'edicion_limitada' => false
            ],
            [
                'modelo' => 'MT-09',
                'cilindrada' => 847,
                'marca' => 'Yamaha',
                'tipo' => 'Naked',
                'extras' => ['Traction Control', 'ABS'],
                'peso' => 193,
                'edicion_limitada' => false
            ],
            [
                'modelo' => 'Z900',
                'cilindrada' => 948,
                'marca' => 'Kawasaki',
                'tipo' => 'Naked',
                'extras' => ['Quick Shifter'],
                'peso' => 210,
                'edicion_limitada' => false
            ],
            [
                'modelo' => 'Panigale V2',
                'cilindrada' => 955,
                'marca' => 'Ducati',
                'tipo' => 'Sport',
                'extras' => ['ABS', 'Ducati Traction Control'],
                'peso' => 176,
                'edicion_limitada' => true
            ],
            [
                'modelo' => 'Street Triple',
                'cilindrada' => 765,
                'marca' => 'Triumph',
                'tipo' => 'Naked',
                'extras' => ['ABS', 'Rider Modes'],
                'peso' => 168,
                'edicion_limitada' => false
            ],
            [
                'modelo' => 'GSX-R750',
                'cilindrada' => 750,
                'marca' => 'Suzuki',
                'tipo' => 'Sport',
                'extras' => ['ABS'],
                'peso' => 190,
                'edicion_limitada' => false
            ],
            [
                'modelo' => 'KTM 390 Duke',
                'cilindrada' => 373,
                'marca' => 'KTM',
                'tipo' => 'Naked',
                'extras' => ['LED Lights'],
                'peso' => 149,
                'edicion_limitada' => false
            ],
            [
                'modelo' => 'YZF-R3',
                'cilindrada' => 321,
                'marca' => 'Yamaha',
                'tipo' => 'Sport',
                'extras' => ['ABS'],
                'peso' => 169,
                'edicion_limitada' => false
            ],
            [
                'modelo' => 'Ninja 650',
                'cilindrada' => 649,
                'marca' => 'Kawasaki',
                'tipo' => 'Sport',
                'extras' => ['ABS'],
                'peso' => 192,
                'edicion_limitada' => false
            ],
            [
                'modelo' => 'R1200GS',
                'cilindrada' => 1170,
                'marca' => 'BMW',
                'tipo' => 'Adventure',
                'extras' => ['ABS', 'Dynamic ESA'],
                'peso' => 239,
                'edicion_limitada' => false
            ],
        ];

        foreach ($motos as $data) {
            $moto = new Moto();
            $moto->setModelo($data['modelo']);
            $moto->setCilindrada($data['cilindrada']);
            $moto->setMarca($data['marca']);
            $moto->setTipo($data['tipo']);
            $moto->setExtras($data['extras']);
            $moto->setPeso($data['peso']);
            $moto->setEdicionLimitada($data['edicion_limitada']);

            $manager->persist($moto);
        }

        $manager->flush();
    }
}
