<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    const RESERVATION = 1;
    const RESERVATION_NAME = 'reservation_deadline';

    const RETURN = 2;
    const RETURN_NAME = 'return_deadline';

    const CONFLICT = 3;
    const CONFLICT_NAME = 'conflict_deadline';

    use HasFactory;
    protected $fillable = ['name', 'value'];
}
