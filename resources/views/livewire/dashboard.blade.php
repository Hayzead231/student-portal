<div class="space-y-10">
    <div class="font-light leading-8">
        Welcome to your Student portal  You can view all the courses offered,
            Enrol in any of the courses if this is your first enrolment,
            You can also see all courses you are enrolled in,
            View and update your profile, lastly you can view your eligibility to graduate. Note that you must not have
            any outstanding invoices. Pay all outstanding invoices in order to graduate
    </div>
    <div class="font-light leading-8">
        <h1 class="font-bold">
            List of enrolled courses
        </h1>
        <div class="relative mt-5 overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Invoice Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $course->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $course->invoice_id }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('course.show', $course->uuid) }}">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-4"><em>No course(s) enrolled yet.</em></td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
</div>
