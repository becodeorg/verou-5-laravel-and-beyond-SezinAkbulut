<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class UpdateRandomProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:randomproduct';

    protected $description = 'Update a random product every 3 hours';

    public function handle()
    {
        // Your logic to fetch a new random product
        $newRandomProduct = Product::inRandomOrder()->first();

        // Your logic to update the product or perform any other actions
        // Example: $newRandomProduct->update([...]);

        $this->info('Random product updated successfully!');
    }

}
