<?php

namespace App\DTO;

use App\Models\patients;

class PatientDTO extends baseDTO
{
    /**
     * Create a new class instance.
     */
    private int $id;
    private string $name;
    private int $age;
    private string $address;
    private string $phno;
    public function __construct(
        ?int $id,
        ?string $name,
        ?int $age,
        ?string $address,
        ?string $phno
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
        $this->phno = $phno;
    }

    public static function fromModel(patients $data)
    {
        return new self(
            $data->patient_id,
            $data->name,
            $data->age,
            $data->address,
            $data->ph
        );
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['age'],
            $data['address'],
            $data['ph']
        );
    }
}
