@extends('user.layouts.master')

@section('data-list')
    <div class="col-span-12">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">
                    Vertical Form
                    @if($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                </h2>

            </div>
            <div class="p-5" id="vertical-form">
                <div class="preview" style="">
                    <form action="{{route('user-login',$locale)}}" method="post">
                        @csrf
                        <div>
                            <label>Email or Phone Number</label>
                            <input type="text" name="email" class="input w-full border mt-2" placeholder="example@gmail.com">
                        </div>
                        <div class="mt-3">
                            <label>Password</label>
                            <input type="password" name="password" class="input w-full border mt-2" placeholder="secret">
                        </div>
                        <div class="flex items-center text-gray-700 mt-5">
                            <input type="checkbox" class="input border mr-2" id="vertical-remember-me">
                            <label class="cursor-pointer select-none" for="vertical-remember-me">Remember me</label>
                        </div>
                        <button type="submit" class="button bg-theme-1 text-white mt-5">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        function nextStep(id) {

            if (document.getElementById('yourrole').value == 'client') {
                document.getElementById('step_2_div').innerHTML = '<button type="button" onclick="previuosStep(1)" class="button w-24 justify-center block bg-gray-200 text-gray-600">Previous</button><button type="button" id="registerBtn_1" class="button w-24 justify-center block bg-gray-200 text-gray-600 ml-1">Register</button>';
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

    </script>
@endsection
