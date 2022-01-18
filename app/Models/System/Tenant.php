<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'sede_id', 'name_manager', 'lastname_manager', 'email_manager',
        'phone_manager', 'type_document_manager', 'document_manager',
        'razon_social_business', 'address_business', 'name_business',
        'phone_business', 'birthday_business', 'email_business',
        'document_business', 'country_business', 'subdomain',
        'logo', 'status', 'color_business', 'account_id', 'due_date',
        'day_pay', 'monto', 'created_by', 'updated_by', 'deleted_by'
    ];

    public function getCreatedAtAttribute($value)
    {
        return date( 'd/m/Y', strtotime($value) );
    }

    public function account()
    {
        return $this->hasOne(Account::class, 'id', 'account_id');
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status)->count();
    }

}
