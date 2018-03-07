<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = new User(['name' => 'Pens Naku', 'email' => 'pensnaku@gmail.com']);
        $this->assertEquals('Pens Naku', $user->name, 'Username is not equal to what we have');
    }
}
