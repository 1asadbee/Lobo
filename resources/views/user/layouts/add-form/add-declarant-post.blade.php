<form action="{{route('addDeclarant',$locale)}}" method="post">
    @csrf
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mt-16 mr-auto">Добавить объявление</h2>
        </div>
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            @php
                $declarant = \App\Models\Declarant::where('user_id',auth()->user()->id)->first();
            @endphp
            <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                <div class="mr-3">Declaration</div>
                <input data-target="#basic-textual-toast" name="declaration"
                       class="show-code input input--switch border ml-auto mr-5" type="checkbox">
            </div>
            <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                <div class="mr-3">Settlement Fee</div>
                <input data-target="#basic-textual-toast" name="settlement_fee"
                       class="show-code input input--switch border ml-auto mr-5" type="checkbox">
            </div>
            <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                <div class="mr-3">Registration Certificate</div>
                <input data-target="#basic-textual-toast" name="registration_certificate"
                       class="show-code input input--switch border ml-auto mr-5" type="checkbox" >
            </div>
            <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                <div class="mr-3">Obtaining License</div>
                <input data-target="#basic-textual-toast" name="obtaining_license"
                       class="show-code input input--switch border ml-auto mr-5" type="checkbox" >
            </div>
            <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                <div class="mr-3">Obtaining Permits</div>
                <input data-target="#basic-textual-toast" name="obtaining_permits"
                       class="show-code input input--switch border ml-auto mr-5" type="checkbox" >
            </div>
            <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                <div class="mr-3">Unusual Cargo</div>
                <input data-target="#basic-textual-toast" name="unusual_cargo"
                       class="show-code input input--switch border ml-auto mr-5" type="checkbox"  >
            </div>
            <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                <div class="mr-3">Insurance</div>
                <input data-target="#basic-textual-toast" name="insurance"
                       class="show-code input input--switch border ml-auto mr-5" type="checkbox"  >
            </div>
            <div class="intro-y col-span-12 sm:col-span-6 flex items-center">
                <div class="mr-3">Are you empty?</div>
                <input data-target="#basic-textual-toast" name="status"
                       class="show-code input input--switch border ml-auto mr-5" type="checkbox"  >
            </div>
            <div class="col-span-6">
                <label>Sena <span style="color: red">*</span></label>
                <input type="number" name="price" class="input w-full border mt-2 flex-1"
                       placeholder="0000" required>
            </div>
            <div class="col-span-6">
                <label>Currency <span style="color: red">*</span></label>
                <select required name="currency_id" class="input w-full border mt-2 flex-1">
                    @foreach(\App\Models\Currency::select('id','name_'.$locale)->get() as $currency)
                        <option value="{{$currency->id}}">{{$currency['name_'.$locale]}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-12">
                <label>Opisaniya</label>
                <textarea class="input w-full border mt-2" name="description"
                          placeholder="Type your comments"
                          minlength="10"></textarea>
            </div>

        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200">
            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">
                Cancel
            </button>
            <button type="submit" class="button bg-theme-1 text-white">
                Activate
            </button>
        </div>
    </div>
</form>
