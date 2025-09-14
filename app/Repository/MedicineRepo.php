<?php

namespace App\Repository;

use App\DTO\MedicineDTO;
use App\Models\medicines;

class MedicineRepo
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
        return Medicines::all()
            ->map(fn ($medicine) => MedicineDTO::fromModel($medicine))
            ->toArray();
    }

    public function getById(int $id): ?MedicineDTO
    {
        $medicine = Medicines::find($id);
        return $medicine ? MedicineDTO::fromModel($medicine) : null;
    }

    public function create(MedicineDTO $data): MedicineDTO
    {
        $medicine = Medicines::create(
            [
                'name' => $data->name,
                'description' => $data->description,
                'in_stock' => $data->in_stock,
                'price' => $data->price
            ]
        );
        return MedicineDTO::fromModel($medicine);
    }

    public function update(int $id, MedicineDTO $data): ?MedicineDTO
    {
        $medicine = Medicines::find($id);
        if (!$medicine) {
            return null;
        }

        $medicine->update([
                'name' => $data->name,
                'description' => $data->description,
                'in_stock' => $data->in_stock,
                'price' => $data->price
            ]);
        return MedicineDTO::fromModel($medicine);
    }

    public function delete(int $id): bool
    {
        $medicine = Medicines::find($id);
        if (!$medicine) {
            return false;
        }
        return $medicine->delete();
    }
}
