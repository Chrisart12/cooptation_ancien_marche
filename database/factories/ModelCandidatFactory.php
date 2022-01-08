<?php

use App\Model\Offre;
use Faker\Generator as Faker;

$factory->define(App\Model\Candidat::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'poste' =>  $faker->jobTitle,
        //'reference' =>  $faker->ean13,
        'reference'  => function () {
             return factory(App\Model\Offre::class)->create()->reference;
            //return Offre::all()->random();
         },
        'offre_id' => function () {
           // return factory(App\Model\Offre::class)->create()->id;
           return Offre::all()->random();
        },
    ];
});
