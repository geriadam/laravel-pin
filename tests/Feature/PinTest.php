<?php

namespace Tests\Feature;

use Auth;
use Hash;
use Illuminate\Http\UploadedFile;
use App\Http\Resources\PinCollection;
use App\Http\Resources\PinResource;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Pin;

class PinTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticateUser()
    {
        $user = User::create([
            'name' => 'testing',
            'email' => rand(12345, 678910) . 'test@mail.com',
            'password' => Hash::make('password'),
        ]);

        if (!auth()->attempt(['email' => $user->email, 'password' => 'password'])) {
            return response(['message' => 'Login credentials are invaild']);
        }

        return ["user" => $user, "token" => $user->createToken('Personal Access Token')->accessToken];
    }

    /** @test */
    public function it_can_return_all_draft_pins_for_moderation()
    {
        $auth = $this->authenticateUser();
        $token = $auth['token'];
        $pins = Pin::factory(5)->create(['is_publish' => false]);
        $resource = new PinCollection($pins);
        $request  = Request::create(route('pins.moderation'), 'GET');
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('GET', route('pins.moderation'));
        $response->assertStatus(200);
        $this->assertCount(5, $response->decodeResponseJson()['data']['data']);
        $response->assertJson([
            'message' => 'Get Index Successfully',
            'success' => true,
            'data' => $resource->response($request)->getData(true),
        ]);
    }

    /** @test */
    public function it_can_return_all_favorited_pins_by_the_logged_in_user()
    {
        $auth = $this->authenticateUser();
        $user = $auth['user'];
        $token = $auth['token'];
        $pins = Pin::factory(10)->create();

        $user->like($pins[0]);
        $user->like($pins[2]);
        $user->like($pins[4]);

        $resource = new PinCollection([$pins[0], $pins[2], $pins[4]]);
        $request  = Request::create(route('pins.favorites'), 'GET');

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get(route('pins.favorites'));
        $response->assertStatus(200);
        $this->assertCount(3, $response->decodeResponseJson()['data']['data']);
        $response->assertJson([
            'message' => 'Get Index Successfully',
            'success' => true,
            'data' => $resource->response($request)->getData(true),
        ]);
    }

    /** @test */
    public function it_can_upload_a_new_pin()
    {
        $auth = $this->authenticateUser();
        $token = $auth['token'];
        $data = [
            'title' => "Pin 1",
            'description' => "Example pin",
            'image' => UploadedFile::fake()->image('avatar.jpg'),
        ];
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->post(route('pins.store'), $data);
        $pin = Pin::first();
        $response->assertStatus(201);
        $response->assertJson([
            'message' => 'Upload pin Successfully',
            'success' => true,
            'data' => (new PinResource($pin))->response()->getData(true)['data'],
        ]);
    }

    /** @test */
    public function it_can_like_a_pin()
    {
        $auth = $this->authenticateUser();
        $user = $auth['user'];
        $token = $auth['token'];
        $pin = Pin::factory()->create();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get(route('pins.like', $pin->id));

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Add to favorite Successfully',
            'success' => true,
            'data' => (new PinResource($pin->fresh()))->response()->getData(true)['data'],
        ]);
    }
}
