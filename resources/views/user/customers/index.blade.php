@extends('user.layouts.master')

@section('board-title')
    ДОСКА ЗАКАЗЧИКА
@endsection
@section('customers')
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
               class="button inline-block bg-theme-1 text-white shadow-md mr-2 px-5">Поиск zakaz</a>
        </div>
        <div class="modal" id="header-footer-modal-preview">
            <form action="{{route('customers',$locale)}}" method="get">
                <div class="modal__content">
                    @csrf
                    {{--                    @if($errors->any())--}}
                    {{--                        {{ implode('', $errors->all('<div>:message</div>')) }}--}}
                    {{--                    @endif--}}
                    <div class="modal__content">
                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                            <h2 class="font-medium text-base mt-16 mr-auto">Поиск zakaz</h2>
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
                                        @foreach($countries as $country)
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
                                        @foreach($countries as $country)
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
                                <label>Delivery Type <span style="color: red">*</span></label>
                                <select required name="delivery_type_id" class="input w-full border mt-2 flex-1">
                                    <option disabled selected>Delivery Type</option>
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
                                    <option disabled selected>Vehicle Type</option>
                                    @foreach(\App\Models\VehicleType::select('id','name_'.$locale)->orderBy('name_'.$locale, 'asc')->get() as $vehicle_type)
                                        <option
                                            value="{{$vehicle_type->id}}">{{$vehicle_type['name_'.$locale]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6">
                                <label>Load Type <span style="color: red">*</span></label>
                                <select required name="load_type_id" class="input w-full border mt-2 flex-1">
                                    <option disabled selected>Load Type</option>
                                    @foreach(\App\Models\LoadType::select('id','name_'.$locale)->orderBy('name_'.$locale, 'asc')->get() as $load_type)
                                        <option value="{{$load_type->id}}">{{$load_type['name_'.$locale]}}</option>
                                    @endforeach
                                </select>
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
                                    <input type="text" name="date" required
                                           class="datepicker input w-full pl-12 border">
                                </div>
                            </div>
                            <div class="col-span-6">
                                <label>Sena From <span style="color: red">*</span></label>
                                <input type="number" name="price_from" class="input w-full border mt-2 flex-1"
                                       placeholder="0000" required>
                            </div>

                            <div class="col-span-6">
                                <label>Sena To <span style="color: red">*</span></label>
                                <input type="number" name="price_to" class="input w-full border mt-2 flex-1"
                                       placeholder="0000" required>
                            </div>


                        </div>
                        <div class="px-5 py-3 text-right border-t border-gray-200">
                            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">
                                Cancel
                            </button>
                            <button type="submit" name="search" value="1" class="button w-20 bg-theme-1 text-white">
                                Search
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
        @auth()
            @can('user_interface')
                <div class="dropdown relative">
                    <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview-2">
                        <button class="dropdown-toggle button px-2 box text-gray-700">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                                                                                   data-feather="plus"></i> </span>
                        </button>
                    </a>
                    <div class="modal" id="header-footer-modal-preview-2">
                        @switch(auth()->user()->roles[0]['id'])
                            @case(\App\Models\User::CUSTOMER)
                                @include('user.layouts.add-form.add-customer-post')
                                @break
                        @endswitch
                    </div>
                </div>
            @endcan
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
        <div class="hidden md:grid grid-cols-8 text-center py-5 text-tiny lg:text-xs xl:text-sm font-medium">
            <div class="col-span-1">ОТ КУДА</div>
            <div class="col-span-1">НАПРАВЛЕНИЯ</div>
            <div class="col-span-1">ВИД ТРАНСПОРТА</div>
            <div class="col-span-1">ОБЪЕМ</div>
            <div class="col-span-1">ВИД ГРУЗА</div>
            <div class="col-span-1">ДАТА ОТГРУЗКИ</div>
            <div class="col-span-1">ЦЕНА</div>
            <div class="col-span-1">ЗАКАЗЧИК</div>
        </div>
        @foreach($customers as $customer)

            <div class="mt-2">
                <!-- Computer Post Screen Begin -->
                <div
                    class="{{!$customer->description ? 'bg-red-200':''}} hidden md:grid grid-cols-8 text-center text-sm md:pr-3 lg:px-0 py-5 xl:py-3 shadow-md font-medium bg-white rounded-lg">
                    <div onclick="openCaption({{$customer->id}})" id="1" class="col-span-7 grid grid-cols-7">
                        <div class="col-span-1">{{$customer->from['name_'.$locale]}}</div>
                        <div class="col-span-1">{{$customer->to['name_'.$locale]}}</div>
                        <div class="col-span-1">{{$customer->delivery_type['name_'.$locale]}}</div>
                        <div class="col-span-1">{{$customer->weight}} KG</div>
                        <div class="col-span-1">{{$customer->load_type['name_'.$locale]}}</div>
                        <div class="col-span-1">{{$customer->daten}}</div>
                        <div class="col-span-1">{{$customer->price.' '.$customer->currency['name_'.$locale]}}</div>

                    </div>
                    <div class="col-span-1">
                        <div class="dropdown relative"><a href="#"
                                                          class="button text-white px-1 md:px-2 lg:px-4 xl:px-8 bg-theme-9 w-full">связьция</a>
                            <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box p-2">

                                    @if(auth()->check())
                                        @foreach(\App\Models\PhoneNumber::where('user_id',$customer->user->id)->select('phone_number')->get() as $phone_number)
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
                    <div id="caption-{{$customer->id}}" class="col-span-8 px-5 text-left caption-hidden">
                        @if($customer->description)
                            {{$customer->description->description}}
                        @else
                            <span class="text-danger">Description not found</span>
                        @endif
                    </div>
                </div>
                <!-- Computer Post Screen End -->

                <!-- Mobile Post Screen Begin -->
                <div onclick="openCaption(2)" id="1"
                     class="grid grid-cols-12 md:hidden shadow-md bg-white rounded-lg p-5 font-medium">
                    <div class="col-span-4"><span class="text-xl font-bold text-theme-1">5000 USD</span></div>
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
                        <span>28.02.2022</span>
                    </div>
                    <div class="col-span-4">
                        <div class="w-fit mx-auto">
                            <span class="text-gray-600 whole-text">ВИД ТРАНСПОРТА</span>
                            <span class="text-gray-600 subtract-text">ВИД ТР.</span>
                            <br class="whole-text">
                            <span>АВТО</span>
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
                        consectetur
                        adipisicing elit, sed do eiusmod
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
        {{$customers->links('user.layouts.pagination.index',['query' => $customers])}}

    </div>
    <!-- END: Pagination -->

    <div id="count" style="display: none">{{\App\Models\CustomerPost::orderBy('created_at','desc')->count()}}</div>
    <div id="new-count" style="display: none"></div>

@endsection

@section('js')
    <script>
        @php
            if (session()->has('success')){
                  echo "document.getElementById('alert-button').click();";
            }elseif (session()->has('fail')){
                  echo "document.getElementById('alert-button').click();";
            }
        @endphp

        var intervalId = window.setInterval(function () {
            $('#new-count').load('{{route('count-customers-post',$locale)}}');
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
