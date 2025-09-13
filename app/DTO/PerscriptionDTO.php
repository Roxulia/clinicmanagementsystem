<?php

namespace App\DTO;

use App\Models\perscriptions;

class PerscriptionDTO
{
    /**
     * Create a new class instance.
     */
    private int $id;
    private int $record_id;
    private int $medicine_id;
    private string $dosage;
    private int $quantity_taken;
    private int $cost;
    public function __construct(
        int $id,
        int $record_id,
        int $medicine_id,
        string $dosage,
        int $quantity_taken,
        int $cost
    )
    {
        $this->id = $id;
        $this->record_id = $record_id ;
        $this -> medicine_id = $medicine_id ;
        $this -> dosage = $dosage;
        $this -> quantity_taken = $quantity_taken;
        $this -> cost = $cost;
    }

    public function fromModel(perscriptions $data)
    {
        return new self(
            $data->perscription_id,
            $data->record_id,
            $data->medicine_id,
            $data->dosage,
            $data->quantity_taken,
            $data -> cost
        );
    }

    public function fromArray(array $data)
    {
        return new self(
            $data['id'],
            $data['record_id'],
            $data['medicine_id'],
            $data['dosage'],
            $data['quantity_taken'],
            $data['cost']
        );
    }
}
