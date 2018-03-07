<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
       /* $response = $this->get('/home');

        $response->assertStatus(200);*/
        $response = $this->post(route('save_publisher'), [
            'name' => 'Pens Naku',
            'email' => 'email@email.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'company_name' => 'Company Name'
        ]);

        $response->assertRedirect(route('publisher_dashboard'));

        $response->assertSessionHas('message');

        $this->assertEquals(1, Auth::user()->is_publisher);
    }
}
