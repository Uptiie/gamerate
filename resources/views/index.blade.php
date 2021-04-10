@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
{{--        Popular games section --}}
        <h2 class="text-white uppercase tracking-wide 2xl:font-semibold">Popular Games</h2>
        <livewire:request.popular-games/>
        {{-- end popular games section --}}
        <div class="flex flex-col lg:flex-row my-10">
{{--            recently reviewed --}}
            <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32 ">
                <h2 class="text-white uppercase tracking-wide 2xl:font-semibold">Recently Reviewed</h2>
                <livewire:request.recently-reviewed/>
            </div>
{{--            Most anticipated game--}}
            <div class="most-anticipated lg:w-1/4 mt-12 lg:mt-0">
                <h2 class="text-white uppercase tracking-wide 2xl:font-semibold">Most Anticipated</h2>
                <livewire:request.most-anticipated/>
                {{--            Coming Soon games --}}
                <h2 class="text-white uppercase tracking-wide 2xl:font-semibold mt-10">Coming Soon</h2>
                <livewire:request.coming-soon/>
            </div>
        </div>
    </div>
@endsection
