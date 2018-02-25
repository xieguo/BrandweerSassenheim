<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicPageTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanSeeP2000Page()
    {
        $response = $this->get(route('p2000'));

        $response->assertStatus(200)
            ->assertSeeText('P2000');
    }

    /**
     * @return void
     */
    public function testCanSeeContactPage()
    {
        $response = $this->get(route('contact'));

        $response->assertStatus(200)
            ->assertSeeText('Contact');
    }
}
