<?php

namespace App\DTO;

use App\Models\medicines;

class MedicineDTO extends baseDTO
{
    /**
     * Create a new class instance.
     */
    private int $id;
    private string $name;
    private string $description;
    private int $in_stock;
    private int $price;
    public function __construct(
        ?int $id,
        ?string $name,
        ?string $description,
        ?int $in_stock,
        ?int $price
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->in_stock = $in_stock;
        $this->price = $price;
    }

    public function fromModel(medicines $data)
    {
        return new self(
            $data->medicine_id,
            $data->name,
            $data->description,
            $data->in_stock,
            $data->price
        );
    }

    public function fromArray(array $data)
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['description'],
            $data['in_stock'],
            $data['price']
        );
    }
}
