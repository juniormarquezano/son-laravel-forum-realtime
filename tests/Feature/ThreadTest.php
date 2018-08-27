<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
	use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testActionIndex()
    {
    	$user = factory(User::class)->create();
    	$this->seed('ThreadsTableSeeder'); // Cria as seeds de tópicos
    	$threads = Thread::orderBy('updated_at', 'desc')->paginate(); // Carrega os tópicos

        $response = $this
			->actingAs($user) // Para autenticar um usuário
			->json('GET', '/threads'); // Para acessar essa rota é necessário um usuário autenticado
        $response->assertStatus(200)
			->assertJsonFragment([$threads->toArray()['data']]); // Testa se está retornando os tópicos
    }

    public function testActionStore()
	{
		$user = factory(User::class)->create();

		$data = [
			'title' => 'Meu primeiro tópico',
			'body'	=> 'Este é um exemplo de tópico'
		];

		$response = $this
			->actingAs($user)
			->json('POST', '/threads', $data);

		$thread = Thread::find(1);

		$response->assertStatus(200)
			->assertJsonFragment(['created' => 'success'])
			->assertJsonFragment([$thread->toArray()]);

	}

	public function testActionUpdate()
	{
		$user = factory(User::class)->create();
		$thread = factory(Thread::class)->create([
			'user_id' => $user->id
		]);

		$data = [
			'title' => 'Meu primeiro tópico atualizado',
			'body'	=> 'Este é um exemplo de tópico atualizado'
		];

		$response = $this
			->actingAs($user)
			->json('PUT', 'threads/'.$thread->id, $data);

		$thread->title = 'Meu primeiro tópico atualizado';
		$thread->body = 'Este é um exemplo de tópico atualizado';
		$thread->user_id = $user->id;
		/*
		$response->assertStatus(200)
			->assertJsonFragment(['updated' => 'success'])
			->assertJsonFragment($data);
		*/
		$response->assertStatus(302);
		$this->assertEquals(Thread::find(1)->toArray(), $thread->toArray());

	}
}
