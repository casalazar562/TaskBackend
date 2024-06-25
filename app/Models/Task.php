<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;

    const PENDING='pending';
    const IN_PROGRESS='in_progress';
    const FINALIZED='finalized';

    protected $fillable = ['name', 'status', 'assignment_date','user_id'];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
    protected $casts = [
        'id' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
    public function scopeById(Builder $query, string $value): Builder
    {
        return $query->where('id', $value);
    }
}
