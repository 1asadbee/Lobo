@extends('user.layouts.master')

@section('board-title') Profile Layout @endsection
@section('css')


@endsection

@section('profile')

    <!-- Modal-->

    <div class="modal" id="header-footer-modal-preview">
        <div class="modal__content">

            <form id="contact_us_sweet" action="{{route('admin.test')}}">

                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12">
                        <label>First Name</label>
                        <input type="text" name="name[]" class="input w-full border mt-2 flex-1"
                               value="{{ explode('_',$user->name)[0] }}">
                    </div>
                    <div class="col-span-12">
                        <label>Last Name</label>
                        <input type="text" name="name[]" class="input w-full border mt-2 flex-1"
                               value="{{ explode('_',$user->name)[1] }}">
                    </div>
                    <div class="col-span-12">
                        <label>Email</label>
                        <input type="email" name="email" class="input w-full border mt-2 flex-1"
                               value="{{$user->email}}">
                    </div>
                    @foreach(\App\Models\PhoneNumber::where('user_id',$user->id)->select('phone_number','id')->get() as $key => $phoneNumber)

                        <div class="col-span-12" id="response_add_number">
                            <input type="hidden" name="phone_number_ids[]" value="{{$phoneNumber->id}}">
                            <label>Phone Number</label>

                            <div style="display: flex;">
                                <input type="text" style="display: inline; margin-right: 10px;" name="phone_number[]"
                                       class="input w-full border mt-2 flex-1" value="{{$phoneNumber->phone_number}}">

                                <div id="edit_profile">
                                    <i class="fa fa-close mt-2" style="font-size: 33px; cursor: pointer;"
                                       onclick="del(this.parentElement.parentElement.parentElement)"></i>
                                </div>
                            </div>



                        </div>

                    @endforeach
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button type="button" data-dismiss="modal"
                            class="button w-20 border text-gray-700 mr-1">Cancel
                    </button>
                    <button id="btn_profile" type="submit" class="button w-20 bg-theme-1 text-white">Save</button>
                </div>

            </form>
        </div>
    </div>

    {{--  parol --}}
    <div class="modal" id="header-footer-modal-preview-2">
        <div class="modal__content">
            <form action="" method="post">
                @csrf
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12">
                    <label>Текущий пароль</label>
                    <input type="text" class="input w-full border mt-2 flex-1" placeholder="Текущий пароль">
                </div>
                <div class="col-span-12">
                    <label>Новый Пароль</label>
                    <input type="text" class="input w-full border mt-2 flex-1" placeholder="Новый Пароль">
                </div>
                <div class="col-span-12">
                    <label> Повторите Пароль </label>
                    <input type="text" class="input w-full border mt-2 flex-1" placeholder=" Повторите Пароль ">
                </div>
            </div>
            </form>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <button type="button" data-dismiss="modal"
                        class="button w-20 border text-gray-700 mr-1">Cancel
                </button>
                <button type="button" class="button w-20 bg-theme-1 text-white">Save</button>
            </div>
        </div>
    </div>

    {{-- parol --}}

    {{-- add number--}}
    <div class="modal" id="header-footer-modal-preview-3">
        <div class="modal__content">
            <form  id="btn_add_number">
                @csrf
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12">
                        <label>Номер Телефона</label>
                        <input type="tel" required name="phone_number" class="input w-full border mt-2 flex-1"
                               placeholder="Номер Телефона">
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button type="button" data-dismiss="modal"
                            class="button w-20 border text-gray-700 mr-1">Cancel
                    </button>
                    <button type="button" onclick="add_number()" class="button w-20 bg-theme-1 text-white">Add</button>
                </div>


            </form>
        </div>
    </div>
    {{-- add number --}}
    <div class="modal" id="header-footer-modal-preview-4">
        <div class="modal__content">
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="intro-y col-span-12 sm:col-span-6">
                    <div class="mb-2">Car Model</div>
                    <select class="input w-full border flex-1">
                        <option>Mercedes Benz</option>
                        <option>DAF</option>
                        <option>ISUZU</option>
                        <option>Volvo</option>
                    </select>
                </div>
                <div class="intro-y col-span-12 sm:col-span-6">
                    <div class="mb-2">Delivery Type</div>
                    <select class="input w-full border flex-1">
                        <option>Auto</option>
                        <option>Air</option>
                        <option>Water</option>
                    </select>
                </div>
                <div class="intro-y col-span-12 sm:col-span-6">
                    <div class="mb-2">Vehicle Type</div>
                    <select class="input w-full border flex-1">
                        <option>Tent</option>
                        <option>Ref</option>
                        <option>Container</option>
                    </select>
                </div>
                <div class="intro-y col-span-12 sm:col-span-6">
                    <div class="mb-2">Car Number</div>
                    <input type="text" class="input w-full border flex-1" placeholder="Car Number">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6">
                    <div class="mb-2">Weight</div>
                    <input type="text" class="input w-full border flex-1" placeholder="Weight">
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <button type="button" data-dismiss="modal"
                        class="button w-20 border text-gray-700 mr-1">Cancel
                </button>
                <button type="button" class="button w-20 bg-theme-1 text-white">Add</button>
            </div>
        </div>
    </div>

    <div class="modal" id="header-footer-modal-preview-5">
        <div class="w-modal-24 modal__content">
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Declaration</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Settlement Fee</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Registration Certificate</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Obtaining License</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Obtaining Permits</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Unusual Cargo</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Insurance</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Are you empty?</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <button type="button" data-dismiss="modal"
                        class="button w-20 border text-gray-700 mr-1">Cancel
                </button>
                <button type="button" class="button w-20 bg-theme-1 text-white">Save</button>
            </div>
        </div>
    </div>
    <div class="modal" id="header-footer-modal-preview-6">
        <div class="w-modal-24 modal__content">
            <div class=" col-span-12 sm:col-span-6 flex items-center">
                <div class="mx-auto mt-4 text-lg">Siz Rozimisiz?</div>
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Declaration</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Settlement Fee</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Registration Certificate</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Obtaining License</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Obtaining Permits</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Unusual Cargo</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Insurance</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                    <div class="mr-3">Are you empty?</div>
                    <input data-target="#basic-textual-toast" class="show-code input input--switch border ml-auto mr-5"
                           type="checkbox">
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <button type="button" data-dismiss="modal"
                        class="button w-20 border text-gray-700 mr-1">Cancel
                </button>
                <button type="button" class="button w-20 bg-theme-1 text-white">Save</button>
            </div>
        </div>
    </div>

    <!-- End Modal -->
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="grid grid-cols-12 border-b border-gray-200 pb-5 -mx-5">
            <div class="col-span-12 sm:col-span-6 lg:col-span-4 flex my-auto flex-1 px-5 items-center">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                         src="{{asset('front/dist/images/profile-14.jpg')}}">
                    <div
                        class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-1 rounded-full p-2">
                        <i class="w-4 h-4 text-white" data-feather="camera"></i></div>
                </div>
                <div class="ml-5">
                    <div
                        class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{explode('_',$user->name)[0]}} {{explode('_',$user->name)[1]}}</div>
                    <div class="text-gray-600">Trucker</div>
                </div>
            </div>
            <div
                class="col-span-12 sm:col-span-6 lg:col-span-4 flex mt-6 sm:my-auto flex-1 flex-col text-gray-600 px-5 border-l lg:border-r border-gray-200 border-t sm:border-t-0 pt-5 lg:pt-0 col-span-12">
                <div class="truncate sm:whitespace-normal flex items-center"><i data-feather="mail"
                                                                                class="w-4 h-4 mr-2"></i>{{$user->email}}
                </div>
                @php($i=1)
                @foreach(\App\Models\PhoneNumber::where('user_id', $user->id)->select('phone_number')->get() as $phoneNumber)
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"><i data-feather="phone"
                                                                                         class="w-4 h-4 mr-2">{{$i++}}</i>{{$phoneNumber->phone_number}}
                    </div>
                @endforeach
            </div>
            <div
                class="col-span-12 lg:col-span-4 flex mt-6 lg:my-auto border-t lg:border-none flex-1 flex-col px-5 pt-5 lg:pt-0 grid grid-cols-12">
                <div class="col-span-6 flex items-center">
                    <a class="w-full mr-1" href="javascript:" data-toggle="modal"
                       data-target="#header-footer-modal-preview">
                        <button class="button mr-1 bg-theme-1 text-white w-full">Edit Profile</button>
                    </a>
                </div>
                <div class="col-span-6 flex items-center mt-1">
                    <a class="w-full mr-1" href="javascript:" data-toggle="modal"
                       data-target="#header-footer-modal-preview-2">
                        <button class="button mr-1 mb-1 bg-theme-1 text-white w-full">Edit Password</button>
                    </a>
                </div>
                <div class="col-span-12 flex items-center mt-1">
                    <a class="w-full mr-1" href="javascript:" data-toggle="modal"
                       data-target="#header-footer-modal-preview-3">
                        <button class="button mr-1 mb-1 bg-theme-1 text-white w-full">Add Phone Number</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="grid grid-cols-12 border-b border-gray-200 pb-5 -mx-5">
            <div class="col-span-12 sm:col-span-6 lg:col-span-4 flex my-auto flex-1 px-5 items-center">
                <div class="w-20 h-fit sm:w-24 sm:h-fit flex-none lg:w-32 lg:h-fit relative">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-full"
                         src="https://cdn.picpng.com/truck/truck-picture-29681.png">
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">Mercedes Benz</div>
                    <div class="text-gray-600">Tent</div>
                </div>
            </div>
            <div
                class="col-span-12 sm:col-span-6 lg:col-span-4 flex mt-6 sm:my-auto flex-1 flex-col text-gray-600 px-5 border-l lg:border-r border-gray-200 border-t sm:border-t-0 pt-5 lg:pt-0 col-span-12">
                <div class="truncate sm:whitespace-normal flex items-center"><i data-feather="truck"
                                                                                class="w-4 h-4 mr-2"></i> AVTO
                </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3"><i data-feather="truck"
                                                                                     class="w-4 h-4 mr-2"></i> 01 Y
                    126 VA
                </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3"><i data-feather="truck"
                                                                                     class="w-4 h-4 mr-2"></i> 22000
                    kg
                </div>

            </div>
            <div
                class="col-span-12 lg:col-span-4 flex mt-6 lg:my-auto border-t lg:border-none flex-1 flex-col px-5 pt-5 lg:pt-0 grid grid-cols-12">
                <div class="col-span-12 flex items-center mt-1">
                    <a class="w-full mr-1" href="javascript:" data-toggle="modal"
                       data-target="#header-footer-modal-preview-4">
                        <button class="button mr-1 mb-1 bg-theme-1 text-white w-full">Edit Car Details</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="grid grid-cols-12 border-b border-gray-200 pb-5">
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

            <div class="col-span-0 sm:col-span-6 sm:mt-5"></div>
            <div class="col-span-12 sm:col-span-6 grid grid-cols-12 mt-5">
                <div class="col-span-6 flex items-center mt-1">
                    <a class="w-full mr-1" href="javascript:" data-toggle="modal"
                       data-target="#header-footer-modal-preview-5">
                        <button class="button mr-1 mb-1 bg-theme-1 text-white w-full">Edit Skills</button>
                    </a>
                </div>
                <div class="col-span-6 flex items-center mt-1">
                    <a class="w-full mr-1" href="javascript:" data-toggle="modal"
                       data-target="#header-footer-modal-preview-6">
                        <button class="button mr-1 mb-1 bg-theme-9 text-white w-full">Enable Status</button>
                    </a>
                </div>
            </div>
        </div>

    </div>
