<div>
    <x-jet-form-section submit="#">
        <x-slot name="title">
            {{ __('Personal Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure  that you provide accurate details about yourself. This will help you provide you with the best experience') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="telephone" value="{{ __('Telephone') }}" />
                <x-jet-input id="telephone" type="text" class="mt-1 block w-full" wire:model.defer="state.telephone" autocomplete="telephone" />
                <x-jet-input-error for="telephone" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="school_name" value="{{ __('School Name') }}" />
                <x-jet-input id="school_name" type="text" class="mt-1 block w-full" wire:model.defer="state.school_name" autocomplete="school_name" />
                <x-jet-input-error for="school_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="stream" value="{{ __('Stream') }}" />
                <x-jet-input id="stream" type="text" class="mt-1 block w-full" wire:model.defer="state.stream" autocomplete="stream" />
                <x-jet-input-error for="stream" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="target_points" value="{{ __('Target Points') }}" />
                <x-jet-input id="target_points" type="number" class="mt-1 block w-full" wire:model.defer="state.target_points" autocomplete="target_points" />
                <x-jet-input-error for="target_points" class="mt-2" />
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
