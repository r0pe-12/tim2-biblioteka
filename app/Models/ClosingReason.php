<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosingReason extends Model
{
    const CREATED_AT = 'submittingDate';
    const UPDATED_AT = null;
    use HasFactory;
    protected $table = 'closingReasons';
}
