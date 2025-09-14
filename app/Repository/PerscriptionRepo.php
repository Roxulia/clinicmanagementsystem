<?php

namespace App\Repository;

use App\DTO\PerscriptionDTO;
use App\Models\perscriptions;

class PerscriptionRepo
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(PerscriptionDTO $data)
    {
        $perscription = perscriptions::create(
            [
                'record_id' => $data->record_id,
                'medicine_id'=>$data->medicine_id,
                'dosage' => $data->dosage,
                'quantity_taken'=>$data->quantity_taken,
                'cost' => $data->cost
            ]
        );
        return PerscriptionDTO::fromModel($perscription);
    }

    public function update(PerscriptionDTO $data,int $id)
    {
        $perscription = perscriptions::find($id);
        if(!$perscription)
        {
            return null;
        }
        $perscription->update(
            [
                'record_id' => $data->record_id,
                'medicine_id'=>$data->medicine_id,
                'dosage' => $data->dosage,
                'quantity_taken'=>$data->quantity_taken,
                'cost' => $data->cost
            ]
        );
        return PerscriptionDTO::fromModel($perscription);
    }

    public function delete(int $id)
    {
        $data = perscriptions::find($id);
        if (!$data) {
            return false;
        }
        return $data->delete();
    }
}
