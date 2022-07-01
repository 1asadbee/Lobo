@extends('user.layouts.master')

@section('data-list')
    <div class="col-span-12">
        <div class="flex items-center">
            <h2 class="intro-y text-lg font-medium mr-auto">
                Sign Up
                @foreach ($errors->all() as $error)
                    {{ $error }}<br/>
                @endforeach
                {{-- @if($errors->any())
                    {{ $all_errors = $errors }}
                @endif --}}
            </h2>
        </div>
        <!-- BEGIN: Wizard Layout -->
        <div class="intro-y box py-10 sm:py-20 mt-5">
            <div class="wizard flex flex-row justify-center px-5 sm:px-20">
                <div class="intro-x text-center items-center block flex-1 z-10">
                    <button id="step-number-1" class="w-10 h-10 rounded-full button text-white bg-theme-1">1</button>
                    <div class="lg:w-32 hidden lg:block font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Who are you?
                    </div>
                </div>
                <div class="intro-x text-center items-center block flex-1 z-10">
                    <button id="step-number-2" class="w-10 h-10 rounded-full button text-gray-600 bg-gray-200">2
                    </button>
                    <div class="lg:w-32 hidden lg:block text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">Your
                        Information
                    </div>
                </div>
                <div id="card_number_title_3" class="intro-x text-center items-center block flex-1 z-10 hidden">
                    <button id="step-number-3" class="w-10 h-10 rounded-full button text-gray-600 bg-gray-200">3
                    </button>
                    <div id="card_number_title_3_title"
                         class="lg:w-32 hidden lg:block text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">Your Car
                    </div>
                </div>


                <div class="wizard__line block w-3/5 xl:w-2/3 bg-gray-200 absolute mt-5"></div>
            </div>
            <form action="{{route('user-register', ['lang' => $locale])}}" method="post">
                @csrf
                <div id="step-1" class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200">
                    <div class="font-medium text-base">Who are you?</div>
                    <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <button type="button" onclick="yourInformation('client')"
                                    class="button button--lg w-full mr-1 mb-2 bg-theme-1 text-white">Client
                            </button>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <button type="button" onclick="yourInformation('carrier')"
                                    class="button button--lg w-full mr-1 mb-2 bg-theme-1 text-white">Carrier
                            </button>
                        </div>
                        <div class="intro-y col-span-12">
                            <button type="button" onclick="yourInformation('declarant')"
                                    class="button button--lg w-full mr-1 mb-2 bg-theme-1 text-white">Declarant
                            </button>
                        </div>

                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                            <button type="button" id="whoareyounextbutton" onclick="nextStep(2)"
                                    class="button w-24 justify-center block bg-theme-1 text-white ml-2 hidden">Next
                            </button>
                        </div>
                    </div>
                    <input id="yourrole" name="role" value="{{old('role')}}" class="hidden">
                    @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div id="step-2" class="px-5 hidden sm:px-20 mt-10 pt-10 border-t border-gray-200">
                    <div class="font-medium text-base">Your Information</div>
                    <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <input onkeyup="activateNextBtn();activateRegisterBtn('your_informations',1)"
                                   name="first_name" value="{{old('first_name')}}" type="text"
                                   class="input w-full border @error('first_name') border-theme-6 @enderror flex-1 your_informations"
                                   placeholder="First Name">
                            @error('first_name')
                            <div class="text-theme-6 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <input onkeyup="activateNextBtn();activateRegisterBtn('your_informations',1)"
                                   name="last_name" value="{{old('last_name')}}" type="text"
                                   class="input w-full border @error('last_name') border-theme-6 @enderror flex-1 your_informations"
                                   placeholder="Last Name">
                            @error('last_name')
                            <div class="text-theme-6 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <input onkeyup="activateNextBtn();activateRegisterBtn('your_informations',1)" name="email"
                                   value="{{old('email')}}" type="email"
                                   class="input w-full border @error('email') border-theme-6 @enderror flex-1 your_informations"
                                   placeholder="Email">
                            @error('email')
                            <div class="text-theme-6 mt-2" onload="yourInformationError()">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <input onkeyup="activateNextBtn();activateRegisterBtn('your_informations',1)"
                                   name="phone_number" value="{{old('phone_number')}}" type="text"
                                   class="input w-full border @error('phone_number') border-theme-6 @enderror flex-1 your_informations"
                                   placeholder="Phone Number">
                            @error('phone_number')
                            <div class="text-theme-6 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <input onkeyup="activateNextBtn();activateRegisterBtn('your_informations',1)"
                                   name="passcode" type="password"
                                   value="{{old('passcode')}}"
                                   class="input w-full border @error('password') border-theme-6 @enderror flex-1 your_informations"
                                   placeholder="Password">
                            @error('password')
                            <div class="text-theme-6 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <input onkeyup="activateNextBtn();activateRegisterBtn('your_informations',1)"
                                   name="confirm_password" type="password"
                                   value="{{old('confirm_password')}}"
                                   class="input w-full border @error('confirm_password') border-theme-6 @enderror flex-1 your_informations"
                                   placeholder="Confirm Password">
                            @error('confirm_password')
                            <div class="text-theme-6 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div id="step_2_div"
                             class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">

                        </div>
                    </div>
                </div>
                <div id="step-3" class="hidden">
                    <div id="truck-form" class="px-5 hidden sm:px-20 mt-10 pt-10 border-t border-gray-200">
                        <div class="font-medium text-base">Carrier's Car</div>
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Car Number</div>
                                <input name="vehicle_number" value="{{old('vehicle_number')}}"
                                       oninput="activateRegisterBtn('your_car',2)" type="text"
                                       class="input w-full border @error('vehicle_number') border-theme-6 @enderror flex-1 your_car"
                                       placeholder="Car Number">
                                @error('vehicle_number')
                                <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Who are you?</div>
                                <select id="who_are_you" name="who_are_you"
                                        onchange="activateRegisterBtn('your_car',2); openCompanyName()"
                                        class="input w-full border @error('who_are_you') border-theme-6 @enderror flex-1 your_car">
{{--                                    <option value="Who are you" disabled></option>--}}
                                    <option value="jur" @if('jur' == old('who_are_you')) selected @endif>
                                        Yuridik litso
                                    </option>
                                    <option value="phy" @if('phy' == old('who_are_you')) selected @endif>
                                        Fiziceskiy litso
                                    </option>

                                </select>
                                @error('who_are_you')
                                <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="company_name" class="col-span-12 sm:col-span-6 hidden">
                                <div class="mb-2">Company Name</div>
                                <input name="company_name" value="{{old('company_name')}}"
                                       onchange="activateRegisterBtn('your_car',2)" id="company_name_input" type="text"
                                       class="input w-full border @error('company_name') border-theme-6 @enderror flex-1 your_car"
                                       placeholder="Company Name">
                                @error('company_name')
                                <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Vehicle Model</div>
                                <select onchange="activateRegisterBtn('your_car',2)" name="vehicle_model"
                                        class="input w-full border @error('vehicle_model') border-theme-6 @enderror flex-1 your_car">
                                    @foreach(\App\Models\VehicleModel::select('id','name_'.$locale)->orderBy('name_'.$locale, 'asc')->get() as $vehicle_model)
                                        <option value="{{$vehicle_model->id}}"
                                                @if($vehicle_model->id == old('vehicle_model')) selected @endif>{{$vehicle_model['name_'.$locale]}}</option>
                                    @endforeach
                                </select>
                                @error('vehicle_model')
                                <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Delivery Type</div>
                                <select onchange="activateRegisterBtn('your_car',2)" id="delivery_type"
                                        name="delivery_type"
                                        class="input w-full border @error('delivery_type') border-theme-6 @enderror flex-1 your_car">
                                    @foreach(\App\Models\DeliveryType::select('id','name_'.$locale)->orderBy('name_'.$locale, 'asc')->get() as $delivery_type)
                                        <option
                                            value="{{$delivery_type->id}}" @if($delivery_type->id == old('delivery_type')) selected @endif>{{$delivery_type['name_'.$locale]}}</option>
                                    @endforeach
                                </select>
                                @error('delivery_type')
                                <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="vehicle_div" class="intro-y col-span-12 sm:col-span-6">

                            </div>

                            <div id="vehicle_type_div" class="intro-y col-span-12 sm:col-span-6">

                            </div>

                            <div style="display: none" id="weight_div" class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Weight</div>
                                <input oninput="activateRegisterBtn('your_car',2)" name="weight" type="number"
                                       class="input w-full border @error('weight') border-theme-6 @enderror flex-1 your_car"
                                       placeholder="Weight">
                                @error('weight')
                                <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div style="display: none" id="height_div" class="intro-y col-span-4">
                                <div class="mb-2">Height</div>
                                <input oninput="activateRegisterBtn('your_car',2)" name="height" type="number"
                                       class="input w-full border @error('height') border-theme-6 @enderror flex-1 your_car"
                                       placeholder="Height">
                                @error('height')
                                <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div style="display: none" id="width_div" class="intro-y col-span-4">
                                <div class="mb-2">Width</div>
                                <input oninput="activateRegisterBtn('your_car',2)" name="width" type="number"
                                       class="input w-full border @error('width') border-theme-6 @enderror flex-1 your_car"
                                       placeholder="Width">
                                @error('width')
                                <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div style="display: none" id="length_div" class="intro-y col-span-4">
                                <div class="mb-2">Length</div>
                                <input oninput="activateRegisterBtn('your_car',2)" name="length" type="number"
                                       class="input w-full border @error('length') border-theme-6 @enderror flex-1 your_car"
                                       placeholder="Length">
                                @error('length')
                                <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                <button type="button" onclick="previuosStep(2)"
                                        class="button w-24 justify-center block bg-gray-200 text-gray-600">Previous
                                </button>
                                <button type="button" id="registerBtn_2"
                                        class="button w-24 justify-center block bg-gray-200 text-gray-600 ml-1">Register
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="declarant-form" class="px-5 hidden sm:px-20 mt-10 pt-10 border-t border-gray-200">
                        <div class="font-medium text-base">Declarant's Status</div>
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
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
                            <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                                <div class="mr-3">Are you empty?</div>
                                <input name="status" value="1" data-target="#basic-textual-toast"
                                       class="show-code input input--switch border ml-auto mr-5" type="checkbox" @if(old('status')==1) checked @endif>
                            </div>
                            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                <button type="button" onclick="previuosStep(2)"
                                        class="button w-24 justify-center block bg-gray-200 text-gray-600">Previous
                                </button>
                                <button type="button" id="registerBtnDec"
                                        class="button w-24 justify-center block bg-gray-200 text-gray-600 ml-1">Register
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- END: Wizard Layout -->
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        function nextStep(id) {

            if (document.getElementById('yourrole').value == 'client') {
                document.getElementById('step_2_div').innerHTML = '<button type="button" onclick="previuosStep(1)" class="button w-24 justify-center block bg-gray-200 text-gray-600">Previous</button><button type="submit" id="registerBtn_1" class="button w-24 justify-center block bg-gray-200 text-gray-600 ml-1">Register</button>';
            }

            if (document.getElementById('yourrole').value == 'carrier') {
                document.getElementById('step_2_div').innerHTML = '<button type="button" onclick="previuosStep(1)" class="button w-24 justify-center block bg-gray-200 text-gray-600">Previous</button><button id="second_next_button" type="button" onclick="" class="button w-24 justify-center block bg-gray-200 text-gray-600 ml-1">Next</button>';
                document.getElementById('second_next_button').style.display = 'block';
                document.getElementById('card_number_title_3').style.display = 'block';
                document.getElementById('card_number_title_3_title').innerHTML = 'Your Car';
                document.getElementById('truck-form').style.display = 'block';
                document.getElementById('declarant-form').style.display = 'none';
            }

            if (document.getElementById('yourrole').value == 'declarant') {
                document.getElementById('step_2_div').innerHTML = '<button type="button" onclick="previuosStep(1)" class="button w-24 justify-center block bg-gray-200 text-gray-600">Previous</button><button id="second_next_button" type="button" onclick="" class="button w-24 justify-center block bg-gray-200 text-gray-600 ml-1">Next</button>';
                document.getElementById('second_next_button').style.display = 'block';
                document.getElementById('card_number_title_3').style.display = 'block';
                document.getElementById('card_number_title_3_title').innerHTML = "Declarant's Status";
                document.getElementById('truck-form').style.display = 'none';
                document.getElementById('declarant-form').style.display = 'block';
            }

            document.getElementById('step-number-' + (id - 1)).classList.remove('bg-theme-1');
            document.getElementById('step-number-' + (id - 1)).classList.add('bg-gray-200');

            document.getElementById('step-number-' + (id - 1)).classList.remove('text-white');
            document.getElementById('step-number-' + (id - 1)).classList.add('text-gray-600');

            document.getElementById('step-number-' + id).classList.remove('bg-gray-200');
            document.getElementById('step-number-' + id).classList.add('bg-theme-1');

            document.getElementById('step-number-' + id).classList.remove('text-gray-600');
            document.getElementById('step-number-' + id).classList.add('text-white');

            document.getElementById('step-' + (id - 1)).style.display = 'none';
            document.getElementById('step-' + id).style.display = 'block';

        }

        function previuosStep(id) {
            document.getElementById('step-number-' + (id + 1)).classList.remove('bg-theme-1');
            document.getElementById('step-number-' + (id + 1)).classList.add('bg-gray-200');

            document.getElementById('step-number-' + (id + 1)).classList.remove('text-white');
            document.getElementById('step-number-' + (id + 1)).classList.add('text-gray-600');

            document.getElementById('step-number-' + id).classList.remove('bg-gray-200');
            document.getElementById('step-number-' + id).classList.add('bg-theme-1');

            document.getElementById('step-number-' + id).classList.remove('text-gray-600');
            document.getElementById('step-number-' + id).classList.add('text-white');

            document.getElementById('step-' + (id + 1)).style.display = 'none';
            document.getElementById('step-' + id).style.display = 'block';
        }

        function yourInformation(role) {
            document.getElementById('yourrole').value = role;
            if (document.getElementById('yourrole').value == 'client') {
                document.getElementById('card_number_title_3').style.display = 'none';
            }
            document.getElementById('whoareyounextbutton').click();
        }

        function activateNextBtn() {

            if (document.getElementById('yourrole').value == 'carrier' || document.getElementById('yourrole').value == 'declarant') {

                var inputs = document.getElementsByClassName('your_informations');
                var activate = false;
                var array = [];
                for (var i = 0; i < inputs.length; i++) {
                    if (inputs[i].value != '') {
                        array.push(1);
                    } else {
                        array.push(0);
                    }
                }
                if (!array.includes(0)) {
                    activate = true;
                } else {
                    activate = false;
                }
                if (activate == true) {
                    var second_next_button = document.getElementById('second_next_button');
                    second_next_button.classList.remove('bg-gray-200');
                    second_next_button.classList.add('bg-theme-1');
                    second_next_button.classList.remove('text-gray-600');
                    second_next_button.classList.add('text-white');
                    second_next_button.onclick = function () {
                        nextStep(3);
                    };
                    if (document.getElementById('yourrole').value == 'declarant') {
                        var register_btn = document.getElementById('registerBtnDec');
                        register_btn.classList.remove('bg-gray-200');
                        register_btn.classList.add('bg-theme-1');
                        register_btn.classList.remove('text-gray-600');
                        register_btn.classList.add('text-white');
                        register_btn.type = 'submit';
                    }
                }
                if (activate == false) {
                    var second_next_button = document.getElementById('second_next_button');
                    second_next_button.classList.add('bg-gray-200');
                    second_next_button.classList.remove('bg-theme-1');
                    second_next_button.classList.add('text-gray-600');
                    second_next_button.classList.remove('text-white');
                    second_next_button.onclick = '';
                }

                console.log(activate);
            }
        }

        function activateRegisterBtn(class_name, btnNum) {
            var inputs = document.getElementsByClassName(class_name);
            var activate = false;
            var array = [];
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value != '') {
                    array.push(1);
                } else {
                    array.push(0);
                }
            }
            if (!array.includes(0)) {
                activate = true;
            } else {
                activate = false;
            }
            if (activate == true) {
                var register_btn = document.getElementById('registerBtn_' + btnNum);
                register_btn.classList.remove('bg-gray-200');
                register_btn.classList.add('bg-theme-1');
                register_btn.classList.remove('text-gray-600');
                register_btn.classList.add('text-white');
                register_btn.type = 'submit';

            }
            if (activate == false) {
                var register_btn = document.getElementById('registerBtn_' + btnNum);
                register_btn.classList.add('bg-gray-200');
                register_btn.classList.remove('bg-theme-1');
                register_btn.classList.add('text-gray-600');
                register_btn.classList.remove('text-white');
                register_btn.type = 'button';
            }
            console.log(activate);

        }

        $(document).ready(function () {
            $('#delivery_type').change(function () {
                $('#vehicle_div').load('{{route('input-function',$locale)}}?delivery_type=' + document.getElementById('delivery_type').value)
            });
        })

        {{--function vehicle_type(){--}}
        {{--    $('#vehicle_type_div').load('{{route('input-function',$locale)}}?vehicle=' + document.getElementById('vehicle').value)--}}
        {{--}--}}

        function openCompanyName(){
            var company_name = document.getElementById('company_name');
            if (document.getElementById('who_are_you').value == 'jur'){ company_name.style.display = 'block'; } else { document.getElementById('company_name_input').value = ''; company_name.style.display = 'none'; }
        }
    </script>
    <script>
        @if($errors->any())
            @php

                $your_information_inputs = ['first_name','last_name','email','phone_number','password','confirm_password'];

                $your_information_error = 0;

                foreach ($your_information_inputs as $your_information_input){
                    if ($errors->has($your_information_input)){
                        $your_information_error = 1;
                        break;
                    }
                }

            if ($your_information_error == 1){
                echo "yourInformation(document.getElementById('yourrole').value);";
            }else{

                $role = old('role');

                if ($role == 'carrier'){
                    $carriers_car_inputs = ['vehicle_number','company_name','vehicle_model','delivery_type','vehicle','vehicle_type','weight','height','width','length'];

                    $carriers_car_error = 0;

                    foreach ($carriers_car_inputs as $carriers_car_input){
                        if ($errors->has($carriers_car_input)){
                            $carriers_car_error = 1;
                            break;
                        }
                    }
                    if ($carriers_car_error == 1){
                        echo "yourInformation(document.getElementById('yourrole').value);";
                        echo "nextStep(3);";
                    }
                }

            }

            @endphp
            if(document.getElementById('yourrole').value == 'carrier') {
                @if(old('who_are_you') != '')
                    openCompanyName();
                    debugger;
                @endif
                @if(old('delivery_type') != '')
                        $('#vehicle_div').load('{{route('input-function',$locale)}}?delivery_type=' + document.getElementById('delivery_type').value)
                @endif
            }
        @endif


    </script>
@endsection
