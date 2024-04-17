<div class="space-y-10">
    <div>
        <div class="space-y-3">
            <h1 class="text-[1.5em] font-bold text-gray-700 uppercase">{{ $course->title }}</h1>
            <p>Fee: {{ $this->formatCurrency($course->fee) }}</p>
            <p>{{ $course->description }}</p>
        </div>
    </div>
    @if( $isEnroled )
        <p class="font-bold text-blue-900 uppercase">enrolled</p>
    @else
    <form wire:submit.prevent='enrol'>
        @error('errorMessage')
            <p class="mb-5 text-red-500">{{ $message }}<p>
        @enderror
        <button class="btn">Enrol Now</button>
    </form>
    @endif
</div>
