<?php

namespace App\Models;

use App\Observers\UnitObserver;
use Spatie\Image\Manipulations;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;


#[ObservedBy([UnitObserver::class])]
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

    /**
     * Get the shape associated with the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shape()
    {
        return $this->hasOne(Shape::class);
    }

    protected function getInteriorConstAttribute($value)
    {
        if (App::isLocale('en')) {
            return (round($value * 10.764, 2));
        }else{
            return $value;
        }
    }

    protected function getExteriorConstAttribute($value)
    {
        if (App::isLocale('en')) {
            return (round($value * 10.764, 2));
        }else{
            return $value;
        }
    }

    protected function getExtraExteriorConstAttribute($value)
    {
        if( isset($value) ){
            if (App::isLocale('en')) {
                return (round($value * 10.764, 2));
            }else{
                return $value;
            }
        }
        else{
            return null;
        }
    }

    protected function getParkingAreaAttribute($value)
    {
        if( isset($value) ){
            if (App::isLocale('en')) {
                return (round($value * 10.764, 2));
            }else{
                return $value;
            }
        }
        else{
            return null;
        }
    }

    protected function getStorageAreaAttribute($value)
    {
        if( isset($value) ){
            if (App::isLocale('en')) {
                return (round($value * 10.764, 2));
            }else{
                return $value;
            }
        }
        else{
            return null;
        }
    }

    protected function getGardenAreaAttribute($value)
    {
        if( isset($value) ){
            if (App::isLocale('en')) {
                return (round($value * 10.764, 2));
            }else{
                return $value;
            }
        }
        else{
            return null;
        }
    }

    protected function getTotalConstAttribute($value)
    {
        if (App::isLocale('en')) {
            return (round($value * 10.764, 2));
        }else{
            return $value;
        }
    }

}