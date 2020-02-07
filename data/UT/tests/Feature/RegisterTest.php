<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class RegisterTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testsRegistersSuccessfully(){
        $payload =[
            'name' => 'John',
            'email' => 'john@test.com',
            'password' => 'test123',
            'password_confirmation' => 'test123'
        ];

        $this->json('post','/api/register',$payload)->assertStatus(200)
        ->assertJsonStructure([
                'username',
                'password'
        ]);
    }

    // public function testsRequiresPasswordEmailAndName()
    // {
    //     $this->json('post', '/api/register')
    //         ->assertStatus(422)
    //         ->assertJson([
    //             'name' => ['The name field is required.'],
    //             'email' => ['The email field is required.'],
    //             'password' => ['The password field is required.'],
    //         ]);
    // }

    // public function testsRequirePasswordConfirmation()
    // {
    //     $payload = [
    //         'name' => 'John',
    //         'email' => 'john@test.com',
    //         'password' => 'test123',
    //     ];

    //     $this->json('post', '/api/register', $payload)
    //         ->assertStatus(422)
    //         ->assertJson([
    //             'password' => ['The password confirmation does not match.'],
    //         ]);
    // }


}


