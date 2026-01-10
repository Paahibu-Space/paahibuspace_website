<?php

namespace Tests\Feature\Api;

use App\Models\Program;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProgramTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_join_program_waitlist()
    {
        $program = Program::create([
            'name' => 'Test Program',
            'slug' => 'test-program',
            'is_active' => true, // ProgramController uses is_active
        ]);

        $response = $this->postJson("/api/v1/programs/{$program->slug}/waitlist", [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'location' => 'Test City',
            'notes' => 'Looking forward to it',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'success' => true,
                     'message' => 'You have been added to the waitlist successfully.',
                 ]);

        $this->assertDatabaseHas('program_registration', [
            'email' => 'john@example.com',
            'program_id' => $program->id,
        ]);
    }

    public function test_cannot_join_non_existent_program()
    {
        $response = $this->postJson("/api/v1/programs/non-existent-slug/waitlist", [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $response->assertStatus(404);
    }
}
