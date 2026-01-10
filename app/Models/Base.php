<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Base extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'idx';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    const CREATED_AT = 'create_datetime';
    const UPDATED_AT = 'update_datetime';
    const DELETED_AT = 'delete_datetime';

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->create_datetime = now();
        });

        static::updating(function ($model) {
            $model->update_datetime = now();
        });
    }
}
