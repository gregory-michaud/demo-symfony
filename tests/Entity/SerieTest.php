<?php

namespace App\Tests\Entity;

use App\Entity\Serie;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SerieTest extends KernelTestCase
{
    public function getEntity(){
        $serie = (new Serie())
            ->setName("name")
            ->setOverview('overview')
            ->setStatus('Cancelled')
            ->setVote('1')
            ->setPopularity('1')
            ->setGenre('genre')
            ->setFirstAirDate(new \DateTime('2022-11-23'))
            ->setLastAirDate(new \DateTime('2023-11-23'))
            ->setDateCreated(new \DateTime());
        return $serie;
    }

    public function testValidEntity(): void
    {
        $kernel = self::bootKernel();

        $serie = $this->getEntity();

        $errors = static::getContainer()->get('validator')->validate($serie);

        $this->assertCount(0, $errors);
    }

    public function testInvalidEntityBlankName(): void
    {
        $kernel = self::bootKernel();

        $serie = $this->getEntity();
        $serie->setName('');

        $errors = static::getContainer()->get('validator')->validate($serie);

        $this->assertCount(2, $errors);
    }

    public function testInvalidEntityLengthName(): void
    {
        $kernel = self::bootKernel();

        $serie = $this->getEntity();
        $serie->setName('a');

        $errors = static::getContainer()->get('validator')->validate($serie);

        $this->assertCount(1, $errors);
    }

    public function testInvalidEntityStatus(): void
    {
        $kernel = self::bootKernel();

        $serie = $this->getEntity();
        $serie->setStatus("statusErreur");

        $errors = static::getContainer()->get('validator')->validate($serie);

        $this->assertCount(1, $errors);
    }

    public function testInvalidEntityDate(): void
    {
        $kernel = self::bootKernel();

        $serie = $this->getEntity();
        $serie->setFirstAirDate(new \DateTime('2022/11/20'));
        $serie->setLastAirDate(new \DateTime('2022/11/19'));

        $errors = static::getContainer()->get('validator')->validate($serie);

        $this->assertCount(1, $errors);
    }





}
