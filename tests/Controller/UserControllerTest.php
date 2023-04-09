<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class UserControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user');

        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('h1', 'Users');

        $this->assertCount(3, $crawler->filter('table tbody tr'));
    }
}