<?php

namespace Database\Seeders;


use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'doctor_create',
            ],
            [
                'id'    => 18,
                'title' => 'doctor_edit',
            ],
            [
                'id'    => 19,
                'title' => 'doctor_show',
            ],
            [
                'id'    => 20,
                'title' => 'doctor_delete',
            ],
            [
                'id'    => 21,
                'title' => 'doctor_access',
            ],
            [
                'id'    => 22,
                'title' => 'patient_create',
            ],
            [
                'id'    => 23,
                'title' => 'patient_edit',
            ],
            [
                'id'    => 24,
                'title' => 'patient_show',
            ],
            [
                'id'    => 25,
                'title' => 'patient_delete',
            ],
            [
                'id'    => 26,
                'title' => 'patient_access',
            ],
            [
                'id'    => 27,
                'title' => 'appointment_create',
            ],
            [
                'id'    => 28,
                'title' => 'appointment_edit',
            ],
            [
                'id'    => 29,
                'title' => 'appointment_show',
            ],
            [
                'id'    => 30,
                'title' => 'appointment_delete',
            ],
            [
                'id'    => 31,
                'title' => 'appointment_access',
            ],
            [
                'id'    => 32,
                'title' => 'service_create',
            ],
            [
                'id'    => 33,
                'title' => 'service_edit',
            ],
            [
                'id'    => 34,
                'title' => 'service_show',
            ],
            [
                'id'    => 35,
                'title' => 'service_delete',
            ],
            [
                'id'    => 36,
                'title' => 'service_access',
            ],
            [
                'id'    => 37,
                'title' => 'operation_create',
            ],
            [
                'id'    => 38,
                'title' => 'operation_edit',
            ],
            [
                'id'    => 39,
                'title' => 'operation_show',
            ],
            [
                'id'    => 40,
                'title' => 'operation_delete',
            ],
            [
                'id'    => 41,
                'title' => 'operation_access',
            ],
            [
                'id'    => 42,
                'title' => 'medicine_create',
            ],
            [
                'id'    => 43,
                'title' => 'medicine_edit',
            ],
            [
                'id'    => 44,
                'title' => 'medicine_show',
            ],
            [
                'id'    => 45,
                'title' => 'medicine_delete',
            ],
            [
                'id'    => 46,
                'title' => 'medicine_access',
            ],
            [
                'id'    => 47,
                'title' => 'prescription_create',
            ],
            [
                'id'    => 48,
                'title' => 'prescription_edit',
            ],
            [
                'id'    => 49,
                'title' => 'prescription_show',
            ],
            [
                'id'    => 50,
                'title' => 'prescription_delete',
            ],
            [
                'id'    => 51,
                'title' => 'prescription_access',
            ],
            [
                'id'    => 52,
                'title' => 'entry_create',
            ],
            [
                'id'    => 53,
                'title' => 'entry_edit',
            ],
            [
                'id'    => 54,
                'title' => 'entry_show',
            ],
            [
                'id'    => 55,
                'title' => 'entry_delete',
            ],
            [
                'id'    => 56,
                'title' => 'entry_access',
            ],
            [
                'id'    => 57,
                'title' => 'material_create',
            ],
            [
                'id'    => 58,
                'title' => 'material_edit',
            ],
            [
                'id'    => 59,
                'title' => 'material_show',
            ],
            [
                'id'    => 60,
                'title' => 'material_delete',
            ],
            [
                'id'    => 61,
                'title' => 'material_access',
            ],
            [
                'id'    => 62,
                'title' => 'expense_create',
            ],
            [
                'id'    => 63,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 64,
                'title' => 'expense_show',
            ],
            [
                'id'    => 65,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 66,
                'title' => 'expense_access',
            ],
            [
                'id'    => 67,
                'title' => 'employee_create',
            ],
            [
                'id'    => 68,
                'title' => 'employee_edit',
            ],
            [
                'id'    => 69,
                'title' => 'employee_show',
            ],
            [
                'id'    => 70,
                'title' => 'employee_delete',
            ],
            [
                'id'    => 71,
                'title' => 'employee_access',
            ],
            [
                'id'    => 72,
                'title' => 'report_access',
            ],
            [
                'id'    => 73,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}