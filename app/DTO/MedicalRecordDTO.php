<?php

namespace App\DTO;

use App\Models\medicalRecord;

class MedicalRecordDTO extends baseDTO
{
    /**
     * Create a new class instance.
     */
    private int $id;
    private int $patient_id;
    private int $doctor_id;
    private string $instruction;
    private int $blood_pressure;
    private int $body_temperature;
    private string $dateTime;
    public function __construct(
        int $id,
        int $patient_id,
        int $doctor_id,
        string $instruction,
        int $blood_pressure,
        int $body_temperature,
        string $dateTime
    )
    {
        $this->id = $id;
        $this -> patient_id = $patient_id;
        $this->doctor_id = $doctor_id;
        $this -> instruction = $instruction;
        $this -> blood_pressure = $blood_pressure;
        $this->body_temperature = $body_temperature;
        $this->dateTime = $dateTime;
    }

    public static function fromModel(medicalRecord $data)
    {
        return new self(
            $data->record_id,
            $data->patient_id,
            $data->doctor_id,
            $data->instruction,
            $data->blood_pressure,
            $data->body_temperature,
            $data->dateTime->format('Y-m-d H:i:s')
        );
    }

    public  static function fromArray(array $data)
    {
        return new self(
            $data['id'],
            $data['patient_id'],
            $data['doctor_id'],
            $data['instruction'],
            $data['blood_pressure'],
            $data['body_temperature'],
            $data['dateTime']
        );
    }
}
