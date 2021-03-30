<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // find user
        $user = User::find(1);

        // Create Roles
        $SuperAdminRole = Role::create(['name' => 'super admin']);
        $AdminRole = Role::create(['name' => 'admin']);
        $EditorRole = Role::create(['name' => 'editor']);
        $StudentRole = Role::create(['name' => 'student']);
        $ParentsRole = Role::create(['name' => 'parents']);
        $GuestRole = Role::create(['name' => 'guest']);

        // if user found
        if ($user){
            $user->assignRole($SuperAdminRole);
        }

        // Permission List as array
        $permissions = [
            [
                'group_name' => 'customer',
                'permissions' => [
                    'customer.all',
                    'customer.create',
                    'customer.show',
                    'customer.update',
                    'customer.delete',
                    'customer.approved',
                ]
            ],

            [
                'group_name' => 'supplier',
                'permissions' => [
                    'supplier.all',
                    'supplier.create',
                    'supplier.show',
                    'supplier.update',
                    'supplier.delete',
                    'supplier.approved',
                ]
            ],

            [
                'group_name' => 'user',
                'permissions' => [
                    'user.all',
                    'user.create',
                    'user.show',
                    'user.update',
                    'user.delete',
                    'user.approved',
                ]
            ],

            [
                'group_name' => 'category',
                'permissions' => [
                    'category.all',
                    'category.create',
                    'category.show',
                    'category.update',
                    'category.delete',
                    'category.approved',
                ]
            ],

             [
                'group_name' => 'product',
                'permissions' => [
                    'product.all',
                    'product.create',
                    'product.show',
                    'product.update',
                    'product.delete',
                    'product.approved',
                ]
            ],

            [
                'group_name' => 'purchase',
                'permissions' => [
                    'purchase.all',
                    'purchase.create',
                    'purchase.show',
                    'purchase.update',
                    'purchase.delete',
                    'purchase.approved',
                ]
            ],

            [
                'group_name' => 'order',
                'permissions' => [
                    'order.all',
                    'order.create',
                    'order.show',
                    'order.update',
                    'order.delete',
                    'order.approved',
                ]
            ],

            [
                'group_name' => 'sms',
                'permissions' => [
                    'sms.all',
                    'sms.create',
                    'sms.show',
                    'sms.update',
                    'sms.delete',
                    'sms.approved',
                ]
            ],

            [
                'group_name' => 'messages',
                'permissions' => [
                    'messages.all',
                    'messages.create',
                    'messages.show',
                    'messages.update',
                    'messages.delete',
                    'messages.approved',
                ]
            ],

            [
                'group_name' => 'role',
                'permissions' => [
                    'role.all',
                    'role.create',
                    'role.show',
                    'role.update',
                    'role.delete',
                ]
            ],

            [
                'group_name' => 'print',
                'permissions' => [
                    'print.all',
                    'print.show',
                ]
            ],

            [
                'group_name' => 'settings',
                'permissions' => [
                    'settings.all',
                    'settings.create',
                    'settings.show',
                    'settings.update',
                    'settings.delete',
                ]
            ],


        ];

        // Assign Permissions

        for ($i = 0; $i < count($permissions); $i++){
            $permissionGroup = $permissions[$i]['group_name'];

            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++){
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j],'group_name' =>  $permissionGroup ]);
                $SuperAdminRole->givePermissionTo($permission);
                $permission->assignRole($SuperAdminRole);
            }
        }


    }
}
