<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowPetResource;
use App\Models\Pet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return ShowPetResource::collection(Pet::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): ShowPetResource
    {
        $data = $request->toArray();
        $pet = new Pet();
        $pet->name = $data['name'];
        $pet->parent_id = $data['parent_id'];
        $pet->species_id = $data['species_id'];
        $pet->race = $data['race'];
        $pet->color = $data['color'];
        $pet->save();

        return new ShowPetResource($pet->refresh());
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet): ShowPetResource
    {
        return new ShowPetResource($pet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet): ShowPetResource
    {
        $data = $request->toArray();

        $pet->name = $data['name'] ?? $pet->name;
        $pet->parent_id = $data['parent_id'] ?? $pet->parent_id;
        $pet->species_id = $data['species_id'] ?? $pet->species_id;
        $pet->race = $data['race'] ?? $pet->race;
        $pet->color = $data['color'] ?? $pet->color;
        $pet->save();

        return new ShowPetResource($pet->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet): JsonResponse
    {
        $pet->delete();

        return response()->json([], 204);
    }
}
