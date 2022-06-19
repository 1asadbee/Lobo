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
                'title' => 'phone_number_create',
            ],
            [
                'id'    => 18,
                'title' => 'phone_number_edit',
            ],
            [
                'id'    => 19,
                'title' => 'phone_number_show',
            ],
            [
                'id'    => 20,
                'title' => 'phone_number_delete',
            ],
            [
                'id'    => 21,
                'title' => 'phone_number_access',
            ],
            [
                'id'    => 22,
                'title' => 'country_create',
            ],
            [
                'id'    => 23,
                'title' => 'country_edit',
            ],
            [
                'id'    => 24,
                'title' => 'country_show',
            ],
            [
                'id'    => 25,
                'title' => 'country_delete',
            ],
            [
                'id'    => 26,
                'title' => 'country_access',
            ],
            [
                'id'    => 27,
                'title' => 'city_create',
            ],
            [
                'id'    => 28,
                'title' => 'city_edit',
            ],
            [
                'id'    => 29,
                'title' => 'city_show',
            ],
            [
                'id'    => 30,
                'title' => 'city_delete',
            ],
            [
                'id'    => 31,
                'title' => 'city_access',
            ],
            [
                'id'    => 32,
                'title' => 'state_create',
            ],
            [
                'id'    => 33,
                'title' => 'state_edit',
            ],
            [
                'id'    => 34,
                'title' => 'state_show',
            ],
            [
                'id'    => 35,
                'title' => 'state_delete',
            ],
            [
                'id'    => 36,
                'title' => 'state_access',
            ],
            [
                'id'    => 37,
                'title' => 'delivery_type_create',
            ],
            [
                'id'    => 38,
                'title' => 'delivery_type_edit',
            ],
            [
                'id'    => 39,
                'title' => 'delivery_type_show',
            ],
            [
                'id'    => 40,
                'title' => 'delivery_type_delete',
            ],
            [
                'id'    => 41,
                'title' => 'delivery_type_access',
            ],
            [
                'id'    => 42,
                'title' => 'vehicle_create',
            ],
            [
                'id'    => 43,
                'title' => 'vehicle_edit',
            ],
            [
                'id'    => 44,
                'title' => 'vehicle_show',
            ],
            [
                'id'    => 45,
                'title' => 'vehicle_delete',
            ],
            [
                'id'    => 46,
                'title' => 'vehicle_access',
            ],
            [
                'id'    => 47,
                'title' => 'vehicle_type_create',
            ],
            [
                'id'    => 48,
                'title' => 'vehicle_type_edit',
            ],
            [
                'id'    => 49,
                'title' => 'vehicle_type_show',
            ],
            [
                'id'    => 50,
                'title' => 'vehicle_type_delete',
            ],
            [
                'id'    => 51,
                'title' => 'vehicle_type_access',
            ],
            [
                'id'    => 52,
                'title' => 'vehicle_model_create',
            ],
            [
                'id'    => 53,
                'title' => 'vehicle_model_edit',
            ],
            [
                'id'    => 54,
                'title' => 'vehicle_model_show',
            ],
            [
                'id'    => 55,
                'title' => 'vehicle_model_delete',
            ],
            [
                'id'    => 56,
                'title' => 'vehicle_model_access',
            ],
            [
                'id'    => 57,
                'title' => 'carrier_create',
            ],
            [
                'id'    => 58,
                'title' => 'carrier_edit',
            ],
            [
                'id'    => 59,
                'title' => 'carrier_show',
            ],
            [
                'id'    => 60,
                'title' => 'carrier_delete',
            ],
            [
                'id'    => 61,
                'title' => 'carrier_access',
            ],
            [
                'id'    => 62,
                'title' => 'carrier_post_create',
            ],
            [
                'id'    => 63,
                'title' => 'carrier_post_edit',
            ],
            [
                'id'    => 64,
                'title' => 'carrier_post_show',
            ],
            [
                'id'    => 65,
                'title' => 'carrier_post_delete',
            ],
            [
                'id'    => 66,
                'title' => 'carrier_post_access',
            ],
            [
                'id'    => 67,
                'title' => 'load_type_create',
            ],
            [
                'id'    => 68,
                'title' => 'load_type_edit',
            ],
            [
                'id'    => 69,
                'title' => 'load_type_show',
            ],
            [
                'id'    => 70,
                'title' => 'load_type_delete',
            ],
            [
                'id'    => 71,
                'title' => 'load_type_access',
            ],
            [
                'id'    => 72,
                'title' => 'currency_create',
            ],
            [
                'id'    => 73,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 74,
                'title' => 'currency_show',
            ],
            [
                'id'    => 75,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 76,
                'title' => 'currency_access',
            ],
            [
                'id'    => 77,
                'title' => 'customer_post_create',
            ],
            [
                'id'    => 78,
                'title' => 'customer_post_edit',
            ],
            [
                'id'    => 79,
                'title' => 'customer_post_show',
            ],
            [
                'id'    => 80,
                'title' => 'customer_post_delete',
            ],
            [
                'id'    => 81,
                'title' => 'customer_post_access',
            ],
            [
                'id'    => 82,
                'title' => 'declarant_create',
            ],
            [
                'id'    => 83,
                'title' => 'declarant_edit',
            ],
            [
                'id'    => 84,
                'title' => 'declarant_show',
            ],
            [
                'id'    => 85,
                'title' => 'declarant_delete',
            ],
            [
                'id'    => 86,
                'title' => 'declarant_access',
            ],
            [
                'id'    => 87,
                'title' => 'wallet_create',
            ],
            [
                'id'    => 88,
                'title' => 'wallet_edit',
            ],
            [
                'id'    => 89,
                'title' => 'wallet_show',
            ],
            [
                'id'    => 90,
                'title' => 'wallet_delete',
            ],
            [
                'id'    => 91,
                'title' => 'wallet_access',
            ],
            [
                'id'    => 92,
                'title' => 'place_access',
            ],
            [
                'id'    => 93,
                'title' => 'delivery_and_vehicle_access',
            ],
            [
                'id'    => 94,
                'title' => 'carriers_action_access',
            ],
            [
                'id'    => 95,
                'title' => 'carrier_posts_description_create',
            ],
            [
                'id'    => 96,
                'title' => 'carrier_posts_description_edit',
            ],
            [
                'id'    => 97,
                'title' => 'carrier_posts_description_show',
            ],
            [
                'id'    => 98,
                'title' => 'carrier_posts_description_delete',
            ],
            [
                'id'    => 99,
                'title' => 'carrier_posts_description_access',
            ],
            [
                'id'    => 100,
                'title' => 'customer_posts_description_create',
            ],
            [
                'id'    => 101,
                'title' => 'customer_posts_description_edit',
            ],
            [
                'id'    => 102,
                'title' => 'customer_posts_description_show',
            ],
            [
                'id'    => 103,
                'title' => 'customer_posts_description_delete',
            ],
            [
                'id'    => 104,
                'title' => 'customer_posts_description_access',
            ],
            [
                'id'    => 105,
                'title' => 'customer_action_access',
            ],
            [
                'id'    => 106,
                'title' => 'declarants_description_create',
            ],
            [
                'id'    => 107,
                'title' => 'declarants_description_edit',
            ],
            [
                'id'    => 108,
                'title' => 'declarants_description_show',
            ],
            [
                'id'    => 109,
                'title' => 'declarants_description_delete',
            ],
            [
                'id'    => 110,
                'title' => 'declarants_description_access',
            ],
            [
                'id'    => 111,
                'title' => 'declarants_action_access',
            ],
            [
                'id'    => 112,
                'title' => 'report_access',
            ],
            [
                'id'    => 113,
                'title' => 'insertion_create',
            ],
            [
                'id'    => 114,
                'title' => 'insertion_edit',
            ],
            [
                'id'    => 115,
                'title' => 'insertion_show',
            ],
            [
                'id'    => 116,
                'title' => 'insertion_delete',
            ],
            [
                'id'    => 117,
                'title' => 'insertion_access',
            ],
            [
                'id'    => 118,
                'title' => 'expenses_carrier_post_create',
            ],
            [
                'id'    => 119,
                'title' => 'expenses_carrier_post_edit',
            ],
            [
                'id'    => 120,
                'title' => 'expenses_carrier_post_show',
            ],
            [
                'id'    => 121,
                'title' => 'expenses_carrier_post_delete',
            ],
            [
                'id'    => 122,
                'title' => 'expenses_carrier_post_access',
            ],
            [
                'id'    => 123,
                'title' => 'expenses_customer_post_create',
            ],
            [
                'id'    => 124,
                'title' => 'expenses_customer_post_edit',
            ],
            [
                'id'    => 125,
                'title' => 'expenses_customer_post_show',
            ],
            [
                'id'    => 126,
                'title' => 'expenses_customer_post_delete',
            ],
            [
                'id'    => 127,
                'title' => 'expenses_customer_post_access',
            ],
            [
                'id'    => 128,
                'title' => 'expenses_declarant_post_create',
            ],
            [
                'id'    => 129,
                'title' => 'expenses_declarant_post_edit',
            ],
            [
                'id'    => 130,
                'title' => 'expenses_declarant_post_show',
            ],
            [
                'id'    => 131,
                'title' => 'expenses_declarant_post_delete',
            ],
            [
                'id'    => 132,
                'title' => 'expenses_declarant_post_access',
            ],
            [
                'id'    => 133,
                'title' => 'trailer_size_create',
            ],
            [
                'id'    => 134,
                'title' => 'trailer_size_edit',
            ],
            [
                'id'    => 135,
                'title' => 'trailer_size_show',
            ],
            [
                'id'    => 136,
                'title' => 'trailer_size_delete',
            ],
            [
                'id'    => 137,
                'title' => 'trailer_size_access',
            ],
            [
                'id'    => 138,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
