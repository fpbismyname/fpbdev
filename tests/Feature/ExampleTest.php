<?php

use App\Models\Setting;

test('the application returns a successful response', function () {
    Setting::create([
        'name' => 'FPBDEV',
        'tagline' => 'Website Profesional untuk Bisnis Anda',
        'description' => 'Jasa Pembuatan Website Profesional untuk Bisnis Anda.',
        'social_media' => [],
        'contact' => [],
    ]);

    $response = $this->get('/');

    $response->assertStatus(200)
        ->assertSee('FPBDEV');
});
