<?php

namespace Database\Seeders;

use App\Enum\PermissionsEnum;
use App\Enum\RolesEnum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //Roles
        $superAdminRole = RolesEnum::SuperAdmin->value;
        $adminRole =RolesEnum::Admin->value;
        $staffRole = RolesEnum::Staff->value;
        $cashierRole = RolesEnum::Cashier->value;

        //Permissions
        $manageUsersPermission = PermissionsEnum::ManageUsersPermission->value;
        $manageWarehousesPermission = PermissionsEnum::ManageWarehousePermission->value;
        $manageCustomersPermission = PermissionsEnum::ManageCustomersPermission->value;
        $manageProductsPermission = PermissionsEnum::ManageProductsPermission->value;
        $manageAuditAccessPermission = PermissionsEnum::AuditAccessPermission->value;
        $manageSystemSettingsPermission = PermissionsEnum::SystemSettingsPermission->value;
        $manageTransactionsPermission = PermissionsEnum::HandleTransactionsPermission->value;
        $manageStaffAssignmentPermission = PermissionsEnum::staffAssignment->value;
        $manageCashiersPermission = PermissionsEnum::CashierPermission->value;



        //Admin User
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin12345'),
            'role' => $adminRole,
            'permissions' => [
                $manageProductsPermission,
                $manageWarehousesPermission,
                $manageCustomersPermission,
                $manageTransactionsPermission,
                $manageStaffAssignmentPermission,
            ]
        ]);

        //Super Admin User
        User::factory()->create([
            'name' => 'Super Admin User',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('superadmin12345'),
            'role' => $superAdminRole,
            'permissions' => [
                $manageProductsPermission,
                $manageAuditAccessPermission,
                $manageSystemSettingsPermission,
                $manageUsersPermission,
            ]
        ]);

        //Staff User
        User::factory()->create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'password' => Hash::make('staff12345'),
            'role' => $staffRole,
            'permissions' => [
                $manageProductsPermission,

            ]
        ]);

        //Cashier User
        User::factory()->create([
            'name' => 'Cashier User',
            'email' => 'cashier@example.com',
            'password' => Hash::make('cashier12345'),
            'role' => $cashierRole,
            'permissions' => [
                $manageCashiersPermission
            ]
        ]);

        //Test admin User
        User::factory()->create([
            'name' => 'Teshan ',
            'email' => 'teshan@example.com',
            'password' => Hash::make('teshan123'),
            'role' => $adminRole,
            'permissions' => [
                $manageProductsPermission,
                $manageWarehousesPermission,
                $manageCustomersPermission,
                $manageTransactionsPermission,
                $manageStaffAssignmentPermission,
            ]
        ]);
    }
}
