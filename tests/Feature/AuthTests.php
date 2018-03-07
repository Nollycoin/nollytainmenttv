<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTests extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
        $this->testPublisherLogin();
    }

    public function testAdminLogin()
    {

    }

    public function testSubscriberLogin()
    {

    }

    public function testPublisherLogin()
    {
        $response = $this->post('/register', [
            'email' => 'pensnaku@gmail.com',
            'password' => 'testing'
        ]);
        $response->assertRedirect('/publisher/dashboard/');
    }
}
