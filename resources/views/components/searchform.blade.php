<div class="row justify-content-center mb-5">

    <div class="col-12 col-lg-8 col-xxl-7">
        <form action="{{route('search')}}" method="get">
            @csrf
            <div class="rounded-2" id="search_input_group">
                
                <div class="form-floating mb-3 mb-lg-0">
                    <select class="form-select" id="property_type" name="property_type" aria-label="{{__('Tipo')}}">
                      <option value="">{{__('Cualquier tipo')}}</option>
                      <option @if(old('property_type')=='Condominio') selected @endif value="Condominio">{{__('Condominios')}}</option>
                      <option @if(old('property_type')=='Villa') selected @endif value="Villa">{{__('Villas')}}</option>
                    </select>
                    <label for="property_type">{{__('Tipo')}}</label>
                </div>

                <div class="form-floating mb-3 mb-lg-0">
                    <select class="form-select" id="bedrooms" name="bedrooms" aria-label="{{__('Recámaras')}}">
                      <option value="">{{__('Cualquier cantidad')}}</option>
                      <option @if(old('bedrooms')==1) selected @endif value="1">1</option>
                      <option @if(old('bedrooms')==2) selected @endif value="2">2</option>
                      <option @if(old('bedrooms')==3) selected @endif value="3">3</option>
                      <option @if(old('bedrooms')==4) selected @endif value="4">4</option>
                    </select>
                    <label for="bedrooms">{{__('Recámaras')}}</label>
                </div>

                <div class="form-floating mb-3 mb-lg-0">
                    <select class="form-select" id="min_price" name="min_price" aria-label="{{__('Precio min.')}}">
                      <option value="">{{__('Sin mínimo')}}</option>
                      <option @if(old('min_price')==7500000) selected @endif value="7500000">$7.5m</option>
                      <option @if(old('min_price')==8000000) selected @endif value="8000000">$8m</option>
                      <option @if(old('min_price')==9000000) selected @endif value="9000000">$9m</option>
                      <option @if(old('min_price')==10000000) selected @endif value="10000000">$10m</option>
                      <option @if(old('min_price')==11000000) selected @endif value="11000000">$11m</option>
                      <option @if(old('min_price')==12000000) selected @endif value="12000000">$12m</option>
                      <option @if(old('min_price')==13000000) selected @endif value="13000000">$13m</option>
                      <option @if(old('min_price')==14000000) selected @endif value="14000000">$14m</option>
                      <option @if(old('min_price')==15000000) selected @endif value="15000000">$15m</option>
                      <option @if(old('min_price')==16000000) selected @endif value="16000000">$16m</option>
                      <option @if(old('min_price')==17000000) selected @endif value="17000000">$17m</option>
                      <option @if(old('min_price')==18000000) selected @endif value="18000000">$18m</option>
                      <option @if(old('min_price')==19000000) selected @endif value="19000000">$19m</option>
                    </select>
                    <label for="min_price">{{__('Precio min.')}}</label>
                </div>

                <div class="form-floating mb-3 mb-lg-0">
                    <select class="form-select" id="max_price" name="max_price" aria-label="{{__('Precio max.')}}">
                      <option value="">{{__('Sin máximo')}}</option>
                      <option @if(old('max_price')==8000000) selected @endif value="8000000">$8m</option>
                      <option @if(old('max_price')==9000000) selected @endif value="9000000">$9m</option>
                      <option @if(old('max_price')==10000000) selected @endif value="10000000">$10m</option>
                      <option @if(old('max_price')==11000000) selected @endif value="11000000">$11m</option>
                      <option @if(old('max_price')==12000000) selected @endif value="12000000">$12m</option>
                      <option @if(old('max_price')==13000000) selected @endif value="13000000">$13m</option>
                      <option @if(old('max_price')==14000000) selected @endif value="14000000">$14m</option>
                      <option @if(old('max_price')==15000000) selected @endif value="15000000">$15m</option>
                      <option @if(old('max_price')==16000000) selected @endif value="16000000">$16m</option>
                      <option @if(old('max_price')==17000000) selected @endif value="17000000">$17m</option>
                      <option @if(old('max_price')==18000000) selected @endif value="18000000">$18m</option>
                      <option @if(old('max_price')==19000000) selected @endif value="19000000">$19m</option>
                      <option @if(old('max_price')==20000000) selected @endif value="20000000">$20m</option>
                    </select>
                    <label for="max_price">{{__('Precio max.')}}</label>
                </div>

                <button type="submit" class="btn btn-green rounded-end-2 col-12 col-lg-1" aria-label="{{__('Buscar')}}">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
    </div>

</div>