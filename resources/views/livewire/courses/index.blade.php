<div class="space-y-10">
    <h1 class="font-bold">
        Courses
    </h1>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fee
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $course->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $course->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $this->formatCurrency($course->fee) }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('course.show', $course->uuid) }}">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
