<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExerciseControllerTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_excercise()
    {
        $item = Exercise::factory()->create();
        $response = $this->get('/api/v1/rest');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => $item->name,
            'email' => $item->email,
            'profile' => $item->profile,
        ]);
    }

    public function test_store_exercise()
    {
            $data = [
            'name' => 'excercise',
            'email' => 'excercise@example.com',
            'profile' =>'exercise',
        ];
        $response = $this->post('/api/v1/rest', $data);
        $response->assertStatus(201);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas('exercise', $data);

    }

    public function test_show_exercise()
    {
        $item = Exercise::factory()->create();
        $response = $this->get('/api/v1/rest/' . $item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => $item->name,
            'email' => $item->email,
            'profole' => $item->profile
        ]); 
    }

    public function test_update_exercise()
    {
         $item = Exercise::factory()->create();
        $data = [
            'name' => 'exercise_update',
            'email' => 'exercise_update@example.com',
            'profile' => 'exercise_update'
        ];
        $response = $this->put('/api/v1/rest/' . $item->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('exercise', $data);
    }

    public function test_destroy_exercise()
    {
        $item = Exercise::factory()->create();
        $response = $this->delete('/api/v1/rest/' . $item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }
}
