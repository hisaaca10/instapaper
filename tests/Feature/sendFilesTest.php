<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class sendFilesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function post_files()
    {
        $this->post('/postImages')
            ->assertStatus(200)
            ->assertSee('postImages');


    }
}
