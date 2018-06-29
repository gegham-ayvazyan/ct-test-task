<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Samsung Galaxy S9 Plus', 'price' => 799.99, 'quantity' => 33],
            ['name' => 'iPhone X', 'price' => 1039.99, 'quantity' => 153],
            ['name' => 'Huawei P20 Pro', 'price' => 845, 'quantity' => 11],
            ['name' => 'LG G7 ThinQ', 'price' => 749, 'quantity' => 7],
        ];
        foreach ($data as $item) {
            \App\Models\Product::create($item);
        }
    }
}
