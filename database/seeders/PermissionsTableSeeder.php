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
                'title' => 'respondent_category_create',
            ],
            [
                'id'    => 18,
                'title' => 'respondent_category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'respondent_category_show',
            ],
            [
                'id'    => 20,
                'title' => 'respondent_category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'respondent_category_access',
            ],
            [
                'id'    => 22,
                'title' => 'respondent_create',
            ],
            [
                'id'    => 23,
                'title' => 'respondent_edit',
            ],
            [
                'id'    => 24,
                'title' => 'respondent_show',
            ],
            [
                'id'    => 25,
                'title' => 'respondent_delete',
            ],
            [
                'id'    => 26,
                'title' => 'respondent_access',
            ],
            [
                'id'    => 27,
                'title' => 'resource_create',
            ],
            [
                'id'    => 28,
                'title' => 'resource_edit',
            ],
            [
                'id'    => 29,
                'title' => 'resource_show',
            ],
            [
                'id'    => 30,
                'title' => 'resource_delete',
            ],
            [
                'id'    => 31,
                'title' => 'resource_access',
            ],
            [
                'id'    => 32,
                'title' => 'question_create',
            ],
            [
                'id'    => 33,
                'title' => 'question_edit',
            ],
            [
                'id'    => 34,
                'title' => 'question_show',
            ],
            [
                'id'    => 35,
                'title' => 'question_delete',
            ],
            [
                'id'    => 36,
                'title' => 'question_access',
            ],
            [
                'id'    => 37,
                'title' => 'answer_create',
            ],
            [
                'id'    => 38,
                'title' => 'answer_edit',
            ],
            [
                'id'    => 39,
                'title' => 'answer_show',
            ],
            [
                'id'    => 40,
                'title' => 'answer_delete',
            ],
            [
                'id'    => 41,
                'title' => 'answer_access',
            ],
            [
                'id'    => 42,
                'title' => 'country_create',
            ],
            [
                'id'    => 43,
                'title' => 'country_edit',
            ],
            [
                'id'    => 44,
                'title' => 'country_show',
            ],
            [
                'id'    => 45,
                'title' => 'country_delete',
            ],
            [
                'id'    => 46,
                'title' => 'country_access',
            ],
            [
                'id'    => 47,
                'title' => 'county_create',
            ],
            [
                'id'    => 48,
                'title' => 'county_edit',
            ],
            [
                'id'    => 49,
                'title' => 'county_show',
            ],
            [
                'id'    => 50,
                'title' => 'county_delete',
            ],
            [
                'id'    => 51,
                'title' => 'county_access',
            ],
            [
                'id'    => 52,
                'title' => 'sub_county_create',
            ],
            [
                'id'    => 53,
                'title' => 'sub_county_edit',
            ],
            [
                'id'    => 54,
                'title' => 'sub_county_show',
            ],
            [
                'id'    => 55,
                'title' => 'sub_county_delete',
            ],
            [
                'id'    => 56,
                'title' => 'sub_county_access',
            ],
            [
                'id'    => 57,
                'title' => 'constituency_create',
            ],
            [
                'id'    => 58,
                'title' => 'constituency_edit',
            ],
            [
                'id'    => 59,
                'title' => 'constituency_show',
            ],
            [
                'id'    => 60,
                'title' => 'constituency_delete',
            ],
            [
                'id'    => 61,
                'title' => 'constituency_access',
            ],
            [
                'id'    => 62,
                'title' => 'ward_create',
            ],
            [
                'id'    => 63,
                'title' => 'ward_edit',
            ],
            [
                'id'    => 64,
                'title' => 'ward_show',
            ],
            [
                'id'    => 65,
                'title' => 'ward_delete',
            ],
            [
                'id'    => 66,
                'title' => 'ward_access',
            ],
            [
                'id'    => 67,
                'title' => 'office_create',
            ],
            [
                'id'    => 68,
                'title' => 'office_edit',
            ],
            [
                'id'    => 69,
                'title' => 'office_show',
            ],
            [
                'id'    => 70,
                'title' => 'office_delete',
            ],
            [
                'id'    => 71,
                'title' => 'office_access',
            ],
            [
                'id'    => 72,
                'title' => 'source_create',
            ],
            [
                'id'    => 73,
                'title' => 'source_edit',
            ],
            [
                'id'    => 74,
                'title' => 'source_show',
            ],
            [
                'id'    => 75,
                'title' => 'source_delete',
            ],
            [
                'id'    => 76,
                'title' => 'source_access',
            ],
            [
                'id'    => 77,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
