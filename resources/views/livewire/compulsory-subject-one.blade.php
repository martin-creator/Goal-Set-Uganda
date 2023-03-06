<div>
    <x-jet-form-section submit="insertPersonalInformation">
        <x-slot name="title">
            {{ __('Subject One') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure  that you provide accurate details about yourself. This will help you provide you with the best experience') }}
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="subject_name" value="{{ __('Subject Name') }}" />
                <x-jet-input id="suject_name" type="text" class="mt-1 block w-full" wire:model.defer="state.subject_name"
                    autocomplete="subject_name"/>
                <x-jet-input-error for="subject_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paper_one_actual" value="{{ __('Paper One Actual') }}" />
                <x-jet-input id="paper_one_actual" type="range" class="mt-1 block w-full" wire:model.defer="state.paper_one_actual"
                    autocomplete="paper_one_actual" min="0" max="100" />
                <x-jet-input-error for="paper_one_actual" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paper_one_target" value="{{ __('Paper One Target') }}" />
                <x-jet-input id="paper_one_target" type="range" class="mt-1 block w-full" wire:model.defer="state.paper_one_actual"
                    autocomplete="paper_one_target" min="0" max="100" />
                <x-jet-input-error for="paper_one_target" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paper_two_actual" value="{{ __('Paper Two Actual') }}" />
                <x-jet-input id="paper_two_actual" type="range" class="mt-1 block w-full" wire:model.defer="state.paper_two_actual"
                    autocomplete="paper_two_actual" min="0" max="100" />
                <x-jet-input-error for="paper_two_actual" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paper_two_target" value="{{ __('Paper Two Target') }}" />
                <x-jet-input id="paper_two_target" type="range" class="mt-1 block w-full" wire:model.defer="state.paper_two_target"
                    autocomplete="paper_two_target" min="0" max="100" />
                <x-jet-input-error for="paper_two_target" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paper_three_actual" value="{{ __('Paper Three Actual') }}" />
                <x-jet-input id="paper_three_actual" type="range" class="mt-1 block w-full" wire:model.defer="state.paper_three_actual"
                    autocomplete="paper_three_actual" min="0" max="100" />
                <x-jet-input-error for="paper_three_actual" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paper_three_target" value="{{ __('Paper Three Target') }}" />
                <x-jet-input id="paper_three_target" type="range" class="mt-1 block w-full" wire:model.defer="state.paper_three_target"
                    autocomplete="paper_three_target" min="0" max="100" />
                <x-jet-input-error for="paper_three_target" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="school" value="{{ __(' Change School Name') }}" />
                <select wire:model.defer="state.subject_name" class="form-control" style="color:black;">
                    <option value="{{ __('School Name') }}" selected>Select school</option>
                    @foreach ($listedSubjects as $subject)
                        <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
                @if ($selectedSubject)
                    <div class="mt-1 block w-full">
                        You have selected {{ $listedSubjects->where('id', $selectedSubject)->first()->subject_name }}
                    </div>
                @endif

                <x-jet-input-error for="school" class="mt-2" />
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
    $('input#subject_name').mousedown(function(e) {
        e.preventDefault();
        $(this).blur();
        return false;
    });
</script>
