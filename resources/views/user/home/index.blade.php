@extends('user.layouts.master')

@section('home') side-menu--active @endsection
@section('filter-bar')
    <div class="intro-y col-span-12 hidden sm:flex flex-wrap sm:flex-no-wrap items-center mt-2">

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

@endsection
