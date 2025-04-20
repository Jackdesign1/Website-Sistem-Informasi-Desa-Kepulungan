<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobVacancy>
 */
class JobVacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $postedAt = $this->faker->dateTimeBetween('-2 months', 'now');
        $expiresAt = $this->faker->optional()->dateTimeBetween($postedAt, '+2 months');
        $status = $expiresAt && $expiresAt < now() ? 'closed' : 'open';

        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraphs(3, true),
            'position' => $this->faker->jobTitle,
            'location' => $this->faker->city,
            'company_name' => $this->faker->company,
            'company_logo' => $this->faker->optional()->imageUrl(200, 200, 'business', true, 'Company'),
            'contact_email' => $this->faker->optional()->companyEmail,

            'posted_at' => $postedAt,
            'expires_at' => $expiresAt,

            'status' => $status,
        ];
    }
}
