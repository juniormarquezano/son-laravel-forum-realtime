<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocaleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRoute()
    {
    	// Testando uma rota
        $response = $this->get('/locale/en');
        $response->assertStatus(302); // Response de redirecionamento
    }

    public function testTranslation()
	{
		$response = $this->withSession(['locale' => 'pt-br'])->get('/');
		$response->assertSee('Tópicos mais recentes');
	}
}
