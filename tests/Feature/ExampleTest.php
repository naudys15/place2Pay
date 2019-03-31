<?php

namespace Tests\Feature;

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
        $response = $this->get('/');
        $response->assertStatus(200);

        $data = array(
            '_token' => csrf_token(),
            'name' => 'Test',
            'email' => 'test@test.test',
            'reference' => 'test123456',
            'description' => '123456',
            'total' => 123456,
            'currency' => 'COP'
        );

        $response = $this->from('/')->post('/sendRequest', $data);
        $response->assertStatus(302);

        $response = $this->get('/responseRequest');
        $response->assertStatus(302);
        
    }
}
