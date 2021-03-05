<?php

namespace Database\Factories;
use Illuminate\Support\Facades\Http;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $response = Http::withOptions(['verify' => false])->get('https://randomuser.me/api/');

          return [
            'name' => $response['results'][0]["name"]["first"]." ".$response['results'][0]["name"]["first"],
            'email' => $response['results'][0]["email"],
            'image' => base64_encode($response['results'][0]["picture"]["thumbnail"])
        ];
    }
}
