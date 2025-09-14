<?php

namespace App\Repository;

use App\DTO\MedicalRecordDTO;
use App\Models\medicalRecord;

class MedicalRecordRepo
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(MedicalRecordDTO $data)
    {
        $record = medicalRecord::create(
            [
                'patient_id' => $data->patient_id,
                'doctor_id' => $data->doctor_id,
                'instruction' => $data->instruction,
                'blood_pressure' => $data->blood_pressure,
                'body_temperature' => $data->body_temperature
            ]
        );
        return MedicalRecordDTO::fromModel($record);
    }

    public function update(int $id,MedicalRecordDTO $data)
    {
        $record = medicalRecord::find($id);
        if(!$record)
        {
            return null;
        }
        $record->update(
            [
                'patient_id' => $data->patient_id,
                'doctor_id' => $data->doctor_id,
                'instruction' => $data->instruction,
                'blood_pressure' => $data->blood_pressure,
                'body_temperature' => $data->body_temperature
            ]
        );
        return MedicalRecordDTO::fromModel($record);
    }

    public function delete(int $id): bool
    {
        $record = medicalRecord::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
