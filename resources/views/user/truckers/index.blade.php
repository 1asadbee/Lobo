@extends('user.layouts.master')

@section('board-title')
    ДОСКА ДАЛЬНОБОЙЩИКА
@endsection
@section('truckers')
    side-menu--active
@endsection
@section('filter-bar')

    <!-- Button trigger modal -->
    <div class="dropdown relative hidden">
        <a href="javascript:;" id="alert-button" data-toggle="modal" data-target="#header-footer-modal-preview-3">
            <button class="dropdown-toggle button px-2 box text-gray-700">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                                                                                   data-feather="plus"></i> </span>
            </button>
        </a>
        <!-- Modal -->
        <div class="modal" id="header-footer-modal-preview-3">
            <div class="modal__content relative"><a data-dismiss="modal" href="javascript:;"
                                                    class="absolute right-0 top-0 mt-3 mr-3"> <i data-feather="x"
                                                                                                 class="w-8 h-8 text-gray-500"></i>
                </a>
                <div class="p-5 text-center"><i data-feather="check-circle"
                                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Siz muvofaqatli otdingiz</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button>
                </div>
            </div>
        </div>
    </div>


    <div class="intro-y col-span-12 hidden sm:flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <div class="text-center">
            <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview"
               class="button inline-block bg-theme-1 text-white shadow-md mr-2 px-5">Поиск транспорта</a>
        </div>
        <div class="modal" id="header-footer-modal-preview">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Поиск транспорта</h2>
                </div>
                <form action="{{route('truckers',$locale)}}">
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-6">
                            <label>От куда</label>
                            <div class="mt-2">
                                <style type="text/css">
                                    .select2-container {
                                        width: 100% !important;
                                    }
                                </style>
                                <select name="from_id" class="select2 block w-full border mt-2 w-full">
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
                        <div class="col-span-12 sm:col-span-6">
                            <label>Направления</label>
                            <div class="mt-2">
                                <select name="to_id" class="select2 block w-full border mt-2">
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
                            <label>Vehicle Model <span style="color: red">*</span></label>
                            <select required name="vehicle_model_id" class="input w-full border mt-2 flex-1">
                                <option disabled selected>Vehicle Model</option>
                                @foreach(\App\Models\VehicleModel::select('id','name_'.$locale)->orderBy('name_'.$locale, 'asc')->get() as $vehicle_model)
                                    <option value="{{$vehicle_model->id}}">{{$vehicle_model['name_'.$locale]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <div class="mb-2">Delivery Type</div>
                            <select onchange="activateRegisterBtn('your_car',2)" id="delivery_type"
                                    name="delivery_type_id"
                                    class="input w-full border @error('delivery_type') border-theme-6 @enderror flex-1 your_car">
                                <option disabled selected>Delivery Type</option>
                                @foreach(\App\Models\DeliveryType::select('id','name_'.$locale)->orderBy('name_'.$locale, 'asc')->get() as $delivery_type)
                                    <option
                                        value="{{$delivery_type->id}}"
                                        @if($delivery_type->id == old('delivery_type')) selected @endif>{{$delivery_type['name_'.$locale]}}</option>
                                @endforeach
                            </select>
                            @error('delivery_type')
                            {{--                        <div class="text-theme-6 mt-2">{{ $message }}</div>--}}
                            @enderror
                        </div>
                        <div id="vehicle_div" class="intro-y col-span-12 sm:col-span-6">
                            <div class="mb-2">Vehicle</div>
                            <select name="vehicle_id" class="input w-full border flex-1 your_car">
                                <option disabled selected>Vehicle</option>
                            </select>
                        </div>
                        <div id="vehicle_type_div" class="intro-y col-span-12 sm:col-span-6">
                            <div class="mb-2">Vehicle Types</div>
                            <select name="vehicle_type_id" class="input w-full border flex-1 your_car">
                                <option disabled selected>Vehicle Types</option>
                            </select>
                        </div>
                        <div class="col-span-6">
                            <label>Free Weight</label>
                            <input type="number" name="free_weight" class="input w-full border mt-2 flex-1"
                                   placeholder="kg">
                        </div>
                        <div class="col-span-6">
                            <label>Height</label>
                            <input type="number" name="height" placeholder="meter"
                                   class="input w-full border mt-2 flex-1">
                        </div>
                        <div class="col-span-6">
                            <label>Width</label>
                            <input type="number" name="width" placeholder="meter"
                                   class="input w-full border mt-2 flex-1">
                        </div>
                        <div class="col-span-6">
                            <label>Length</label>
                            <input type="number" name="length" placeholder="meter"
                                   class="input w-full border mt-2 flex-1">
                        </div>
                        <div class="col-span-12">
                            <label>Departure</label>
                            <div class="relative mx-auto mt-2">
                                <div
                                    class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                    <i data-feather="calendar" class="w-4 h-4"></i>
                                </div>
                                <input type="text" name="departure" class="datepicker input w-full pl-12 border">
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label>Sena From</label>
                            <input type="number" name="price_from" class="input w-full border mt-2 flex-1"
                                   placeholder="0000">
                        </div>
                        {{--                    <div class="col-span-6">--}}
                        {{--                        <label>Currency</label>--}}
                        {{--                        <select required name="currency_from_id" class="input w-full border mt-2 flex-1">--}}
                        {{--                            <option disabled selected>Currency</option>--}}
                        {{--                            @foreach(\App\Models\Currency::select('id','name_'.$locale)->get() as $currency)--}}
                        {{--                                <option value="{{$currency->id}}">{{$currency['name_'.$locale]}}</option>--}}
                        {{--                            @endforeach--}}
                        {{--                        </select>--}}
                        {{--                    </div>--}}

                        <div class="col-span-6">
                            <label>Sena To</label>
                            <input type="number" name="price_to" class="input w-full border mt-2 flex-1"
                                   placeholder="0000">
                        </div>
                        {{--                    <div class="col-span-6">--}}
                        {{--                        <label>Currency</label>--}}
                        {{--                        <select required name="currency_to_id" class="input w-full border mt-2 flex-1">--}}
                        {{--                            <option disabled selected>Currency</option>--}}
                        {{--                            @foreach(\App\Models\Currency::select('id','name_'.$locale)->get() as $currency)--}}
                        {{--                                <option value="{{$currency->id}}">{{$currency['name_'.$locale]}}</option>--}}
                        {{--                            @endforeach--}}
                        {{--                        </select>--}}
                        {{--                    </div>--}}
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancel
                        </button>
                        <button type="submit" name="search" value="1
" class="button w-20 bg-theme-1 text-white">Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @auth()
            <div class="dropdown relative">
                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview-2">
                    <button class="dropdown-toggle button px-2 box text-gray-700">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                                                                                   data-feather="plus"></i> </span>
                    </button>
                </a>
                <div class="modal" id="header-footer-modal-preview-2">
                    @switch(auth()->user()->roles[0]['id'])
                        @case(\App\Models\User::CARRIER)
                            @include('user.layouts.add-form.add-trucker-post')
                            @break
                    @endswitch
                </div>
            </div>
        @endauth
        {{--        <div class="hidden md:block mx-auto text-gray-600">Показано от 1 до 10 из 150 загрузок</div>--}}
        <button onclick="location.reload();"
                class="button text-white bg-theme-1 shadow-md mr-2 px-10 float-right ml-auto">Обновить
            <span style="display: none" id="new-posts"
                  class="absolute top-0 right-0 -mt-4 -mr-4 px-4 py-1 bg-red-500 rounded-full">0</span>
        </button>
    </div>
@endsection
@section('data-list')
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 lg:overflow-visible">
        <div class="hidden md:grid grid-cols-9 text-center py-5 text-tiny lg:text-xs xl:text-sm font-medium">
            <div class="col-span-1">ОТ КУДА</div>
            <div class="col-span-1">НАПРАВЛЕНИЯ</div>
            <div class="col-span-1">ВИД ТРАНСПОРТА</div>
            <div class="col-span-1">ОБЪЕМ</div>
            <div class="col-span-1">SIZE</div>
            <div class="col-span-1">DEPARTURE</div>
            <div class="col-span-1">ПОЛОЖEНИЯ</div>
            <div class="col-span-1">ЦЕНА</div>
            <div class="col-span-1">ЛОГИСТ</div>
        </div>
        @php $i = 0; @endphp
        @foreach($carrier_posts as $carrier_post)
            {{--@dd($carrier_post)--}}
            <div @if($i == 0) @php $i = $i + 1; @endphp @else class=" md:mt-2" @endif>
                <!-- Computer Post Screen Begin -->
                <div
                    class="{{!$carrier_post->status ? 'bg-red-200':''}} hidden md:grid grid-cols-9 text-center text-sm md:pr-3 lg:px-0 py-5 xl:py-3 shadow-md font-medium bg-white rounded-lg">
                    <div onclick="openCaption({{$carrier_post->id}})" id="1" class="col-span-8 grid grid-cols-8">
                        <div class="col-span-1">{{$carrier_post->from['name_'.$locale]}}</div>
                        <div class="col-span-1">{{$carrier_post->to['name_'.$locale]}}</div>
                        <div
                            class="col-span-1">{{$carrier_post->delivery_type($carrier_post->user->id)['name_'.$locale]}}
                            /{{$carrier_post->vehicle_type($carrier_post->user->id)['name_'.$locale]}}</div>
                        <div class="col-span-1">{{$carrier_post->free_weight}} t</div>
                        <div
                            class="col-span-1 font-bold">{{$carrier_post->trailer_size($carrier_post->user->id)->length.'m x '.$carrier_post->trailer_size($carrier_post->user->id)->width.'m x '.$carrier_post->trailer_size($carrier_post->user->id)->height.'m'}}</div>
                        <div
                            class="col-span-1 font-bold">{{date('d.m.Y', strtotime($carrier_post->departure_time))}}</div>
                        <div
                            class="col-span-1 flex items-center justify-center @if($carrier_post->status == 1) text-theme-9 @elseif($carrier_post->status == 0)text-theme-6 @endif">@if($carrier_post->status == 1)
                                <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Bosh
                            @elseif($carrier_post->status == 0)
                                <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Band
                            @endif </div>
                        <div
                            class="col-span-1">{{$carrier_post->price.' '.$carrier_post->currency['name_'.$locale]}}</div>
                    </div>
                    <div class="col-span-1">
                        <div class="dropdown relative"><a href="#"
                                                          class="button w-24 shadow-md mr-1 mb-2 bg-theme-9 text-white">связьция</a>
                            <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box p-2">
                                    @if(auth()->check())
                                        @foreach(\App\Models\PhoneNumber::where('user_id',$carrier_post->user->id)->select('phone_number')->get() as $phone_number)
                                            <a href="tel:{{$phone_number->phone_number}}"
                                               class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">{{$phone_number->phone_number}}</a>
                                        @endforeach
                                    @else
                                        <a href="{{route('user-register',$locale)}}"
                                           class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Register</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="caption-{{$carrier_post->id}}" class="col-span-8 px-5 text-left caption-hidden">
                        @if($carrier_post->description($carrier_post->id))
                            {{$carrier_post->description($carrier_post->id)->description}}
                        @else
                            <span class="text-danger">Description not found</span>
                        @endif

                    </div>
                </div>
                <!-- Computer Post Screen End -->


                <!-- Mobile Post Screen Begin -->
                <span
                    class="absolute md:hidden right-50 top-10 -mt-4 -mr-4 ml-4 px-5 py-1 bg-theme-9 text-white rounded-full">СВОБОДЕН</span>

                <div onclick="openCaption(2)" id="1"
                     class="grid grid-cols-12 md:hidden shadow-md bg-white rounded-lg p-5 mt-4 font-medium">
                    <div class="col-span-4 mt-4"><span class="text-xl mt-6 font-bold text-theme-1">5000 USD</span>
                    </div>

                    <div class="col-span-4">
                        <img class="h-10 mx-auto mb-5 truck-image"
                             src="https://cdn.picpng.com/truck/truck-picture-29681.png">
                    </div>
                    <div class="col-span-4 call-mobile-button">
                        <div class="w-fit ml-auto mb-10">
                            <a href="#" class="button text-white ml-auto px-8 lg:px-4 xl:px-8 bg-theme-9 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block -ml-2"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                </svg>
                                &nbsp СВЯЗАЦИЯ</a>
                        </div>
                    </div>
                    <div class="col-span-4">
                        <span class="text-gray-600">ТАШ - АНК</span>
                        <br>
                        <span class="text-lg font-medium">ЗАВТРА</span>
                    </div>
                    <div class="col-span-4">
                        <div class="w-fit mx-auto">
                            <span class="text-gray-600 whole-text">ВИД ТРАНСПОРТА</span>
                            <span class="text-gray-600 subtract-text">ВИД ТР.</span>
                            <br class="whole-text">
                            <span>АВТО/ХОЛОД</span>
                        </div>
                    </div>
                    <div class="col-span-4">
                        <div class="w-fit mx-auto">
                            <span class="text-gray-600">22000 кг</span>
                            <br>
                            <span>Железо</span>
                        </div>
                    </div>
                    <div id="caption-2" class="col-span-12 text-left caption-hidden">Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>

                </div>
                <!-- Mobile Post Screen End -->
            </div>

        @endforeach

    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        {{$carrier_posts->links('user.layouts.pagination.index',['query' => $carrier_posts])}}


    </div>
    <!-- END: Pagination -->
    <div id="count" style="display: none">{{\App\Models\CarrierPost::orderBy('created_at','desc')->count()}}</div>
    <div id="new-count" style="display: none"></div>

@endsection

@section('js')
    <script>
        @php
            if (session()->has('success')){
                  echo "document.getElementById('alert-button').click();";
            }elseif (session()->has('fail')){
                  echo "document.gcarrierCarInputsetElementById('alert-button').click();";
            }
        @endphp

        $(document).ready(function () {
            $('#delivery_type').change(function () {
                $('#vehicle_div').load('{{route('input-function',$locale)}}?delivery_type=' + document.getElementById('delivery_type').value)
            });
        })

        var intervalId = window.setInterval(function () {
            $('#new-count').load('{{route('count-carriers-post',$locale)}}');
            var count = document.getElementById('count').innerHTML;
            var new_count = document.getElementById('new-count').innerHTML;
            if (count < new_count) {
                if (document.getElementById('new-posts').innerHTML != new_count - count) {
                    document.getElementById('new-posts').innerHTML = new_count - count;
                    document.getElementById('new-posts').style.display = 'block';
                }
            }
        }, 1000)

    </script>
@endsection
