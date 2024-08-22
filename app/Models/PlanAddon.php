<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanAddon extends Model
{
    use HasFactory;

    const ONLINE_SERVICE = 1;
    const LARGER_STORAGE = 2;
    const CUSTOMIZABLE_PROFILE = 3;

    public function getPlanAddonPriceByRecurrence($plan_recurrence_id, $isBoolean = false)
    {
        if ($isBoolean) {
            $plan_recurrence_id = $plan_recurrence_id
                ? PlanRecurrence::YEARLY
                : PlanRecurrence::MONTHLY;
        }

        return match ($plan_recurrence_id) {
            PlanRecurrence::MONTHLY => "+$$this->monthly_price/mo",
            PlanRecurrence::YEARLY => "+$$this->yearly_price/yr",
            default => 0,
        };
    }
}
