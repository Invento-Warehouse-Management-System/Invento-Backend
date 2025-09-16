<?php

namespace App\Enum;

enum PermissionsEnum: string
{
    case ManageUsersPermission = 'manage_users';
    case ManageWarehousePermission = 'manage_warehouse';
    case ManageProductsPermission = 'manage_products';
    case ManageCustomersPermission = 'manage_customers';
    case AuditAccessPermission = 'audit_access';
    case SystemSettingsPermission = 'system_settings';
    case HandleTransactionsPermission = 'handle_transactions';
    case staffAssignment = 'staff_assignment';
    case CashierPermission = 'cashier_permission';


}
