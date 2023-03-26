<?php

namespace App\Http\Resources;

use App\Models\Species;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowPetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var User $user */
        $user = User::query()->select()->where('id', '=', $this->parent_id)->first();
        /** @var Species $species */
        $species = Species::query()->select()->where('id', '=', $this->species_id)->first();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent' => $user->name,
            'species' => $species->name,
            'race' => $this->race,
            'color' => $this->color,
        ];
    }
}
