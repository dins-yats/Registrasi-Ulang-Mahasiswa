<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

          
            'nama' => $this->faker->name(),
            'semester' => $this->faker->name(),
            'NIM' => $this->faker->name(),
            'sisa' => $this->faker->name(),
            'bts_tgl' => $this->faker->name(),
            'alamat' => $this->faker->name(),
            'jenis_bayar' => $this->faker->name(),
            'tahun_akademik' => $this->faker->name(),
            'no_hp' => $this->faker->name(),
            'pembayaran' => $this->faker->name(),
            'tanggal_pembayaran' => $this->faker->name(),
            'status_pembayaran' => $this->faker->name(),
            'status_registrasi' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'user_id' => mt_rand(1,4),
            'category_id' => mt_rand(1,3),

            
            
        ];
    }
}
