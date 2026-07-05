<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Expense;

class ExpenseSeeder extends Seeder
{
            public function run(): void
{
    $categories = ['Food', 'Transport', 'Bills', 'Shopping', 'Other'];

    for ($i = 1; $i <= 20; $i++) {

        Expense::create([
            'title' => 'Sample Expense ' . $i,
            'amount' => rand(100, 5000),
            'category' => $categories[array_rand($categories)],
            'expense_date' => now()->subDays(rand(0, 30)),
        ]);

    }
}
    }

