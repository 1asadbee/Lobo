@extends('user.layouts.master')

@section('board-title') ДОСКА ДЕКЛАРАНТА @endsection
@section('declarants') side-menu--active @endsection
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
                <form action="{{route('declarants',$locale)}}" method="get">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Поиск транспорта</h2>
                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                        <div class="mr-3">Declaration</div>
                        <input name="declaration" value="1" data-target="#basic-textual-toast"
                               class="show-code input input--switch border ml-auto mr-5" type="checkbox" @if(old('declaration')==1) checked @endif>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                        <div class="mr-3">Settlement Fee</div>
                        <input name="settlement_fee" value="1" data-target="#basic-textual-toast"
                               class="show-code input input--switch border ml-auto mr-5" type="checkbox" @if(old('settlement_fee')==1) checked @endif>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                        <div class="mr-3">Registration Certificate</div>
                        <input name="registration_certificate" value="1" data-target="#basic-textual-toast"
                               class="show-code input input--switch border ml-auto mr-5" type="checkbox" @if(old('registration_certificate')==1) checked @endif>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                        <div class="mr-3">Obtaining License</div>
                        <input name="obtaining_license" value="1" data-target="#basic-textual-toast"
                               class="show-code input input--switch border ml-auto mr-5" type="checkbox" @if(old('obtaining_license')==1) checked @endif>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                        <div class="mr-3">Obtaining Permits</div>
                        <input name="obtaining_permits" value="1" data-target="#basic-textual-toast"
                               class="show-code input input--switch border ml-auto mr-5" type="checkbox" @if(old('obtaining_permits')==1) checked @endif>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                        <div class="mr-3">Unusual Cargo</div>
                        <input name="unusual_cargo" value="1" data-target="#basic-textual-toast"
                               class="show-code input input--switch border ml-auto mr-5" type="checkbox" @if(old('unusual_cargo')==1) checked @endif>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                        <div class="mr-3">Insurance</div>
                        <input name="insurance" value="1" data-target="#basic-textual-toast"
                               class="show-code input input--switch border ml-auto mr-5" type="checkbox" @if(old('insurance')==1) checked @endif>
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancel
                    </button>
                    <button type="submit" name="search" value="1" class="button w-20 bg-theme-1 text-white">Search</button>
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
                        @case(\App\Models\User::DECLARANT)
                        @include('user.layouts.add-form.add-declarant-post')
                        @break
                    @endswitch
                </div>
            </div>
        @endauth
{{--        <div class="hidden md:block mx-auto text-gray-600">Показано от 1 до 10 из 150 загрузок</div>--}}
        <button onclick="location.reload();" class="button text-white bg-theme-1 shadow-md mr-2 px-10 float-right ml-auto">Обновить
            <span style="display: none" id="new-posts" class="absolute top-0 right-0 -mt-4 -mr-4 px-4 py-1 bg-red-500 rounded-full">0</span>
        </button>
    </div>
@endsection

