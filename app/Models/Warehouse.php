<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Warehouse extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'warehouses';

    protected $fillable = [
        'name',
        'password',
        'type',
        'location',
    ];


    public function staff(): \Illuminate\Database\Eloquent\Relations\HasMany|\MongoDB\Laravel\Relations\HasMany
    {
        return $this->hasMany(User::class, 'warehouse_id', '_id');
    }




}
