<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Unit extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The paymentPlans that belong to the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function paymentPlans()
    {
        return $this->belongsToMany(PaymentPlan::class, 'payment_plan_unit', 'unit_id', 'payment_plan_id');
    }

    /**
     * Get the unitType that owns the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unitType()
    {
        return $this->belongsTo(UnitType::class, 'unit_type_id');
    }

}