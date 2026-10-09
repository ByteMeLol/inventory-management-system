<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\FinanceCategory;
use App\Enums\FinanceCategoryType;

class FinanceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // Income
            [
                'name' => 'Product Sales',
                'type' => FinanceCategoryType::Income,
                'description' => 'Direct income from store product sales.',
            ],
            [
                'name' => 'Services',
                'type' => FinanceCategoryType::Income,
                'description' => 'Income from repair, maintenance, or consulting services.',
            ],
            [
                'name' => 'Investasi',
                'type' => FinanceCategoryType::Income,
                'description' => 'Dividen atau bunga dari investasi modal.',
            ],
            [
                'name' => 'Other Income',
                'type' => FinanceCategoryType::Income,
                'description' => 'Income outside the core operations.',
            ],

            // Expenses
            [
                'name' => 'Employee Salaries',
                'type' => FinanceCategoryType::Expense,
                'description' => 'Monthly salaries and employee benefits.',
            ],
            [
                'name' => 'Building Rent',
                'type' => FinanceCategoryType::Expense,
                'description' => 'Rent for the store or operating warehouse.',
            ],
            [
                'name' => 'Electricity & Water',
                'type' => FinanceCategoryType::Expense,
                'description' => 'Monthly utility bills.',
            ],
            [
                'name' => 'Internet & Telephone',
                'type' => FinanceCategoryType::Expense,
                'description' => 'Communication and internet connection costs.',
            ],
            [
                'name' => 'Marketing & Advertising',
                'type' => FinanceCategoryType::Expense,
                'description' => 'Promotion, social media advertising, and printing costs.',
            ],
            [
                'name' => 'Maintenance & Repairs',
                'type' => FinanceCategoryType::Expense,
                'description' => 'Maintenance costs for assets and equipment.',
            ],
            [
                'name' => 'Transport & Logistics',
                'type' => FinanceCategoryType::Expense,
                'description' => 'Fuel, delivery, and business travel costs.',
            ],
            [
                'name' => 'Stock Purchases',
                'type' => FinanceCategoryType::Expense,
                'description' => 'Costs of purchasing merchandise.',
            ],
        ];

        foreach ($categories as $category) {
            FinanceCategory::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'type' => $category['type'],
                'description' => $category['description'],
            ]);
        }
    }
}
