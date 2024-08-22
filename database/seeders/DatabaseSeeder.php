<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanAddon;
use App\Models\PlanRecurrence;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        PlanRecurrence::factory()->create([
            'id' => PlanRecurrence::MONTHLY,
            'name' => 'Monthly',
        ]);
        PlanRecurrence::factory()->create([
            'id' => PlanRecurrence::YEARLY,
            'name' => 'Yearly',
        ]);

        Plan::factory()->create([
            'id' => Plan::ARCADE,
            'name' => 'Arcade',
            'monthly_price' => 9,
            'yearly_price' => 90,
        ]);
        Plan::factory()->create([
            'id' => Plan::ADVANCED,
            'name' => 'Advanced',
            'monthly_price' => 12,
            'yearly_price' => 120,
        ]);
        Plan::factory()->create([
            'id' => Plan::PRO,
            'name' => 'Pro',
            'monthly_price' => 15,
            'yearly_price' => 150,
        ]);


        PlanAddon::factory()->create([
            'id' => PlanAddon::ONLINE_SERVICE,
            'name' => 'Online Service',
            'description' => 'Access to multiplayer games',
            'monthly_price' => 1,
            'yearly_price' => 10,
        ]);
        PlanAddon::factory()->create([
            'id' => PlanAddon::LARGER_STORAGE,
            'name' => 'Larger storage',
            'description' => 'Extra 1TB of cloud save',
            'monthly_price' => 2,
            'yearly_price' => 20,
        ]);
        PlanAddon::factory()->create([
            'id' => PlanAddon::CUSTOMIZABLE_PROFILE,
            'name' => 'Customizable Profile',
            'description' => 'Custom theme on your profile',
            'monthly_price' => 2,
            'yearly_price' => 20,
        ]);
    }
}
