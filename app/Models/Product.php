<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'quantity', 'price'];

    public static function boot()
    {
        self::saved(function(self $model) {
            $model->storeJson();
        });
    }

    private function storeJson()
    {
        $data = $this->toJson();
        $id = $this->attributes['id'];
        $dir = storage_path('products');
        if (!\File::exists($dir)) {
            \File::makeDirectory($dir);
        }
        \File::put($dir . DIRECTORY_SEPARATOR . "product-$id.json", $data);
    }
}
