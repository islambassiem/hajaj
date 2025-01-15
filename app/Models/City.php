<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'city_ar', 'city_en', 'province_id'
    ];

    public function parent()
    {
        return $this->belongsTo(City::class, 'province_id', 'id');
    }

    public function cities()
    {
        return $this->where('province_id', $this->id)->get('id');
    }
}
