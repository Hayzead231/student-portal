<div class="space-y-10">
    <div class="font-bold text-yellow-400">
        Important: Before you can graduate You need to pay all outstanding course and library fees Thank you
    </div>
    <div>
        Graduation Status: <span class="uppercase {{ $hasOutstanding ? 'text-red-500' : 'text-green-500' }}">{{ $status }}</span>
    </div>
    @if ($hasOutstanding)
    <div class="italic font-light leading-8">
        Pay your outstanding balance through your finance portal by copying the invoice number of your enrolled course.
    </div>
    @endif
</div>