@section('js')
    <script src="node_modules/intl-tel-input/src/js/intlTelInput.js">
        /* var input = document.querySelector("#phone_number");
   window.intlTelInput(input, {
   customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
   return "e.g. " + selectedCountryPlaceholder;
   },
   });*/
    </script>



    <script>


        function  add_number() {

            let forma = document.getElementById('btn_add_number');
            let number = forma.querySelector('input[name="phone_number"]').value;
            let _token=forma.querySelector('input[name="_token"]').value;

            try {
                $.ajax({
                    url: "{{route('admin.add_number')}}",
                    type: "POST",
                    data: {
                        user_id: {{auth()->user()->id}},
                        phone_number: number,
                        _token: _token,

                    },
                    success: function (response) {
                        if (response) {

                            console.log(response)
                            forma.querySelector('#btn_add_number input[name="phone_number"]').value='';

                            alert('UREEEEEE!!!');

                            document.getElementById('response_add_number').innerHTML+=`
                             <input type="hidden" name="phone_number_ids[]" value="${response.id}">
                            <label>Phone Number</label>

                            <div style="display: flex;">
                                <input type="text" style="display: inline; margin-right: 10px;" name="phone_number[]"
                                       class="input w-full border mt-2 flex-1" value="${response.phone_number}">

                                <div id="edit_profile">
                                    <i class="fa fa-close mt-2" style="font-size: 33px; cursor: pointer;"
                                       onclick="del(this.parentElement.parentElement.parentElement)"></i>
                                </div>
                            </div>
                            `;

                            tekshir();
                        }
                    }
                });
            } catch (e) {
                debugger
            }


        }
    </script>
@endsection




<script>

    function tekshir() {
        let inputlar = document.querySelectorAll('input[name="phone_number[]"]');
        if (inputlar.length === 1) {
            document.querySelector('#edit_profile').style.display = 'none';
        }
    }

    tekshir();

    function del(data) {
        data.remove();
        data.querySelector('[name="phone_number_ids[]"]').remove();
        tekshir();
    }
</script>

<!-- BEGIN: JS Assets-->
<script
    src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=['your-google-map-api']&libraries=places"></script>
<script src="{{asset('front/dist/js/app.js')}}"></script>
<script type="text/javascript">
    function startTime() {
        const today = new Date();
        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
        setTimeout(startTime, 1000);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }  // add zero in front of numbers < 10
        return i;
    }
</script>


<!-- END: JS Assets-->
@endsection
