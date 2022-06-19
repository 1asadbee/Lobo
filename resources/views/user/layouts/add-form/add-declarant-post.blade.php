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
