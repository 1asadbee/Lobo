<form action="{{route('addCustomer',$locale)}}" method="post">
    @csrf
                        @if($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mt-16 mr-auto">Добавить объявление</h2>
        </div>
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-6">
                <label>От куда <span style="color: red">*</span></label>
                <div class="mt-2">
                    <style type="text/css">
                        .select2-container {
                            width: 100% !important;
                        }
                    </style>
                    <select required name="from_id" class="select2 block w-full border mt-2 w-full">
                        <option disabled selected>От куда</option>
                        @foreach(\App\Models\Country::select('id','name')->orderBy('name', 'asc')->get() as $country)
                            <optgroup label="{{$country['name']}}">
                                @foreach(\App\Models\State::where('country_id',$country->id)->select('id','name_'.$locale)->orderBy('name_'.$locale, 'asc')->get() as $state)
                                    <option value="{{$state['id']}}">
                                        {{$state['name_'.$locale]}}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <label>Направления <span style="color: red">*</span></label>
                <div class="mt-2">
                    <select required name="to_id" class="select2 block w-full border mt-2 w-full">
                        <option disabled selected>От куда</option>
                        @foreach(\App\Models\Country::select('id','name')->orderBy('name', 'asc')->get() as $country)
                            <optgroup label="{{$country['name']}}">
                                @foreach(\App\Models\State::where('country_id',$country->id)->select('id','name_'.$locale)->orderBy('name_'.$locale, 'asc')->get() as $state)
                                    <option
                                        value="{{$state['id']}}">{{$state['name_'.$locale]}}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-span-6">
                <label>From City </label>
                <input type="text" name="from_city"
                       class="input w-full border mt-2 flex-1" placeholder="From City">
            </div>
            <div class="col-span-6">
                <label>To City</label>
                <input type="text" name="to_city"
                       class="input w-full border mt-2 flex-1" placeholder="To City">
            </div>
            <div class="col-span-6">
                <label>Delivery Type <span style="color: red">*</span></label>
                <select required name="delivery_type_id" class="input w-full border mt-2 flex-1">
                    @foreach(\App\Models\DeliveryType::select('id','name_'.$locale)->orderBy('name_'.$locale, 'asc')->get() as $delivery_type)
                        <option value="{{$delivery_type->id}}">
                            {{$delivery_type['name_'.$locale]}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6">
                <label>Vehicle Type <span style="color: red">*</span></label>
                <select required name="vehicle_type_id" class="input w-full border mt-2 flex-1">
                    @foreach(\App\Models\VehicleType::select('id','name_'.$locale)->orderBy('name_'.$locale, 'asc')->get() as $vehicle_type)
                        <option value="{{$vehicle_type->id}}">{{$vehicle_type['name_'.$locale]}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6">
                <label>Load Type <span style="color: red">*</span></label>
                <select required name="load_type_id" class="input w-full border mt-2 flex-1">
                    @foreach(\App\Models\LoadType::select('id','name_'.$locale)->orderBy('name_'.$locale, 'asc')->get() as $load_type)
                        <option value="{{$load_type->id}}">{{$load_type['name_'.$locale]}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6">
                <label>Load <span style="color: red">*</span></label>
                <input required type="text" name="load"
                       class="input w-full border mt-2 flex-1" placeholder="load">
            </div>
            <div class="col-span-6">
                <label>Weight <span style="color: red">*</span></label>
                <input type="number" name="weight" required
                       class="input w-full border mt-2 flex-1" placeholder="kg">
            </div>
            <div class="col-span-6">
                <label>Height</label>
                <input type="number" name="height"
                       class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-6">
                <label>Width</label>
                <input type="number" name="width"
                       class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-6">
                <label>Length</label>
                <input type="number" name="length"
                       class="input w-full border mt-2 flex-1">
            </div>
            <div class="col-span-6">
                <label>Date <span style="color: red">*</span></label>
                <div class="relative mx-auto mt-2">
                    <div
                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                        <i data-feather="calendar" class="w-4 h-4"></i>
                    </div>
                    <input type="text" name="daten" required class="datepicker input w-full pl-12 border">
                </div>
            </div>
            <div class="col-span-6">
                <label>Sena <span style="color: red">*</span></label>
                <input type="number" name="price" class="input w-full border mt-2 flex-1"
                       placeholder="0000" required>
            </div>
            <div class="col-span-6">
                <label>Currency <span style="color: red">*</span></label>
                <select required name="currency_id" class="input w-full border mt-2 flex-1">
                    @foreach(\App\Models\Currency::select('id','name_'.$locale)->get() as $currency)
                        <option value="{{$currency->id}}">{{$currency['name_'.$locale]}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-12">
                <label>Opisaniya</label>
                <textarea class="input w-full border mt-2" name="description"
                          placeholder="Type your comments"
                          minlength="10"></textarea>
            </div>
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200">
            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">
                Cancel
            </button>
            <button type="submit" class="button w-20 bg-theme-1 text-white">Add</button>
        </div>
    </div>
</form>
