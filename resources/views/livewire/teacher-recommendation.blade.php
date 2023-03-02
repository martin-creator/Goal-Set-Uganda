<div>
    <x-jet-form-section submit="#">
        <x-slot name="title">
            {{ __('Teachers Recommendation') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure  that you provide accurate details about yourself. This will help you provide you with the best experience') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4 ">
                <p class="text-justify">t is my pleasure to strongly recommend Henry Ramirez for your 4th Grade Math Teacher position at
                    Cherry Hill Elementary. I have worked with Henry for three years as his mentor teacher at Maple
                    Ridge Middle School. He is an outstanding educator who has demonstrated exceptional skills,
                    creativity and passion in teaching math.<br/>

                    Henry has been instrumental in improving the math curriculum and instruction at our school. He has
                    developed innovative lesson plans that incorporate technology, hands-on activities and real-world
                    applications. He has also implemented effective assessment strategies that measure student progress
                    and provide feedback for improvement. Henry's students have consistently achieved high scores on
                    standardized tests and shown remarkable growth in their math skills.</p>
            </div>
        </x-slot>

        {{-- <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot> --}}
    </x-jet-form-section>

</div>
