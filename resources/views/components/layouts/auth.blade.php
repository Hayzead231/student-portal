<div class="text-white bg-blue-900">
    <div class="container grid gap-4 md:grid-cols-5">
        <a class="hover:underline" href="{{ route('home') }}">Home</a>
        <a class="hover:underline" href="{{ route('course.index') }}">Courses</a>
        <a class="hover:underline" href="{{ route('profile') }}">Profile</a>
        <a class="hover:underline" href="{{ route('graduation') }}">Graduation</a>
    </div>
</div>
<div class="container">
    <h1 class="font-bold capitalize">
        Hello, {{ auth()->user()->first_name }} {{ auth()->user()->surname }}.
    </h1>
    <form id="logout" action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="text-red-500 hover:underline">Logout</button>
    </form>
</div>
<div class="container mb-5 shadow-lg">
    @yield('content')
</div>
<div class="flex justify-center py-5">
    Copyright &copy; {{ date('Y') }} Leedsbeckett
</div>
