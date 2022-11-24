<?php

namespace App\DataFixtures;

use App\Entity\Serie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SerieFixtures extends Fixture
{


    public function getEntity($num){
        $serie = (new Serie())
            ->setName("name" . $num)
            ->setOverview('overview')
            ->setStatus('Cancelled')
            ->setVote('1')
            ->setPopularity('1')
            ->setGenre('genre')
            ->setFirstAirDate(new \DateTime('2022-11-23'))
            ->setLastAirDate(new \DateTime('2023-11-23'))
            ->setDateCreated(new \DateTime())
            ->setBackdrop('backdrop' . $num)
            ->setTmdbId(-1)
            ->setPoster('poster' . $num);

        return $serie;
    }

    public function load(ObjectManager $manager): void
    {

        for($i = 0 ; $i<20 ; $i++){
            $serie = $this->getEntity($i);
            $manager->persist($serie);
        }

        $manager->flush();
    }


}