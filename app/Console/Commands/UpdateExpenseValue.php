<?php

namespace App\Console\Commands;

use App\Models\Expenses;
use Illuminate\Console\Command;

class UpdateExpenseValue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-expense-value';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expense = Expenses::first();
        if ($expense) {
            $expense->update(['price' => $expense->price += 1770000]);
            $this->info('Value updated successfully.');
        } else {
            $this->error('No expenses found.');
        }
    }
}
