<?php

namespace Tests\Feature\Api;

use App\Models\Newsletter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_subscribe_to_newsletter()
    {
        $response = $this->postJson('/api/v1/newsletter/subscribe', [
            'email' => 'test@example.com',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'success' => true,
                     'message' => 'Subscribed successfully.',
                 ]);

        $this->assertDatabaseHas('newsletters', [
            'email' => 'test@example.com',
        ]);
    }

    public function test_duplicate_subscription_returns_success_message()
    {
        Newsletter::create(['email' => 'test@example.com']);

        $response = $this->postJson('/api/v1/newsletter/subscribe', [
            'email' => 'test@example.com',
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'message' => 'You are already subscribed to our newsletter.',
                 ]);
    }

    public function test_validates_email_format()
    {
        $response = $this->postJson('/api/v1/newsletter/subscribe', [
            'email' => 'not-an-email',
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['email']);
    }
}
