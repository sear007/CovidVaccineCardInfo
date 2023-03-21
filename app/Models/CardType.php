<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    use HasFactory;

    public function Customer()
    {
        return $this->hasMany(Customer::class);
    }
}
