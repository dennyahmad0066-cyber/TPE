<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'nama_lengkap' => fake()->name(),
        'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
        'nomor_hp' => fake()->phoneNumber(),
        'alamat_email' => fake()->unique()->safeEmail(),
    ];
}
}
