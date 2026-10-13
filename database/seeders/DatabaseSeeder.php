<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Starter',
                'slug' => 'starter',
                'description' => 'Perfect for small businesses starting digital operations.',
                'price' => 499,
                'billing_cycle' => 'monthly',
                'is_popular' => false,
                'is_active' => true,
                'sort_order' => 1,
                'features' => ['1 user', 'Core business tools', 'Email support', 'Basic reporting'],
            ],
            [
                'name' => 'Professional',
                'slug' => 'professional',
                'description' => 'Ideal for growing teams needing automation and insights.',
                'price' => 999,
                'billing_cycle' => 'monthly',
                'is_popular' => true,
                'is_active' => true,
                'sort_order' => 2,
                'features' => ['Unlimited users', 'Advanced dashboards', 'API integrations', 'Priority support'],
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
                'description' => 'Built for scaling operations with dedicated support.',
                'price' => 1999,
                'billing_cycle' => 'monthly',
                'is_popular' => false,
                'is_active' => true,
                'sort_order' => 3,
                'features' => ['Multi-branch support', 'Custom modules', 'Dedicated onboarding', 'Premium support'],
            ],
        ];

        foreach ($plans as $planData) {
            $plan = Plan::create([
                'name' => $planData['name'],
                'slug' => $planData['slug'],
                'description' => $planData['description'],
                'price' => $planData['price'],
                'billing_cycle' => $planData['billing_cycle'],
                'is_popular' => $planData['is_popular'],
                'is_active' => $planData['is_active'],
                'sort_order' => $planData['sort_order'],
            ]);

            foreach ($planData['features'] as $featureText) {
                PlanFeature::create([
                    'plan_id' => $plan->id,
                    'feature' => $featureText,
                ]);
            }
        }

        User::firstOrCreate(
            ['email' => 'demo@saraskills.com'],
            [
                'name' => 'SaraSkills Demo',
                'phone' => '+919999999999',
                'password' => Hash::make('password'),
            ]
        );
    }
}
