@extends('user.layouts.master')

<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="{{route('home')}}" class="flex mr-auto text-white font-bold text-xl">
            LOBO
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                                                            class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="{{route('home')}}" class="menu">
                <div class="menu__icon"><i data-feather="home"></i></div>
                <div class="menu__title"> Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{route('customers')}}" class="menu">
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
            <a href="{{route('truckers')}}" class="menu menu--active">
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
            <a href="{{route('declarants')}}" class="menu">
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
        <a href="{{route('home')}}" class="intro-x flex items-center pl-1 pt-4 text-white font-bold text-xl">
            LOBO
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="{{route('home')}}" class="side-menu ">
                    <div class="side-menu__icon"><i data-feather="home"></i></div>
                    <div class="side-menu__title"> Dashboard</div>
                </a>
            </li>
            <li>
                <a href="{{route('customers')}}" class="side-menu ">
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

                <a href="{{route('truckers')}}" class="side-menu">
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
                <a href="{{route('declarants')}}" class="side-menu side-menu--active">
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
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
                <div class="search-result">
                    <div class="search-result__content">
                        <div class="search-result__content__title">Pages</div>
                        <div class="mb-5">
                            <a href="" class="flex items-center">
                                <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full">
                                    <i class="w-4 h-4" data-feather="inbox"></i></div>
                                <div class="ml-3">Mail Settings</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full">
                                    <i class="w-4 h-4" data-feather="users"></i></div>
                                <div class="ml-3">Users & Permissions</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full">
                                    <i class="w-4 h-4" data-feather="credit-card"></i></div>
                                <div class="ml-3">Transactions Report</div>
                            </a>
                        </div>
                        <div class="search-result__content__title">Users</div>
                        <div class="mb-5">
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                         src="dist/images/profile-13.jpg">
                                </div>
                                <div class="ml-3">Angelina Jolie</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                    angelinajolie@left4code.com
                                </div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                         src="dist/images/profile-2.jpg">
                                </div>
                                <div class="ml-3">Johnny Depp</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                    johnnydepp@left4code.com
                                </div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                         src="dist/images/profile-14.jpg">
                                </div>
                                <div class="ml-3">Russell Crowe</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                    russellcrowe@left4code.com
                                </div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                         src="dist/images/profile-6.jpg">
                                </div>
                                <div class="ml-3">Al Pacino</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                    alpacino@left4code.com
                                </div>
                            </a>
                        </div>
                        <div class="search-result__content__title">Products</div>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                     src="dist/images/preview-9.jpg">
                            </div>
                            <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp;
                                Tablet
                            </div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                     src="dist/images/preview-12.jpg">
                            </div>
                            <div class="ml-3">Nike Tanjun</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor
                            </div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                     src="dist/images/preview-10.jpg">
                            </div>
                            <div class="ml-3">Sony Master Series A9G</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                     src="dist/images/preview-7.jpg">
                            </div>
                            <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp;
                                Tablet
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END: Search -->
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
                                     src="dist/images/profile-13.jpg">
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
                                     src="dist/images/profile-2.jpg">
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
                                     src="dist/images/profile-14.jpg">
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
                                     src="dist/images/profile-6.jpg">
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
                                     src="dist/images/profile-5.jpg">
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
                    <img alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-12.jpg">
                </div>
                <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                    <div class="dropdown-box__content box bg-theme-38 text-white">
                        <div class="p-4 border-b border-theme-40">
                            <div class="font-medium">Abdurakhmon Gaybullaev</div>
                            <div class="text-xs text-theme-41">Trucker</div>
                        </div>
                        <div class="p-2">
                            <a href="profile.html"
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                            <a href="active-post.html"
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                <i data-feather="zap" class="w-4 h-4 mr-2"></i> Active Posts </a>
                            <a href="active-post.html"
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                <i data-feather="zap-off" class="w-4 h-4 mr-2"></i> Non-Active Posts </a>
                        </div>
                        <div class="p-2 border-t border-theme-40">
                            <a href=""
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </div>
                    </div>
                </div>
            </div>            <!-- END: Account Menu -->
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
            ДОСКА ДЕКЛАРАНТА
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 hidden sm:flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <div class="text-center">
                    <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview"
                       class="button inline-block bg-theme-1 text-white shadow-md mr-2 px-5">Поиск декларантa</a>
                </div>
                <div class="modal" id="header-footer-modal-preview">
                    <div class="modal__content">
                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                            <h2 class="font-medium text-base mr-auto">Поиск декларантa</h2>
                        </div>
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <div class="intro-y col-span-12 flex items-center">
                                <div class="mr-3">Declaration</div>
                                <input data-target="#basic-textual-toast"
                                       class="show-code input input--switch border ml-auto mr-5" type="checkbox">
                            </div>
                            <div class="intro-y col-span-12 flex items-center">
                                <div class="mr-3">Settlement Fee</div>
                                <input data-target="#basic-textual-toast"
                                       class="show-code input input--switch border ml-auto mr-5" type="checkbox">
                            </div>
                            <div class="intro-y col-span-12 flex items-center">
                                <div class="mr-3">Registration Certificate</div>
                                <input data-target="#basic-textual-toast"
                                       class="show-code input input--switch border ml-auto mr-5" type="checkbox">
                            </div>
                            <div class="intro-y col-span-12 flex items-center">
                                <div class="mr-3">Obtaining License</div>
                                <input data-target="#basic-textual-toast"
                                       class="show-code input input--switch border ml-auto mr-5" type="checkbox">
                            </div>
                            <div class="intro-y col-span-12 flex items-center">
                                <div class="mr-3">Obtaining Permits</div>
                                <input data-target="#basic-textual-toast"
                                       class="show-code input input--switch border ml-auto mr-5" type="checkbox">
                            </div>
                            <div class="intro-y col-span-12 flex items-center">
                                <div class="mr-3">Unusual Cargo</div>
                                <input data-target="#basic-textual-toast"
                                       class="show-code input input--switch border ml-auto mr-5" type="checkbox">
                            </div>
                            <div class="intro-y col-span-12 flex items-center">
                                <div class="mr-3">Insurance</div>
                                <input data-target="#basic-textual-toast"
                                       class="show-code input input--switch border ml-auto mr-5" type="checkbox">
                            </div>
                        </div>
                        <div class="px-5 py-3 text-right border-t border-gray-200">
                            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">
                                Cancel
                            </button>
                            <button type="button" class="button w-20 bg-theme-1 text-white">Search</button>
                        </div>
                    </div>
                </div>
                <div class="dropdown relative">
                    <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview-2">
                        <button class="dropdown-toggle button px-2 box text-gray-700">
                            <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                                                                                       data-feather="plus"></i> </span>
                        </button>
                    </a>
                    <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                        <div class="modal" id="header-footer-modal-preview-2">
                            <div class="modal__content">
                                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                                    <h2 class="font-medium text-base mr-auto">Поиск декларантa</h2>
                                </div>
                                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                    <div class="intro-y col-span-12 flex items-center">
                                        <div class="mr-3">Declaration</div>
                                        <input data-target="#basic-textual-toast"
                                               class="show-code input input--switch border ml-auto mr-5"
                                               type="checkbox">
                                    </div>
                                    <div class="intro-y col-span-12 flex items-center">
                                        <div class="mr-3">Settlement Fee</div>
                                        <input data-target="#basic-textual-toast"
                                               class="show-code input input--switch border ml-auto mr-5"
                                               type="checkbox">
                                    </div>
                                    <div class="intro-y col-span-12 flex items-center">
                                        <div class="mr-3">Registration Certificate</div>
                                        <input data-target="#basic-textual-toast"
                                               class="show-code input input--switch border ml-auto mr-5"
                                               type="checkbox">
                                    </div>
                                    <div class="intro-y col-span-12 flex items-center">
                                        <div class="mr-3">Obtaining License</div>
                                        <input data-target="#basic-textual-toast"
                                               class="show-code input input--switch border ml-auto mr-5"
                                               type="checkbox">
                                    </div>
                                    <div class="intro-y col-span-12 flex items-center">
                                        <div class="mr-3">Obtaining Permits</div>
                                        <input data-target="#basic-textual-toast"
                                               class="show-code input input--switch border ml-auto mr-5"
                                               type="checkbox">
                                    </div>
                                    <div class="intro-y col-span-12 flex items-center">
                                        <div class="mr-3">Unusual Cargo</div>
                                        <input data-target="#basic-textual-toast"
                                               class="show-code input input--switch border ml-auto mr-5"
                                               type="checkbox">
                                    </div>
                                    <div class="intro-y col-span-12 flex items-center">
                                        <div class="mr-3">Insurance</div>
                                        <input data-target="#basic-textual-toast"
                                               class="show-code input input--switch border ml-auto mr-5"
                                               type="checkbox">
                                    </div>
                                    <div class="intro-y col-span-12 flex items-center">
                                        <div class="mr-3">Are you empty?</div>
                                        <input data-target="#basic-textual-toast"
                                               class="show-code input input--switch border ml-auto mr-5"
                                               type="checkbox">
                                    </div>
                                    <div class="intro-y col-span-12">
                                        <label>Opisaniya</label>
                                        <textarea class="input w-full border mt-2 mr-3" name="comment"
                                                  placeholder="Type your comments" minlength="10" required></textarea>
                                    </div>
                                </div>
                                <div class="px-5 py-3 text-right border-t border-gray-200">
                                    <button type="button" data-dismiss="modal"
                                            class="button w-20 border text-gray-700 mr-1">Cancel
                                    </button>
                                    <button type="button" class="button w-20 bg-theme-1 text-white">Search</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="hidden md:block mx-auto text-gray-600">Показано от 1 до 10 из 150 загрузок</div>
                <button class="button text-white bg-theme-1 shadow-md mr-2 px-10 float-right ml-auto">Обновить
                    <span class="absolute top-0 right-0 -mt-4 -mr-4 px-4 py-1 bg-red-500 rounded-full">10</span>
                </button>
            </div>

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 lg:overflow-visible">
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1 text-white bg-theme-6 rounded">Zaynet</div>
                            <div class="col-span-1">5000$</div>
                        </div>
                        <div class="col-span-1 -mt-1">
                            <div class="dropdown relative lg:hidden xl:hidden 2xl:hidden">
                                <button class="dropdown-toggle button ml-5 inline-block text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-more-vertical mx-auto -mt-2">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg>
                                </button>
                                <div class="dropdown-box absolute w-40 top-0 right-0 z-20">
                                    <div class="dropdown-box__content  box">
                                        <div class="px-4 border-b border-gray-200 font-medium">Export Tools</div>
                                        <div class="p-2"><a href=""
                                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="printer" class="w-4 h-4 text-gray-700 mr-2"></i> Print </a>
                                            <a href=""
                                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="external-link" class="w-4 h-4 text-gray-700 mr-2"></i>
                                                Excel </a> <a href=""
                                                              class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="file-text" class="w-4 h-4 text-gray-700 mr-2"></i> CSV
                                            </a> <a href=""
                                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="archive" class="w-4 h-4 text-gray-700 mr-2"></i> PDF
                                            </a></div>
                                    </div>
                                </div>
                            </div>

                            <button class="md:hidden lg:inline-block button px-2 bg-theme-11 text-white"><span
                                    class="w-auto h-full flex items-center justify-center"> <i data-feather="power"
                                                                                               class="w-2 h-2"></i> </span>
                            </button>
                            <button class="md:hidden lg:inline-block button px-2  bg-theme-3 text-white"><span
                                    class="w-auto h-full flex items-center justify-center"> <i data-feather="edit"
                                                                                               class="w-2 h-2"></i> </span>
                            </button>
                            <button class="md:hidden lg:inline-block button px-2 bg-theme-6 text-white"><span
                                    class="w-auto h-full flex items-center justify-center"> <i data-feather="trash"
                                                                                               class="w-2 h-2"></i> </span>
                            </button>
                        </div>
                        <div id="caption-1" class="col-span-8 px-5 text-left caption-hidden">Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 my-1">
                                РАСЧЕТ СБОРА
                            </div>
                            <div class="col-span-3 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 my-1">
                                СЕРТИФИКАТ
                            </div>
                            <div class="col-span-3 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 mt-1 mb-1 sm:mb-0">
                                ЛИЦЕНЗИИ
                            </div>
                            <div class="col-span-3 mt-1 mb-1 sm:mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="col-span-12 sm:col-span-6 grid grid-cols-12">
                            <div class="col-span-9 mb-1 mt-1 sm:mt-4">
                                РАЗРЕШИТ. ДОК.
                            </div>
                            <div class="col-span-3 mb-1 mt-1 sm:mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 my-1">
                                НЕОБЫЧНЫХ ГРУЗОВ
                            </div>
                            <div class="col-span-3 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 my-1">
                                СТРАХОВАНИЯ
                            </div>
                            <div class="col-span-3 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-8 mt-4 sm:mt-1 font-bold">
                                ЦЕНА:
                            </div>
                            <div class="col-span-4 mt-4 sm:mt-1 font-bold text-lg text-theme-1 text-center">
                                5000 USD
                            </div>
                        </div>
                        <div class="col-span-4  mt-2">
                            <button class="action-button button w-full shadow-md mr-1 bg-theme-1 text-white">Primary
                            </button>
                        </div>

                        <div class="col-span-4 mx-1 mt-2">
                            <button class="action-button button w-full shadow-md  mr-1  bg-theme-12 text-white">
                                Warning
                            </button>
                        </div>

                        <div class="col-span-4 mt-2">
                            <button class="action-button button w-full shadow-md mr-1  bg-theme-6 text-white">Danger
                            </button>
                        </div>
                    </div>
                    <!-- Mobile Post Screen End -->
                </div>
                <div class="mt-10 md:mt-2">
                    <!-- Computer Post Screen Begin -->
                    <div class="hidden md:grid grid-cols-10 text-center text-sm md:pr-3 lg:px-0 py-5 xl:py-3 shadow-md font-medium bg-white rounded-lg">
                        <div onclick="openCaption(this.id)" id="1" class="col-span-9 grid grid-cols-9">
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-1 text-white bg-theme-9 rounded">Svobodna</div>
                            <div class="col-span-1">5000$</div>
                        </div>
                        <div class="col-span-1 -mt-1">
                            <div class="dropdown relative lg:hidden xl:hidden 2xl:hidden">
                                <button class="dropdown-toggle button ml-5 inline-block text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-more-vertical mx-auto -mt-2">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg>
                                </button>
                                <div class="dropdown-box absolute w-40 top-0 right-0 z-20">
                                    <div class="dropdown-box__content  box">
                                        <div class="px-4 border-b border-gray-200 font-medium">Export Tools</div>
                                        <div class="p-2"><a href=""
                                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="printer" class="w-4 h-4 text-gray-700 mr-2"></i> Print </a>
                                            <a href=""
                                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="external-link" class="w-4 h-4 text-gray-700 mr-2"></i>
                                                Excel </a> <a href=""
                                                              class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="file-text" class="w-4 h-4 text-gray-700 mr-2"></i> CSV
                                            </a> <a href=""
                                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="archive" class="w-4 h-4 text-gray-700 mr-2"></i> PDF
                                            </a></div>
                                    </div>
                                </div>
                            </div>

                            <button class="md:hidden lg:inline-block button px-2 bg-theme-11 text-white"><span
                                    class="w-auto h-full flex items-center justify-center"> <i data-feather="power"
                                                                                               class="w-2 h-2"></i> </span>
                            </button>
                            <button class="md:hidden lg:inline-block button px-2  bg-theme-3 text-white"><span
                                    class="w-auto h-full flex items-center justify-center"> <i data-feather="edit"
                                                                                               class="w-2 h-2"></i> </span>
                            </button>
                            <button class="md:hidden lg:inline-block button px-2 bg-theme-6 text-white"><span
                                    class="w-auto h-full flex items-center justify-center"> <i data-feather="trash"
                                                                                               class="w-2 h-2"></i> </span>
                            </button>
                        </div>
                        <div id="caption-1" class="col-span-8 px-5 text-left caption-hidden">Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 my-1">
                                РАСЧЕТ СБОРА
                            </div>
                            <div class="col-span-3 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 my-1">
                                СЕРТИФИКАТ
                            </div>
                            <div class="col-span-3 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 mt-1 mb-1 sm:mb-0">
                                ЛИЦЕНЗИИ
                            </div>
                            <div class="col-span-3 mt-1 mb-1 sm:mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="col-span-12 sm:col-span-6 grid grid-cols-12">
                            <div class="col-span-9 mb-1 mt-1 sm:mt-4">
                                РАЗРЕШИТ. ДОК.
                            </div>
                            <div class="col-span-3 mb-1 mt-1 sm:mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 my-1">
                                НЕОБЫЧНЫХ ГРУЗОВ
                            </div>
                            <div class="col-span-3 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 my-1">
                                СТРАХОВАНИЯ
                            </div>
                            <div class="col-span-3 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
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
                        <div class="col-span-12 sm:col-span-8 mt-4"><h1 style="padding-top: 6px;" class="text-lg">
                                Abdurakhmon GAYBULLAEV</h1></div>
                        <a href="#" class="button text-white px-0 mt-4 bg-theme-9 col-span-12 sm:col-span-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block -ml-2"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            &nbsp СВЯЗАЦИЯ
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 my-1">
                                РАСЧЕТ СБОРА
                            </div>
                            <div class="col-span-3 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 my-1">
                                СЕРТИФИКАТ
                            </div>
                            <div class="col-span-3 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 mt-1 mb-1 sm:mb-0">
                                ЛИЦЕНЗИИ
                            </div>
                            <div class="col-span-3 mt-1 mb-1 sm:mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="col-span-12 sm:col-span-6 grid grid-cols-12">
                            <div class="col-span-9 mb-1 mt-1 sm:mt-4">
                                РАЗРЕШИТ. ДОК.
                            </div>
                            <div class="col-span-3 mb-1 mt-1 sm:mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-9 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 my-1">
                                НЕОБЫЧНЫХ ГРУЗОВ
                            </div>
                            <div class="col-span-3 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="col-span-9 my-1">
                                СТРАХОВАНИЯ
                            </div>
                            <div class="col-span-3 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-theme-6 mx-auto" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
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
                        <div class="col-span-12 sm:col-span-8 mt-4"><h1 style="padding-top: 6px;" class="text-lg">
                                Abdurakhmon GAYBULLAEV</h1></div>
                        <a href="#" class="button text-white px-0 mt-4 bg-theme-9 col-span-12 sm:col-span-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block -ml-2"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            &nbsp СВЯЗАЦИЯ
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
        </div>
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
