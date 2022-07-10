@php
 $locale = \Illuminate\Support\Facades\App::getLocale();
@endphp
<!DOCTYPE html>

<html lang="en">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{asset('front/dist/s/logo.svg')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Dashboard - Midone - Tailwind HTML Admin Template</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('front/dist/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/dist/css/app.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
@yield('css')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="app" onload="startTime()">

<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="{{route('home',$locale)}}" class="flex mr-auto text-white font-bold text-xl">
            LOBO
        </a>
        <div class="dropdown relative mr-2">
            <button class="dropdown-toggle button box text-gray-700 flex items-center"> English <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </button>
            <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                <div class="dropdown-box__content box p-2">
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">English</span> </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">Indonesian</span> </a>
                </div>
            </div>
        </div>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                                                            class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="{{route('home',$locale)}}" class="menu">
                <div class="menu__icon"><i data-feather="home"></i></div>
                <div class="menu__title"> Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{route('customers',$locale)}}" class="menu ">
                <div class="menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <div class="menu__title"> Customer</div>
            </a>
        </li>
        <li>
            <a href="{{route('truckers',$locale)}}" class="menu menu--active">
                <div class="menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                    </svg>
                </div>
                <div class="menu__title"> Trucker</div>
            </a>
        </li>
        <li>
            <a href="{{route('declarants',$locale)}}" class="menu">
                <div class="menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"/>
                    </svg>
                </div>
                <div class="menu__title"> Declarant</div>
            </a>
        </li>
    </ul>
</div>
<!-- END: Mobile Menu -->
<div class="flex">
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <a href="{{route('home',$locale)}}" class="intro-x flex items-center pl-1 pt-4 text-white font-bold text-xl">
            LOBO
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="{{route('home',$locale)}}" class="side-menu @yield('home')">
                    <div class="side-menu__icon"><i data-feather="home"></i></div>
                    <div class="side-menu__title"> Dashboard</div>
                </a>
            </li>
            <li>
                <a href="{{route('customers',$locale)}}" class="side-menu @yield('customers')">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="side-menu__title"> Customer</div>
                </a>
            </li>

            <li>

                <a href="{{route('truckers',$locale)}}" class="side-menu @yield('truckers')">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                    </div>
                    <div class="side-menu__title"> Trucker</div>
                </a>
            </li>
            <li>
                <a href="{{route('declarants',$locale)}}" class="side-menu @yield('declarants')">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"/>
                        </svg>
                    </div>
                    <div class="side-menu__title"> Declarant</div>
                </a>
            </li>
        </ul>
    </nav>
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar hidden sm:flex">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
                <div id="txt" class="intro-y text-lg font-medium ml-5"></div>
            </div>
            <!-- END: Breadcrumb -->
            <div class="dropdown relative mr-2">
                <button class="dropdown-toggle button box text-gray-700 flex items-center"> English <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="flag" class="w-4 h-4 mr-2"></i> <span class="truncate">English</span> </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="flag" class="w-4 h-4 mr-2"></i> <span class="truncate">Indonesian</span> </a>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown relative mr-auto sm:mr-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer"><i data-feather="bell"
                                                                                                 class="notification__icon"></i>
                </div>
                <div class="notification-content dropdown-box mt-8 absolute top-0 left-0 sm:left-auto sm:right-0 z-20 -ml-10 sm:ml-0">
                    <div class="notification-content__box dropdown-box__content box">
                        <div class="notification-content__title">Notifications</div>
                        <div class="cursor-pointer relative flex items-center ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                     src="{{asset('front/dist/images/profile-13.jpg')}}">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Angelina Jolie</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">05:09 AM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">Contrary to popular belief, Lorem Ipsum is
                                    not simply random text. It has roots in a piece of classical Latin literature from
                                    45 BC, making it over 20
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                     src="{{asset('front/dist/images/profile-2.jpg')}}">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">05:09 AM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">It is a long established fact that a reader
                                    will be distracted by the readable content of a page when looking at its layout. The
                                    point of using Lorem
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                     src="{{asset('front/dist/images/profile-14.jpg')}}">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">Contrary to popular belief, Lorem Ipsum is
                                    not simply random text. It has roots in a piece of classical Latin literature from
                                    45 BC, making it over 20
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                     src="{{asset('front/dist/images/profile-6.jpg')}}">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">05:09 AM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">There are many variations of passages of
                                    Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                    injected humour, or randomi
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                     src="{{asset('front/dist/images/profile-5.jpg')}}">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Edward Norton</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard
                                    dummy text ever since the 1500
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8 relative">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mb-1 text-theme-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                    <div class="dropdown-box__content box bg-theme-38 text-white">
                        @auth
                        <div class="p-4 border-b border-theme-40">
                            <div class="font-medium">{{str_replace('_',' ',auth()->user()->name)}}</div>
                            <div class="text-xs text-theme-41">@foreach(auth()->user()->roles as $key => $roles){{ __($roles->title) }}@endforeach</div>
                        </div>
                        <div class="p-2">
                            <a href="{{route('profile',$locale)}}"
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                            <a href="{{route('truckers-active',$locale)}}"
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                <i data-feather="eye" class="w-4 h-4 mr-2"></i> Active Posts </a>
                            <a href=""
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                <i data-feather="eye-off" class="w-4 h-4 mr-2"></i> Non-Active Posts </a>
                            <a href="{{route('user-logout',$locale)}}"
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </div>
                        @endauth
                        @guest
                                <div class="p-2">
                                    <a href="{{route('user-login',$locale)}}"
                                       class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                        <i data-feather="toggle-left" class="w-4 h-4 mr-2"></i> Sign In </a>
                                </div>
                                <div class="p-2">
                                    <a href="{{route('user-register',$locale)}}"
                                       class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                        <i data-feather="edit" class="w-4 h-4 mr-2"></i> Sign up </a>
                                </div>

                        @endguest
                    </div>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
        <!-- END: Top Bar -->
        <style>
            .tab {
                overflow: hidden;
            }

            .tab-content {
                max-height: 0;
                transition: all 0.5s;
            }

            input:checked + .tab-label .test {
                background-color: #000;
            }

            input:checked + .tab-label .test svg {
                transform: rotate(180deg);
                stroke: #fff;
            }

            input:checked + .tab-label::after {
                transform: rotate(90deg);
            }

            input:checked ~ .tab-content {
                max-height: 100vh;
            }
        </style>

        <main class="w-full hidden p-8 mx-auto">
            <section class="shadow row">
                <div class="tabs">
                    <div class="border-b tab">
                        <div class="border-l-2 border-transparent relative">
                            <input class="w-full absolute z-10 cursor-pointer opacity-0 h-5 top-6" type="checkbox"
                                   id="chck1">
                            <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none tab-label"
                                    for="chck1">
                                <span class="text-grey-darkest font-thin text-xl">
                                    Massa vitae tortor condimentum lacinia quis vel eros donec
                                </span>
                                <div class="rounded-full border border-grey w-7 h-7 flex items-center justify-center test">
                                    <!-- icon by feathericons.com -->
                                    <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24"
                                         stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" viewbox="0 0 24 24" width="24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <polyline points="6 9 12 15 18 9">
                                        </polyline>
                                    </svg>
                                </div>
                            </header>
                            <div class="tab-content">
                                <div class="pl-8 pr-8 pb-5 text-grey-darkest">
                                    <ul class="pl-4">
                                        <li class="pb-2">
                                            consectetur adipiscing elit
                                        </li>
                                        <li class="pb-2">
                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                        </li>
                                        <li class="pb-2">
                                            Viverra orci sagittis eu volutpat odio facilisis mauris
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-b tab">
                        <div class="border-l-2 border-transparent relative">
                            <input class="w-full absolute z-10 cursor-pointer opacity-0 h-5 top-6" type="checkbox"
                                   id="chck2">
                            <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none tab-label"
                                    for="chck2">
                                <span class="text-grey-darkest font-thin text-xl">
                                    Massa vitae tortor condimentum lacinia quis vel eros donec
                                </span>
                                <div class="rounded-full border border-grey w-7 h-7 flex items-center justify-center test">
                                    <!-- icon by feathericons.com -->
                                    <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24"
                                         stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" viewbox="0 0 24 24" width="24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <polyline points="6 9 12 15 18 9">
                                        </polyline>
                                    </svg>
                                </div>
                            </header>
                            <div class="tab-content">
                                <div class="pl-8 pr-8 pb-5 text-grey-darkest">
                                    <ul class="pl-4">
                                        <li class="pb-2">
                                            consectetur adipiscing elit
                                        </li>
                                        <li class="pb-2">
                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                        </li>
                                        <li class="pb-2">
                                            Viverra orci sagittis eu volutpat odio facilisis mauris
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-b tab">
                        <div class="border-l-2 border-transparent relative">
                            <input class="w-full absolute z-10 cursor-pointer opacity-0 h-5 top-6" type="checkbox"
                                   id="chck3">
                            <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none tab-label"
                                    for="chck3">
                                <span class="text-grey-darkest font-thin text-xl">
                                    Massa vitae tortor condimentum lacinia quis vel eros donec
                                </span>
                                <div class="rounded-full border border-grey w-7 h-7 flex items-center justify-center test">
                                    <!-- icon by feathericons.com -->
                                    <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24"
                                         stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" viewbox="0 0 24 24" width="24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <polyline points="6 9 12 15 18 9">
                                        </polyline>
                                    </svg>
                                </div>
                            </header>
                            <div class="tab-content">
                                <div class="pl-8 pr-8 pb-5 text-grey-darkest">
                                    <ul class="pl-4">
                                        <li class="pb-2">
                                            consectetur adipiscing elit
                                        </li>
                                        <li class="pb-2">
                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                        </li>
                                        <li class="pb-2">
                                            Viverra orci sagittis eu volutpat odio facilisis mauris
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <h2 class="intro-y text-lg font-medium mt-10">
            @yield('board-title')
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">

            @yield('filter-bar')
            @yield('data-list')

        </div>
        @yield('profile')
        <!-- BEGIN: Delete Confirmation Modal -->
        <div class="modal" id="delete-confirmation-modal">
            <div class="modal__content">
                <div class="p-5 text-center">
                    <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be
                        undone.
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel
                    </button>
                    <button type="button" class="button w-24 bg-theme-6 text-white">Delete</button>
                </div>
            </div>
        </div>
        <!-- END: Delete Confirmation Modal -->            </div>
    <!-- END: Content -->

</div>

<!-- BEGIN: JS Assets-->
<section id="bottom-navigation" class="block fixed inset-x-0 bottom-0 z-50 bg-white shadow sm:hidden">
    <div id="tabs" class="flex justify-between">
        <a href="{{route('home',$locale)}}" class="w-full focus:text-theme-1 hover:text-theme-1 justify-center inline-block text-center pt-2 pb-1">
            <svg  width="25" height="25" xmlns="http://www.w3.org/2000/svg" class="inline-block mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="tab tab-home block text-xs">Home</span>
        </a>
        <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="w-full focus:text-theme-1 hover:text-theme-1 justify-center inline-block text-center pt-2 pb-1">
            <svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" class="inline-block mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="tab tab-kategori block text-xs">Search</span>
        </a>
        <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview-2" class="w-full focus:text-theme-1 hover:text-theme-1 justify-center inline-block text-center pt-2 pb-1">
            <svg  width="25" height="25" xmlns="http://www.w3.org/2000/svg" class="inline-block mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="tab tab-explore block text-xs">Add</span>
        </a>
        <a href="javascript:void(0)" onclick="location.reload();" class="w-full focus:text-theme-1 hover:text-theme-1 justify-center inline-block text-center pt-2 pb-1">

            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" class="inline-block mb-1" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            <span class="absolute left-50 top-10 -mt-4 -mr-4 px-2 py-1 bg-red-500 text-white rounded-full">10</span>
            <span class="tab tab-whishlist block text-xs">Refresh</span>
        </a>
        <a href="javascript:;" class="w-full focus:text-theme-1 mobile-profile-button hover:text-theme-1 justify-center inline-block text-center pt-2 pb-1">
            <svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" class="inline-block mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="tab tab-account block text-xs">Profile</span>
        </a>
        <div style="bottom: 59px" class="p-2 absolute right-0 bg-white hidden mobile-profile-dropdown">
            <a href="profile.html"
               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
            <a href="active-post.html"
               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                <i data-feather="zap" class="w-4 h-4 mr-2"></i> Active Posts </a>
            <a href=""
               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                <i data-feather="zap-off" class="w-4 h-4 mr-2"></i> Non-Active Posts </a>
        </div>
    </div>
</section>
<script>
    function startTime() {
        const today = new Date();
        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
        setTimeout(startTime, 1000);
    }

    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }

    function openCaption(id){

        if (document.getElementById('caption-'+id).classList.contains("caption-hidden")) {
            document.getElementById('caption-'+id).classList.remove("caption-hidden");
            document.getElementById('caption-'+id).classList.add("caption-open");
        }else if (document.getElementById('caption-'+id).classList.contains("caption-open")) {
            document.getElementById('caption-'+id).classList.remove("caption-open");
            document.getElementById('caption-'+id).classList.add("caption-hidden");
        }



    }


</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=['your-google-map-api']&libraries=places"></script>
<script src="{{asset('front/dist/js/app.js')}}"></script>
@yield('js')
<!-- END: JS Assets-->
@include('sweetalert::alert')

</body>
</html>
