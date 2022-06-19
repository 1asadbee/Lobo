@extends('user.layouts.master')

@section('home') side-menu--active @endsection
@section('filter-bar')
    <div class="intro-y col-span-12 hidden sm:flex flex-wrap sm:flex-no-wrap items-center mt-2">
{{--        <div class="text-center">--}}
{{--            <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button inline-block bg-theme-1 text-white shadow-md mr-2 px-5">Поиск транспорта</a>--}}
{{--        </div>--}}
{{--        <div class="modal" id="header-footer-modal-preview">--}}
{{--            <div class="modal__content">--}}
{{--                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">--}}
{{--                    <h2 class="font-medium text-base mr-auto">Поиск транспорта</h2>--}}
{{--                </div>--}}
{{--                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">--}}
{{--                    <div class="col-span-12 sm:col-span-6">--}}
{{--                        <label>От куда</label>--}}
{{--                        <div class="mt-2">--}}
{{--                            <style type="text/css">--}}
{{--                                .select2-container{--}}
{{--                                    width: 100%!important;--}}
{{--                                }--}}
{{--                            </style>--}}
{{--                            <select class="select2 block w-full border mt-2 w-full">--}}
{{--                                <optgroup label="Uzbekistan">--}}
{{--                                    <option value="1">Tashkent</option>--}}
{{--                                    <option value="2">Samarkand</option>--}}
{{--                                    <option value="3">Bukhara</option>--}}
{{--                                    <option value="4">Navoi</option>--}}
{{--                                    <option value="5">Andijan</option>--}}
{{--                                </optgroup>--}}
{{--                                <optgroup label="Turkey">--}}
{{--                                    <option value="1">Ankara</option>--}}
{{--                                    <option value="2">Istanbul</option>--}}
{{--                                    <option value="3">Izmir</option>--}}
{{--                                    <option value="4">Bursa</option>--}}
{{--                                    <option value="5">Antalya</option>--}}
{{--                                </optgroup>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-span-12 sm:col-span-6">--}}
{{--                        <label>Направления</label>--}}
{{--                        <div class="mt-2">--}}
{{--                            <select class="select2 block w-full border mt-2">--}}
{{--                                <optgroup label="Uzbekistan">--}}
{{--                                    <option value="1">Tashkent</option>--}}
{{--                                    <option value="2">Samarkand</option>--}}
{{--                                    <option value="3">Bukhara</option>--}}
{{--                                    <option value="4">Navoi</option>--}}
{{--                                    <option value="5">Andijan</option>--}}
{{--                                </optgroup>--}}
{{--                                <optgroup label="Turkey">--}}
{{--                                    <option value="1">Ankara</option>--}}
{{--                                    <option value="2">Istanbul</option>--}}
{{--                                    <option value="3">Izmir</option>--}}
{{--                                    <option value="4">Bursa</option>--}}
{{--                                    <option value="5">Antalya</option>--}}
{{--                                </optgroup>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-span-6">--}}
{{--                        <label>Delivery Type</label>--}}
{{--                        <select class="input w-full border mt-2 flex-1">--}}
{{--                            <option>Avto</option>--}}
{{--                            <option>Air</option>--}}
{{--                            <option>Water</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-span-6">--}}
{{--                        <label>Vehicle Type</label>--}}
{{--                        <select class="input w-full border mt-2 flex-1">--}}
{{--                            <option>Tent</option>--}}
{{--                            <option>Air</option>--}}
{{--                            <option>Water</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-span-6">--}}
{{--                        <label>Vehicle Type</label>--}}
{{--                        <select class="input w-full border mt-2 flex-1">--}}
{{--                            <option>Tent</option>--}}
{{--                            <option>Air</option>--}}
{{--                            <option>Water</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-span-6">--}}
{{--                        <label>Obyom</label>--}}
{{--                        <input type="number" class="input w-full border mt-2 flex-1" placeholder="kg">--}}
{{--                    </div>--}}
{{--                    <div class="col-span-6">--}}
{{--                        <label>Good Type</label>--}}
{{--                        <select class="input w-full border mt-2 flex-1">--}}
{{--                            <option>Temir</option>--}}
{{--                            <option>Plasmassa</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-span-6">--}}
{{--                        <label>Date</label>--}}
{{--                        <div class="relative mx-auto mt-2">--}}
{{--                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">--}}
{{--                                <i data-feather="calendar" class="w-4 h-4"></i>--}}
{{--                            </div>--}}
{{--                            <input type="text" class="datepicker input w-full pl-12 border">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-span-6">--}}
{{--                        <label>Sena</label>--}}
{{--                        <input type="number" class="input w-full border mt-2 flex-1" placeholder="0000">--}}
{{--                    </div>--}}
{{--                    <div class="col-span-6">--}}
{{--                        <label>Currency</label>--}}
{{--                        <select class="input w-full border mt-2 flex-1">--}}
{{--                            <option>USD</option>--}}
{{--                            <option>EURO</option>--}}
{{--                            <option>UZS</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="px-5 py-3 text-right border-t border-gray-200">--}}
{{--                    <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancel</button>--}}
{{--                    <button type="button" class="button w-20 bg-theme-1 text-white">Search</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @auth()--}}
{{--            <div class="dropdown relative">--}}
{{--                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview-2">--}}
{{--                    <button class="dropdown-toggle button px-2 box text-gray-700">--}}
{{--                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"--}}
{{--                                                                                   data-feather="plus"></i> </span>--}}
{{--                    </button>--}}
{{--                </a>--}}
{{--                <div class="modal" id="header-footer-modal-preview-2">--}}
{{--                    @switch(auth()->user()->roles[0]['id'])--}}
{{--                        @case(\App\Models\User::CUSTOMER)--}}
{{--                        @include('user.layouts.add-form.add-customer-post')--}}
{{--                        @break--}}

{{--                        @case(\App\Models\User::CARRIER)--}}
{{--                        @include('user.layouts.add-form.add-trucker-post')--}}
{{--                        @break--}}

{{--                        @case(\App\Models\User::DECLARANT)--}}
{{--                        @include('user.layouts.add-form.add-declarant-post')--}}
{{--                        @break--}}
{{--                    @endswitch--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endauth--}}

{{--        <div class="hidden md:block mx-auto text-gray-600">Показано от 1 до 10 из 150 загрузок</div>--}}
        <button class="button text-white bg-theme-1 shadow-md mr-2 px-10 float-right ml-auto">Обновить
            <span class="absolute top-0 right-0 -mt-4 -mr-4 px-4 py-1 bg-red-500 rounded-full">10</span>
        </button>
    </div>
@endsection

@section('data-list')

    <!-- BEGIN: Data List -->
    <div style="overflow-x: auto;" class="intro-y col-span-12 lg:overflow-visible">
        <h2 class="intro-y text-lg font-medium text-center mb-8 md:mb-1">
            ДОСКА ЗАКАЗЧИКА
        </h2>
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
        <div>
            <!-- Computer Post Screen Begin -->
            <div class="hidden md:grid grid-cols-8 text-center text-sm md:pr-3 lg:px-0 py-5 xl:py-3 shadow-md font-medium bg-white rounded-lg">
                <div onclick="openCaption(this.id)" id="1" class="col-span-7 grid grid-cols-7">
                    <div class="col-span-1">Tashkent</div>
                    <div class="col-span-1">Ankara</div>
                    <div class="col-span-1">Auto</div>
                    <div class="col-span-1">22000 kg</div>
                    <div class="col-span-1">Temir</div>
                    <div class="col-span-1">28.02.2022</div>
                    <div class="col-span-1">5000$</div>
                </div>
                <div class="col-span-1">
                    <a href="#" class="button text-white px-1 md:px-2 lg:px-4 xl:px-8 bg-theme-9 w-full">связьция</a>
                </div>
                <div id="caption-1" class="col-span-8 px-5 text-left caption-hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
            <!-- Computer Post Screen End -->

            <!-- Mobile Post Screen Begin -->
            <div onclick="openCaption(2)" id="1" class="grid grid-cols-12 md:hidden shadow-md bg-white rounded-lg p-5 font-medium">
                <div class="col-span-4"><span class="text-xl font-bold text-theme-1">5000 USD</span></div>
                <div class="col-span-4">
                    <img class="h-10 mx-auto mb-5 truck-image" src="https://cdn.picpng.com/truck/truck-picture-29681.png">
                </div>
                <div class="col-span-4 call-mobile-button">
                    <div class="w-fit ml-auto mb-10">
                        <a href="#" class="button text-white ml-auto px-8 lg:px-4 xl:px-8 bg-theme-9 w-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block -ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>&nbsp СВЯЗАЦИЯ</a>
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
                <div id="caption-2" class="col-span-12 text-left caption-hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
            <!-- Mobile Post Screen End -->

        </div>

    </div>
    <!-- END: Data List -->

    <!-- BEGIN: Data List -->
    <div style="overflow-x: auto;" class="intro-y col-span-12 lg:overflow-visible">
        <h2 class="intro-y text-lg font-medium text-center mb-8 md:mb-1">
            ДОСКА ДАЛЬНОБОЙЩИКА
        </h2>
        <div class="hidden md:grid grid-cols-9 text-center py-5 text-tiny lg:text-xs xl:text-sm font-medium">
            <div class="col-span-1">ОТ КУДА</div>
            <div class="col-span-1">НАПРАВЛЕНИЯ</div>
            <div class="col-span-1">ВИД ТРАНСПОРТА</div>
            <div class="col-span-1">ОБЪЕМ</div>
            <div class="col-span-1">ВИД ГРУЗА</div>
            <div class="col-span-1">СВОБОДНОСТЬ</div>
            <div class="col-span-1">ПОЛОЖEНИЯ</div>
            <div class="col-span-1">ЦЕНА</div>
            <div class="col-span-1">ЛОГИСТ</div>
        </div>
        <div>
            <!-- Computer Post Screen Begin -->
            <div class="hidden md:grid grid-cols-9 text-center text-sm md:pr-3 lg:px-0 py-5 xl:py-3 shadow-md font-medium bg-white rounded-lg">
                <div onclick="openCaption(this.id)" id="1" class="col-span-8 grid grid-cols-8">
                    <div class="col-span-1">Tashkent</div>
                    <div class="col-span-1">Ankara</div>
                    <div class="col-span-1">Auto/Tent</div>
                    <div class="col-span-1">22K kg</div>
                    <div class="col-span-1">Temir</div>
                    <div class="col-span-1 font-bold">Zavtra</div>
                    <div class="col-span-1 text-white bg-theme-9 rounded">Svoboden</div>
                    <div class="col-span-1">5000$</div>
                </div>
                <div class="col-span-1">
                    <a href="#" class="button text-white px-0 md:px-1 lg:px-2 xl:px-6 bg-theme-9 w-full">связьция</a>
                </div>
                <div id="caption-1" class="col-span-8 px-5 text-left caption-hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
            <!-- Computer Post Screen End -->


            <!-- Mobile Post Screen Begin -->
            <span class="absolute md:hidden right-50 top-10 -mt-4 -mr-4 ml-4 px-5 py-1 bg-theme-9 text-white rounded-full">СВОБОДЕН</span>

            <div onclick="openCaption(2)" id="1" class="grid grid-cols-12 md:hidden shadow-md bg-white rounded-lg p-5 mt-4 font-medium">
                <div class="col-span-4 mt-4"><span class="text-xl mt-6 font-bold text-theme-1">5000 USD</span>
                </div>

                <div class="col-span-4">
                    <img class="h-10 mx-auto mb-5 truck-image" src="https://cdn.picpng.com/truck/truck-picture-29681.png">
                </div>
                <div class="col-span-4 call-mobile-button">
                    <div class="w-fit ml-auto mb-10">
                        <a href="#" class="button text-white ml-auto px-8 lg:px-4 xl:px-8 bg-theme-9 w-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block -ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>&nbsp СВЯЗАЦИЯ</a>
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
                <div id="caption-2" class="col-span-12 text-left caption-hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
            <!-- Mobile Post Screen End -->
        </div>
        <div class="mt-10 md:mt-2">
            <!-- Computer Post Screen Begin -->
            <div class="hidden md:grid grid-cols-9 text-center text-sm md:pr-3 lg:px-0 py-5 xl:py-3 shadow-md font-medium bg-white rounded-lg">
                <div onclick="openCaption(this.id)" id="1" class="col-span-8 grid grid-cols-8">
                    <div class="col-span-1">Tashkent</div>
                    <div class="col-span-1">Ankara</div>
                    <div class="col-span-1">Auto/Tent</div>
                    <div class="col-span-1">22K kg</div>
                    <div class="col-span-1">Temir</div>
                    <div class="col-span-1 font-bold">Zavtra</div>
                    <div class="col-span-1 text-white bg-theme-6 rounded">Zaynet</div>
                    <div class="col-span-1">5000$</div>
                </div>
                <div class="col-span-1">
                    <a href="#" class="button text-white px-0 md:px-1 lg:px-2 xl:px-6 bg-theme-9 w-full">связьция</a>
                </div>
                <div id="caption-1" class="col-span-8 px-5 text-left caption-hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
            <!-- Computer Post Screen End -->
            <!-- Mobile Post Screen Begin -->
            <span class="absolute md:hidden right-50 top-10 -mt-4 -mr-4 ml-4 px-5 py-1 bg-theme-6 text-white rounded-full">ЗАЙНЕТ</span>

            <div onclick="openCaption(3)" id="1" class="grid grid-cols-12 md:hidden shadow-md bg-white rounded-lg p-5 mt-4 font-medium">
                <div class="col-span-4 mt-4"><span class="text-xl mt-6 font-bold text-theme-1">5000 USD</span>
                </div>

                <div class="col-span-4">
                    <img class="h-10 mx-auto mb-5 truck-image" src="https://cdn.picpng.com/truck/truck-picture-29681.png">
                </div>
                <div class="col-span-4 call-mobile-button">
                    <div class="w-fit ml-auto mb-10">
                        <a href="#" class="button text-white ml-auto px-8 lg:px-4 xl:px-8 bg-theme-9 w-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block -ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>&nbsp СВЯЗАЦИЯ</a>
                    </div>
                </div>
                <div class="col-span-4">
                    <span class="text-gray-600">ТАШ - АНК</span>
                    <br>
                    <span class="text-lg font-medium">СЕГОДНЯ</span>
                </div>
                <div class="col-span-4">
                    <div class="w-fit mx-auto">
                        <span class="text-gray-600 whole-text">ВИД ТРАНСПОРТА</span>
                        <span class="text-gray-600 subtract-text">ВИД ТР.</span>
                        <br class="whole-text">
                        <span>АВТО/ТЕНТ</span>
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="w-fit mx-auto">
                        <span class="text-gray-600">22000 кг</span>
                        <br>
                        <span>Железо</span>
                    </div>
                </div>
                <div id="caption-3" class="col-span-12 text-left caption-hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
            <!-- Mobile Post Screen End -->
        </div>

    </div>
    <!-- END: Data List -->

    <!-- BEGIN: Data List -->
    <div style="overflow-x: auto;" class="intro-y col-span-12 lg:overflow-visible">
        <h2 class="intro-y text-lg font-medium text-center mb-8 md:mb-1">
            ДОСКА ДЕКЛАРАНТА
        </h2>
        <div style="font-size:1vw" class="hidden md:grid grid-cols-10 text-center py-5 font-medium">
            <div class="col-span-1">ДЕКЛАРАЦИИ</div>
            <div class="col-span-1">РАСЧЕТ СБОРА</div>
            <div class="col-span-1">СЕРТИФИКАТ</div>
            <div class="col-span-1">ЛИЦЕНЗИИ</div>
            <div class="col-span-1">РАЗРЕШИТ. ДОК.</div>
            <div class="col-span-1">НЕОБЫЧНЫХ ГРУЗОВ</div>
            <div class="col-span-1">СТРАХОВАНИЯ</div>
            <div class="col-span-1">ЗАНЯТНОСТЬ</div>
            <div class="col-span-1">ЦЕНА</div>
            <div class="col-span-1">ДEКЛАРАНТ</div>
        </div>
        <div>
            <!-- Computer Post Screen Begin -->
            <div class="hidden md:grid grid-cols-10 text-center text-sm md:pr-3 lg:px-0 py-5 xl:py-3 shadow-md font-medium bg-white rounded-lg">
                <div onclick="openCaption(this.id)" id="1" class="col-span-9 grid grid-cols-9">
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1 text-white bg-theme-6 rounded">Zaynet</div>
                    <div class="col-span-1">5000$</div>
                </div>
                <div class="col-span-1">
                    <a href="#" class="button text-white px-0 md:px-1 lg:px-2 xl:px-6 bg-theme-9 w-full">связьция</a>
                </div>
                <div id="caption-1" class="col-span-8 px-5 text-left caption-hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
            <!-- Computer Post Screen End -->


            <!-- Mobile Post Screen Begin -->
            <span class="absolute md:hidden right-50 top-10 -mt-4 -mr-4 ml-4 px-5 py-1 bg-theme-9 text-white rounded-full">СВОБОДЕН</span>

            <div class="grid grid-cols-12 md:hidden shadow-md bg-white rounded-lg p-5 mt-4 font-medium">
                <div class="col-span-12 sm:col-span-6 grid grid-cols-12">
                    <div class="col-span-9 mb-1 mt-4">
                        ДЕКЛАРАЦИИ
                    </div>
                    <div class="col-span-3 mb-1 mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 my-1">
                        РАСЧЕТ СБОРА
                    </div>
                    <div class="col-span-3 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 my-1">
                        СЕРТИФИКАТ
                    </div>
                    <div class="col-span-3 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 mt-1 mb-1 sm:mb-0">
                        ЛИЦЕНЗИИ
                    </div>
                    <div class="col-span-3 mt-1 mb-1 sm:mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-6 grid grid-cols-12">
                    <div class="col-span-9 mb-1 mt-1 sm:mt-4">
                        РАЗРЕШИТ. ДОК.
                    </div>
                    <div class="col-span-3 mb-1 mt-1 sm:mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 my-1">
                        НЕОБЫЧНЫХ ГРУЗОВ
                    </div>
                    <div class="col-span-3 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 my-1">
                        СТРАХОВАНИЯ
                    </div>
                    <div class="col-span-3 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-8 mt-4 sm:mt-1 font-bold">
                        ЦЕНА:
                    </div>
                    <div class="col-span-4 mt-4 sm:mt-1 font-bold text-lg text-theme-1 text-center">
                        5000 USD
                    </div>
                </div>
                <!-- <div class="col-span-12"> -->
                <div class="col-span-12 sm:col-span-8 mt-4"><h1 style="padding-top: 6px;" class="text-lg">Abdurakhmon GAYBULLAEV</h1></div>
                <a href="#" class="button text-white px-0 mt-4 bg-theme-9 col-span-12 sm:col-span-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block -ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                    </svg>&nbsp СВЯЗАЦИЯ
                </a>
                <!-- </div> -->
            </div>
            <!-- Mobile Post Screen End -->
        </div>
        <div class="mt-10 md:mt-2">
            <!-- Computer Post Screen Begin -->
            <div class="hidden md:grid grid-cols-10 text-center text-sm md:pr-3 lg:px-0 py-5 xl:py-3 shadow-md font-medium bg-white rounded-lg">
                <div onclick="openCaption(this.id)" id="1" class="col-span-9 grid grid-cols-9">
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-1 text-white bg-theme-9 rounded">Svobodna</div>
                    <div class="col-span-1">5000$</div>
                </div>
                <div class="col-span-1">
                    <a href="#" class="button text-white px-0 md:px-1 lg:px-2 xl:px-6 bg-theme-9 w-full">связьция</a>
                </div>
                <div id="caption-1" class="col-span-8 px-5 text-left caption-hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
            <!-- Computer Post Screen End -->
            <!-- Mobile Post Screen Begin -->
            <span class="absolute md:hidden right-50 top-10 -mt-4 -mr-4 ml-4 px-5 py-1 bg-theme-6 text-white rounded-full">ЗАЙНЕТ</span>

            <div class="grid grid-cols-12 md:hidden shadow-md bg-white rounded-lg p-5 mt-4 font-medium">
                <div class="col-span-12 sm:col-span-6 grid grid-cols-12">
                    <div class="col-span-9 mb-1 mt-4">
                        ДЕКЛАРАЦИИ
                    </div>
                    <div class="col-span-3 mb-1 mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 my-1">
                        РАСЧЕТ СБОРА
                    </div>
                    <div class="col-span-3 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 my-1">
                        СЕРТИФИКАТ
                    </div>
                    <div class="col-span-3 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 mt-1 mb-1 sm:mb-0">
                        ЛИЦЕНЗИИ
                    </div>
                    <div class="col-span-3 mt-1 mb-1 sm:mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-6 grid grid-cols-12">
                    <div class="col-span-9 mb-1 mt-1 sm:mt-4">
                        РАЗРЕШИТ. ДОК.
                    </div>
                    <div class="col-span-3 mb-1 mt-1 sm:mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 my-1">
                        НЕОБЫЧНЫХ ГРУЗОВ
                    </div>
                    <div class="col-span-3 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 my-1">
                        СТРАХОВАНИЯ
                    </div>
                    <div class="col-span-3 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-8 mt-4 sm:mt-1 font-bold">
                        ЦЕНА:
                    </div>
                    <div class="col-span-4 mt-4 sm:mt-1 font-bold text-lg text-theme-1 text-center">
                        5000 USD
                    </div>
                </div>
                <!-- <div class="col-span-12"> -->
                <div class="col-span-12 sm:col-span-8 mt-4"><h1 style="padding-top: 6px;" class="text-lg">Abdurakhmon GAYBULLAEV</h1></div>
                <a href="#" class="button text-white px-0 mt-4 bg-theme-9 col-span-12 sm:col-span-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block -ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                    </svg>&nbsp СВЯЗАЦИЯ
                </a>
                <!-- </div> -->
            </div>
            <!-- Mobile Post Screen End -->
        </div>
        <div class="mt-10">
            <!-- Mobile Post Screen Begin -->
            <span class="absolute md:hidden right-50 top-10 -mt-4 -mr-4 ml-4 px-5 py-1 bg-theme-9 text-white rounded-full">СВОБОДЕН</span>

            <div class="grid grid-cols-12 md:hidden shadow-md bg-white rounded-lg p-5 mt-4 font-medium">
                <div class="col-span-12 sm:col-span-6 grid grid-cols-12">
                    <div class="col-span-9 mb-1 mt-4">
                        ДЕКЛАРАЦИИ
                    </div>
                    <div class="col-span-3 mb-1 mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 my-1">
                        РАСЧЕТ СБОРА
                    </div>
                    <div class="col-span-3 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 my-1">
                        СЕРТИФИКАТ
                    </div>
                    <div class="col-span-3 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 mt-1 mb-1 sm:mb-0">
                        ЛИЦЕНЗИИ
                    </div>
                    <div class="col-span-3 mt-1 mb-1 sm:mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-6 grid grid-cols-12">
                    <div class="col-span-9 mb-1 mt-1 sm:mt-4">
                        РАЗРЕШИТ. ДОК.
                    </div>
                    <div class="col-span-3 mb-1 mt-1 sm:mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 my-1">
                        НЕОБЫЧНЫХ ГРУЗОВ
                    </div>
                    <div class="col-span-3 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 my-1">
                        СТРАХОВАНИЯ
                    </div>
                    <div class="col-span-3 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="col-span-8 mt-4 sm:mt-1 font-bold">
                        ЦЕНА:
                    </div>
                    <div class="col-span-4 mt-4 sm:mt-1 font-bold text-lg text-theme-1 text-center">
                        5000 USD
                    </div>
                </div>
                <!-- <div class="col-span-12"> -->
                <div class="col-span-12 sm:col-span-8 mt-4"><h1 style="padding-top: 6px;" class="text-lg">Abdurakhmon GAYBULLAEV</h1></div>
                <a href="#" class="button text-white px-0 mt-4 bg-theme-9 col-span-12 sm:col-span-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block -ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                    </svg>&nbsp СВЯЗАЦИЯ
                </a>
                <!-- </div> -->
            </div>
            <!-- Mobile Post Screen End -->
        </div>
    </div>
    <!-- END: Data List -->

    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        <ul class="pagination">
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
            </li>
            <li><a class="pagination__link" href="">...</a></li>
            <li><a class="pagination__link" href="">1</a></li>
            <li><a class="pagination__link pagination__link--active" href="">2</a></li>
            <li><a class="pagination__link" href="">3</a></li>
            <li><a class="pagination__link" href="">...</a></li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
            </li>
        </ul>
        <select class="w-20 input box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
@endsection
