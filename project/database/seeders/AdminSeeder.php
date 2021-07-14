<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_menu')->insert([
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Products',
                'icon' => 'fa-shopping-cart',
                'uri' => '/products',
            ],
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Manufactures',
                'icon' => 'fa-user-circle-o',
                'uri' => '/manufactures',
            ],
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Categories',
                'icon' => 'fa-bars',
                'uri' => '/categories',
            ],
        ]);
    }
}
