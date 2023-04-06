<div>
    <x-jet-form-section submit="insertActualAndTargetMarksTwo">
        <x-slot name="title">
            {{ __('Subject Two') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure  that you provide accurate details about yourself. This will help you provide you with the best experience') }}
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="subject_name_two" value="{{ __('Subject Name') }}" />
                <x-jet-input id="subject_name_two" type="text" class="mt-1 block w-full"
                    wire:model.defer="state_two.subject_name_two" autocomplete="subject_name_two" />
                <x-jet-input-error for="subject_name_two" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paper_one_actual_two" value="{{ __('Paper One Actual') }}" />
                <x-jet-input id="paper_one_actual_two" type="range" class="mt-1 block w-full"
                    wire:model.defer="state_two.paper_one_actual_two" autocomplete="paper_one_actual_two" min="0"
                    max="100" value="{{ $state_two['paper_one_actual_two'] }}" />
                <p>Value: <output id="value1_two">{{ $state_two['paper_one_actual_two'] }}</output></p>
                <x-jet-input-error for="paper_one_actual_two" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paper_one_target_two" value="{{ __('Paper One Target') }}" />
                <x-jet-input id="paper_one_target_two" type="range" class="mt-1 block w-full"
                    wire:model.defer="state_two.paper_one_target_two" autocomplete="paper_one_target_two" min="0"
                    max="100"
                    value="60" value="{{ $state_two['paper_one_target_two'] }} "/>
                <p>Value: <output id="value2_two">{{ $state_two['paper_one_target_two'] }}</output>
                    </p>
                    <x-jet-input-error for="paper_one_target_two" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paper_two_actual_two" value="{{ __('Paper Two Actual') }}" />
                <x-jet-input id="paper_two_actual_two" type="range" class="mt-1 block w-full"
                    wire:model.defer="state_two.paper_two_actual_two" autocomplete="paper_two_actual_two" min="0"
                    max="100" value="{{ $state_two['paper_two_actual_two'] }}" />
                <p>Value: <output id="value3_two"></output></p>
                <x-jet-input-error for="paper_two_actual_two" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paper_two_target_two" value="{{ __('Paper Two Target') }}" />
                <x-jet-input id="paper_two_target_two" type="range" class="mt-1 block w-full"
                    wire:model.defer="state_two.paper_two_target_two" autocomplete="paper_two_target_two" min="0"
                    max="100" value="{{ $state_two['paper_two_target_two'] }}" />
                <p>Value: <output id="value4_two">{{ $state_two['paper_two_target_two'] }}</output></p>
                <x-jet-input-error for="paper_two_target_two" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paper_three_actual_two" value="{{ __('Paper Three Actual') }}" />
                <x-jet-input id="paper_three_actual_two" type="range" class="mt-1 block w-full"
                    wire:model.defer="state_two.paper_three_actual_two" autocomplete="paper_three_actual_two" min="0"
                    max="100" value="{{ $state_two['paper_three_actual_two'] }}" />
                <p>Value: <output id="value5_two">{{$state_two['paper_three_actual_two'] }}</output></p>
                <x-jet-input-error for="paper_three_actual_two" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paper_three_target_two" value="{{ __('Paper Three Target') }}" />
                <x-jet-input id="paper_three_target_two" type="range" class="mt-1 block w-full"
                    wire:model.defer="state_two.paper_three_target_two" autocomplete="paper_three_target_two" min="0"
                    max="100" value="{{ $state_two['paper_three_target_two'] }}" />
                <p>Value: <output id="value6_two">{{ $state_two['paper_three_target_two'] }}</output></p>
                <x-jet-input-error for="paper_three_target_two" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="subject" value="{{ __(' Change Subject Name') }}" />
                <select wire:model.defer="state_two.subject_name_two" class="form-control" style="color:black;">
                    <option value="{{ __('School Name') }}" selected>Select school</option>
                    @foreach ($listedSubjects_two as $subject)
                        <option value="{{ $subject->subject_name_two }}">{{ $subject->subject_name_two }}</option>
                    @endforeach
                </select>
                @if ($selectedSubject_two)
                    <div class="mt-1 block w-full">
                        You have selected {{ $listedSubjects_two->where('id', $selectedSubject_two)->first()->subject_name_two }}
                    </div>
                @endif

                <x-jet-input-error for="subject" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

</div>

<script>
    $('input#subject_name_two').mousedown(function(e) {
        e.preventDefault();
        $(this).blur();
        return false;
    });


    const value1_two = document.querySelector("#value1_two");
    const value2_two = document.querySelector("#value2_two");
    const value3_two = document.querySelector("#value3_two");
    const value4_two = document.querySelector("#value4_two");
    const value5_two = document.querySelector("#value5_two");
    const value6_two = document.querySelector("#value6_two");

    const paper_one_actual_two = document.querySelector("#paper_one_actual_two");
    const paper_one_target_two = document.querySelector("#paper_one_target_two");
    const paper_two_actual_two = document.querySelector("#paper_two_actual_two");
    const paper_two_target_two = document.querySelector("#paper_two_target_two");
    const paper_three_actual_two = document.querySelector("#paper_three_actual_two");
    const paper_three_target_two = document.querySelector("#paper_three_target_two");

    value1_two.textContent = paper_one_actual_two.value;
    value2_two.textContent = paper_one_target_two.value;
    value3_two.textContent = paper_two_actual_two.value;
    value4_two.textContent = paper_two_target_two.value;
    value5_two.textContent = paper_three_actual_two.value;
    value6_two.textContent = paper_three_target_two.value;

    paper_one_actual_two.addEventListener("input", (event) => {
        value1_two.textContent = event.target.value
    });
    paper_one_target_two.addEventListener("input", (event) => {
        value2_two.textContent = event.target.value
    });
    paper_two_actual_two.addEventListener("input", (event) => {
        value3_two.textContent = event.target.value
    });
    paper_two_target_two.addEventListener("input", (event) => {
        value4_two.textContent = event.target.value
    });
    paper_three_actual_two.addEventListener("input", (event) => {
        value5_two.textContent = event.target.value
    });
    paper_three_target_two.addEventListener("input", (event) => {
        value6_two.textContent = event.target.value
    });
</script>
