<?php

namespace Tests\Unit;

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a patient.
     */
    public function test_patient_creation(): void
    {
        $patient = Patient::factory()->create([
            'name' => 'João Silva',
            'cpf' => '12345678901',
            'phone' => '11987654321',
            'birth_date' => '1990-01-01',
        ]);

        $this->assertEquals('João Silva', $patient->name);
        $this->assertEquals('12345678901', $patient->cpf);
    }
}