<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'quantity', 'price'];

    public static function boot()
    {
        self::saved(function (self $model) {
            $model->storeJson();
        });
        self::deleting(function (self $model) {
            $model->deleteJson();
        });
    }

    public function getFilePathAttribute()
    {
        $id = $this->id;
        return storage_path('products') . DIRECTORY_SEPARATOR . "product-$id.json";
    }

    private function storeJson()
    {
        $data = $this->toJson();
        $dir = storage_path('products');
        if (!\File::exists($dir)) {
            \File::makeDirectory($dir);
        }
        \File::put($this->file_path, $data);
    }

    private function deleteJson()
    {
        if (\File::exists($this->file_path)) {
            \File::delete($this->file_path);
        }
    }
}
