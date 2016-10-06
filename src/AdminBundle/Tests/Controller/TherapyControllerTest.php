<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TherapyControllerTest extends WebTestCase
{
    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/therapy/create');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/therapy/edit/{id}');
    }

    public function testDetail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/therapy/detail/{id}');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/therapy/delete/{id}');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/therapy/list');
    }

}