@section('data-list')
    <!-- BEGIN: Data List -->
    <div  class="intro-y col-span-12 lg:overflow-visible">
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

        @foreach($declarants as $declarant)
        <div class="mt-10 md:mt-2">
            <!-- Computer Post Screen Begin -->
            <div class="{{!$declarant->status ? 'bg-red-200':''}} hidden md:grid grid-cols-10 text-center text-sm md:pr-3 lg:px-0 py-5 xl:py-3 shadow-md font-medium bg-white rounded-lg">
                <div onclick="openCaption({{$declarant->id}})" id="1" class="col-span-9 grid grid-cols-9">
                    <div class="col-span-1">
                        @if($declarant->declaration == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-span-1">
                        @if($declarant->settlement_fee == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-span-1">
                        @if($declarant->registration_certificate == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-span-1">
                        @if($declarant->obtaining_license == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-span-1">
                        @if($declarant->obtaining_permits == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-span-1">
                        @if($declarant->unusual_cargo == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-span-1">
                        @if($declarant->insurance == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div
                        class="col-span-1 flex items-center justify-center @if($declarant->status == 1) text-theme-9 @elseif($declarant->status == 0)text-theme-6 @endif">@if($declarant->status == 1)
                            <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Bosh
                        @elseif($declarant->status == 0)
                            <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Band
                        @endif </div>
                    <div class="col-span-1">{{$declarant->price.' '.$declarant->currency['name_'.$locale]}}</div>
                </div>

                <div class="col-span-1">
                    <div class="dropdown relative"><a href="#" class="button w-24 shadow-md mr-1 mb-2 bg-theme-9 text-white">связьция</a>
                        <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                            <div class="dropdown-box__content box p-2">

                                @if(auth()->check())
                                    @foreach(\App\Models\PhoneNumber::where('user_id',$declarant->user->id)->select('phone_number')->get() as $phone_number)
                                        <a href="tel:{{$phone_number->phone_number}}" class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">{{$phone_number->phone_number}}</a>
                                    @endforeach
                                @else
                                    <a href="{{route('user-register',$locale)}}" class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Register</a>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div id="caption-{{$declarant->id}}" class="col-span-8 px-5 text-left caption-hidden">
                    @if($declarant->description)
                        {{$declarant->description->description}}
                    @else
                       <span class="text-danger">Description not found</span>
                    @endif

                </div>
            </div>
            <!-- Computer Post Screen End -->
            <!-- Mobile Post Screen Begin -->
            <span
                class="absolute md:hidden right-50 top-10 -mt-4 -mr-4 ml-4 px-5 py-1 bg-theme-9 text-white rounded-full">СВОБОДЕН</span>
            <div class="grid grid-cols-12 md:hidden shadow-md bg-white rounded-lg p-5 mt-4 font-medium">
                <div class="col-span-12 sm:col-span-6 grid grid-cols-12">
                    <div class="col-span-9 mb-1 mt-4">
                        ДЕКЛАРАЦИИ
                    </div>
                    <div class="col-span-3 mb-1 mt-4">
                        @if($declarant->declaration == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-span-9 my-1">
                        РАСЧЕТ СБОРА
                    </div>
                    <div class="col-span-3 my-1">
                        @if($declarant->settlement_fee == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-span-9 my-1">
                        СЕРТИФИКАТ
                    </div>
                    <div class="col-span-3 my-1">
                        @if($declarant->registration_certifacte == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-span-9 mt-1 mb-1 sm:mb-0">
                        ЛИЦЕНЗИИ
                    </div>
                    <div class="col-span-3 mt-1 mb-1 sm:mb-0">
                        @if($declarant->obtaining_license == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-6 grid grid-cols-12">
                    <div class="col-span-9 mb-1 mt-1 sm:mt-4">
                        РАЗРЕШИТ. ДОК.
                    </div>
                    <div class="col-span-3 mb-1 mt-1 sm:mt-4">
                        @if($declarant->obtaining_permits == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-span-9 my-1">
                        НЕОБЫЧНЫХ ГРУЗОВ
                    </div>
                    <div class="col-span-3 my-1">
                        @if($declarant->unusual_cargo == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-span-9 my-1">
                        СТРАХОВАНИЯ
                    </div>
                    <div class="col-span-3 my-1">
                        @if($declarant->insurance == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-span-8 mt-4 sm:mt-1 font-bold">
                        ЦЕНА:
                    </div>
                    <div class="col-span-4 mt-4 sm:mt-1 font-bold text-lg text-theme-1 text-center">
                        5000 USD
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-8 mt-4"><h1 style="padding-top: 6px;" class="text-lg">Abdurakhmon
                        GAYBULLAEV</h1></div>
                <a href="#" class="button text-white px-0 mt-4 bg-theme-9 col-span-12 sm:col-span-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block -ml-2" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path
                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    &nbsp СВЯЗАЦИЯ
                </a>
            </div>
            <!-- Mobile Post Screen End -->
        </div>
        @endforeach
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        {{$declarants->links('user.layouts.pagination.index',['query' => $declarants])}}
    </div>
    <!-- END: Pagination -->

    <div id="count" style="display: none">{{\App\Models\Declarant::orderBy('created_at','desc')->count()}}</div>
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
        var intervalId = window.setInterval(function(){
            $('#new-count').load('{{route('count-declarants',$locale)}}');
            var count = document.getElementById('count').innerHTML;
            var new_count = document.getElementById('new-count').innerHTML;
            if (count < new_count){
                if (document.getElementById('new-posts').innerHTML != new_count - count){
                    document.getElementById('new-posts').innerHTML = new_count - count;
                    document.getElementById('new-posts').style.display = 'block';
                }
            }
        }, 1000)
    </script>
@endsection
