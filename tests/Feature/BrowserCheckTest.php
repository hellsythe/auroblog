<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BrowserCheckTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testBrowserCheck()
    {
        $this->serverVariables = ['HTTP_USER_AGENT' => 'Mozilla/1.22 (compatible; MSIE 10.0; Windows 3.1)'];
        $response = $this->get('/');

        $response->assertRedirect('https://browsehappy.com/');
    }

}
