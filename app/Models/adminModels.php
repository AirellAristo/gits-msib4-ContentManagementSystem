<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminModels extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'ID_admin';

    protected $fillable = [
        'username',
        'password'
    ];
}
