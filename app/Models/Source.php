<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Source extends Model
{
    use HasFactory;

    protected $table = "source";

    public static $availableFields = ['id', 'author', 'phone', 'mail', 'description', 'created_at'];

    protected $fillable = [
        'author',
        'phone',
        'mail',
        'description'
    ];

    public function getTitleAttribute($value)
    {
        return mb_strtoupper($value);
    }
}
