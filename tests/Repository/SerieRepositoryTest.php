<?php

namespace App\Tests\Repository;

use App\Repository\SerieRepository;
use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SerieRepositoryTest extends KernelTestCase
{
    private $databaseTool;

    protected function setUp(): void
    {
        parent::setUp();
        $this->databaseTool = static::getContainer()->get(DatabaseToolCollection::class)->get();
    }

    public function testCount(): void
    {
        $kernel = self::bootKernel();

        $this->databaseTool->loadFixtures(['App\DataFixtures\SerieFixtures']);

        $nbSerie = static::getContainer()->get(SerieRepository::class)->count([]);

        $this->assertEquals(20, $nbSerie);
        // $routerService = static::getContainer()->get('router');
        // $myCustomService = static::getContainer()->get(CustomService::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->databaseTool);
    }
}
