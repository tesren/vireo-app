<?php

namespace App\Nova\Metrics;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;
use App\Models\Unit;

class SoldUnits extends Value
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this->count($request, Unit::where('status', 'Vendida'));
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            7 => __('7 Días'),
            30 => __('30 Días'),
            60 => __('60 Días'),
            90 => __('3 Meses'),
            182 => __('6 Meses'),
            365 => __('1 Año'),
        ];
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     *
     * @return \DateTimeInterface|\DateInterval|float|int|null
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

     /**
     * Get the displayable name of the metric
     *
     * @return string
     */
    public function name()
    {
        return 'Unidades Vendidas';
    }
}
