<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'foto' => url($this->foto),
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'valor' => $this->valor,
            'categoria_id' => $this->categoria_id,
            'categoria_nome' => $this->categoria->titulo

        ];
    }
}
