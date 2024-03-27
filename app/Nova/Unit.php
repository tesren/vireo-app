<?php

namespace App\Nova;

use App\Nova\View;
use Laravel\Nova\Panel;
use App\Nova\PaymentPlan;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use App\Nova\Actions\ChangeUnitView;
use Laravel\Nova\Fields\BelongsToMany;
use App\Nova\Actions\AssignPaymentPlan;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Image;
use App\Nova\Actions\ChangeStatus;
use Laravel\Nova\Fields\FormData;

class Unit extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Unit::class;

    public function title(){
        return 'Unidad '.$this->name;
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Unidad');
    }

    public static function label()
    {
        return __('Unidades');
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable()->hideFromDetail()->hideFromIndex(),

            Text::make('Unidad', 'name')->rules('required', 'max:50')->sortable()->creationRules('unique:units,name')->updateRules('unique:units,name,{{resourceId}}')->placeholder('Nombre o número de la unidad'),

            BelongsTo::make('Tipo de Unidad', 'unitType', UnitType::class)->withoutTrashed()->rules('required')->filterable(),

            Number::make('Piso', 'floor')->rules('required')->min(0)->max(35)->sortable(),

            Number::make('Precio', 'price')->rules('required')->min(0)->step(0.01)->sortable()
            ->displayUsing(
                function($value){
                    return '$'.number_format($value,2).' '.$this->currency;
                }
            ),

            Select::make('Moneda', 'currency')->options([
                'USD' => 'USD',
                'MXN' => 'MXN',
            ])->rules('required')->default('MXN')->onlyOnForms(),

            Select::make('Estatus', 'status')->options([
                'Disponible' => 'Disponible',
                'Apartada' => 'Apartada',
                'Vendida' => 'Vendida',
            ])->rules('required')->default('Disponible')->onlyOnForms()->filterable(),

            Badge::make('Estatus', 'status')->map([
                'Vendida' => 'danger',
                'Disponible' => 'success',
                'Apartada' => 'warning',
            ])->sortable(),

            //BelongsToMany::make('Planes de pago', 'paymentPlans', PaymentPlan::class),

            Tag::make('Planes de pago', 'paymentPlans', PaymentPlan::class)->hideFromIndex(),

            Panel::make('Medidas', $this->sizesFields()),
     ];
    }

    /**
     * Get the sizes fields for the resource.
     *
     * @return array
     */
    protected function sizesFields()
    {
        return [
            Number::make('Interior', 'interior_const')->hideFromIndex()->placeholder('Metros cuadrados del interior')->min(0)->max(99999)->rules('required')->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            ),
            Number::make('Terraza', 'exterior_const')->hideFromIndex()->placeholder('Metros cuadrados de la terraza')->min(0)->max(99999)->rules('required')->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            ),
            Number::make('Terraza Extra', 'extra_exterior_const')->hideFromIndex()->placeholder('Metros cuadrados de la terraza extra')->min(0)->max(99999)->nullable()->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            ),
            Number::make('Estacionamiento', 'parking_area')->hideFromIndex()->placeholder('Metros cuadrados del estacionamiento')->min(0)->max(99999)->nullable()->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            ),
            Number::make('Bodega', 'storage_area')->hideFromIndex()->placeholder('Metros cuadrados del área de bodega')->min(0)->max(99999)->nullable()->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            ),
            Number::make('Jardín', 'garden_area')->hideFromIndex()->placeholder('Metros cuadrados del jardín')->min(0)->max(99999)->nullable()->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            ),
            Number::make('Const. Total', 'total_const')->sortable()->placeholder('Metros cuadrados totales')->min(0)->max(99999)->rules('required')->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            )->dependsOn(
                ['interior_const', 'exterior_const', 'extra_exterior_const', 'parking_area', 'storage_area', 'garden_area'],
                function (Number $field, NovaRequest $request, FormData $formData) {
                    $total_meters = 0;

                    if ($formData->interior_const != null) {
                        $total_meters = $total_meters + $formData->interior_const;
                    }

                    if ($formData->exterior_const != null) {
                        $total_meters = $total_meters + $formData->exterior_const;
                    }

                    if ($formData->extra_exterior_const != null) {
                        $total_meters = $total_meters + $formData->extra_exterior_const;
                    }

                    if ($formData->parking_area != null) {
                        $total_meters = $total_meters + $formData->parking_area;
                    }

                    if ($formData->storage_area != null) {
                        $total_meters = $total_meters + $formData->storage_area;
                    }

                    if ($formData->garden_area != null) {
                        $total_meters = $total_meters + $formData->garden_area;
                    }

                    $field->default(round($total_meters, 2));
                }
            ),
        ];
    }


    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [
            new AssignPaymentPlan,
            new ChangeStatus,
        ];
    }
}