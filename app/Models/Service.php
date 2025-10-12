<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image_url'];

    protected $casts = [
        'price' => 'decimal:2',
    ];
    // Helper method to get raw numeric price for calculations
    public function getRawPrice()
    {
        return (float) $this->getRawOriginal('price');
    }

    // Helper method to get formatted price for display
    public function getFormattedPrice()
    {
        return number_format($this->getRawOriginal('price'));
    }
}
