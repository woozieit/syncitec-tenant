<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank', 'number_account', 'name_account', 'cci',
        'ruc', 'user_sunat', 'pass_sunat', 'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function scopeGetList()
    {
        return $this->latest()->get();
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when( $filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('bank', 'like', '%' . $search . '%')
                    ->orwhere('number_account', 'like', '%' . $search . '%')
                    ->orwhere('name_account', 'like', '%' . $search . '%');
            });
        });
    }
}
