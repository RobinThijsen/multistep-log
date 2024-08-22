<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanRecurrence extends Model
{
    use HasFactory;

    const MONTHLY = 1;
    const YEARLY = 2;
}
