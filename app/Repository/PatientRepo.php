<?php

namespace App\Repository;

use App\DTO\PatientDTO;
use App\Models\patients;

class PatientRepo
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll(): array
    {
        return Patients::all()
            ->map(fn ($patient) => PatientDTO::fromModel($patient))
            ->toArray();
    }

    public function getById(int $id): ?PatientDTO
    {
        $patient = Patients::find($id);
        return $patient ? PatientDTO::fromModel($patient) : null;
    }

    public function create(PatientDTO $data): PatientDTO
    {
        $patient = Patients::create(
            [
                'name' => $data->name,
                'age' => $data->age,
                'address' => $data->address,
                'ph' => $data->phno
            ]
        );
        return PatientDTO::fromModel($patient);
    }

    public function update(int $id, PatientDTO $data): ?PatientDTO
    {
        $patient = Patients::find($id);
        if (!$patient) {
            return null;
        }

        $patient->update(
            [
                'name' => $data->name,
                'age' => $data->age,
                'address' => $data->address,
                'ph' => $data->phno
            ]
        );
        return PatientDTO::fromModel($patient);
    }

    public function delete(int $id): bool
    {
        $patient = Patients::find($id);
        if (!$patient) {
            return false;
        }
        return $patient->delete();
    }
}
