<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

class ExternalBooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "name" => $this['name'],
            "isbn" => $this['isbn'],
            "authors" => $this['authors'],
            "number_of_pages" => isset($this['numberOfPages']) ? $this['numberOfPages'] : $this['number_of_pages'],
            "publisher" => $this['publisher'],
            "country" => $this['country'],
            "release_date" => isset($this['released']) ? date_format(new DateTime($this['released']), "Y-m-d") : date_format(new DateTime($this['release_date']), "Y-m-d"),
        ];
    }
}
