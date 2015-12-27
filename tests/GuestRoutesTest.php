<?php


class GuestRoutesTest extends TestCase
{
    public function testWelcome()
    {
        $respuesta = $this->call('GET', '/');

        $this->assertEquals(200, $respuesta->getStatusCode());

    }

    public function testDeal()
    {
        $respuesta = $this->call('GET', 'deal-with-it');

        $this->assertEquals(200, $respuesta->getStatusCode());
    }

}