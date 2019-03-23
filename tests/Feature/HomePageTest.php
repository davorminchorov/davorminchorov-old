<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * @test
     */
    public function it_opens_the_home_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee('Davor Minchorov');
    }
}
