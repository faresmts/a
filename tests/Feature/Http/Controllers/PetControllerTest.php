<?php

namespace Http\Controllers;

use App\Models\Pet;
use App\Models\Race;
use App\Models\Species;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PetControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_should_be_able_to_create_a_pet(): void
    {
        $user = User::factory()->create();

        $species = Species::factory()->create();

        $race = Race::factory()->create([
            'species_id' => $species->getKey()
        ]);

        $data = [
            'name' => 'Kassandra',
            'parent_id' => $user->getKey(),
            'species_id' => $species->getKey(),
            'race' => $race->name,
            'color' => 'black'
        ];

        $response = $this->post(route('pets.store'), $data);

        $response->assertCreated();
        $response->assertJson([
            'data' => [
                'id' => 1,
                'name' => 'Kassandra',
                'parent' => $user->name,
                'species' => $species->name,
                'race' => $race->name,
                'color' => 'black'
            ]
        ]);
    }

    /**
     * @test
     */
    public function it_should_be_able_to_list_one_pet(): void
    {
        $user = User::factory()->create();

        $species = Species::factory()->create();

        $pet = Pet::factory()
            ->create([
                'species_id' => $species->getKey(),
                'parent_id' => $user->getKey()
            ]);

        $response = $this->get(route('pets.show', $pet->getKey()));

        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $pet->id,
                'name' => $pet->name,
                'parent' => $user->name,
                'species' => $species->name,
                'race' => $pet->race,
                'color' => $pet->color,
            ]
        ]);
    }

    /**
     * @test
     */
    public function it_should_be_able_to_list_all_pets(): void
    {
        $user = User::factory()->create();

        $species = Species::factory()->create();

        $race = Race::factory()->create([
            'species_id' => $species->getKey()
        ]);
        $pets = Pet::factory(3)
            ->create([
                'parent_id' => $user->getKey(),
                'species_id' => $species->getKey(),
                'race' => $race->getKey()
            ]);

        $response = $this->actingAs($user)->get(route('pets.index'));

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'name',
                    'parent',
                    'species',
                    'race',
                    'color',
                ],
                [
                    'id',
                    'name',
                    'parent',
                    'species',
                    'race',
                    'color',
                ],
                [
                    'id',
                    'name',
                    'parent',
                    'species',
                    'race',
                    'color',
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    public function it_should_be_able_to_update_a_pet(): void
    {
        $user = User::factory()->create();

        $species = Species::factory()->create();

        $race = Race::factory()->create([
            'species_id' => $species->getKey()
        ]);

        $pet = Pet::factory()
            ->create([
                'parent_id' => $user->getKey(),
                'species_id' => $species->getKey(),
                'race' => $race->getKey()
            ]);

        $petData = $pet->toArray();

        $response = $this->put(
            route('pets.update', $petData['id']),
            [
                'name' => 'Kassandra'
            ]
        );

        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $pet->id,
                'name' => 'Kassandra',
                'parent' => $user->name,
                'species' => $species->name,
                'race' => $pet->race,
                'color' => $pet->color,
            ]
        ]);
    }

    /**
     * @test
     */
    public function it_should_be_able_to_delete_a_pet(): void
    {
        $species = Species::factory()->create();
        $race = Race::factory()->create([
            'species_id' => $species->getKey()
        ]);
        $pet = Pet::factory()
            ->create([
                'species_id' => $species->getKey(),
                'race' => $race->getKey()
            ]);

        $response = $this->delete(route('pets.destroy', $pet->getKey()));

        $response->assertNoContent();
        $this->assertDatabaseCount('pets', 0);
    }
}
