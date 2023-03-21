<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Province extends Model
{
    use HasFactory;

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function customers()
    {
        return $this->hasManyThrough(Customer::class, Shop::class);
    }

    public function scopeReport($query){
        $query->withCount('customers');
        $query->withCount(['customers as MOH' => function ($query) {
            $query->where('card_type', 'MOH');
        }]);
        $query->withCount(['customers as MOD' => function ($query) {
            $query->where('card_type', 'MOD');
        }]);
        $query->withCount(['customers as max' => function($query) {
            $query->select(DB::raw('MAX(number_vaccinated)'));
        }]);
        return $query;
    }

    public function scopeFilter($query, $params){
        $searchString = $params['search'] ?? null;
        $orderBy = $params['orderBy'] ?? 'name';
        $orderDir = $params['orderDir'] ?? 'desc';
        $query->orderBy($orderBy, $orderDir);
        $query->when($searchString, function($q) use ($searchString){
            $q->where('name', 'like' , '%'.$searchString.'%');
        });
        return $query;
    }

}
