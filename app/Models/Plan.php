<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    const ARCADE = 1;
    const ADVANCED = 2;
    const PRO = 3;

    public function getPlanPriceByRecurrence($plan_recurrence_id, $isBoolean = false)
    {
        if ($isBoolean) {
            $plan_recurrence_id = $plan_recurrence_id
                ? PlanRecurrence::YEARLY
                : PlanRecurrence::MONTHLY;
        }

        return match ($plan_recurrence_id) {
            PlanRecurrence::MONTHLY => "$$this->monthly_price/mo",
            PlanRecurrence::YEARLY => "$$this->yearly_price/yr",
            default => 0,
        };
    }
}
