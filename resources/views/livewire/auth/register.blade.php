<form wire:submit.prevent="store" class="space-y-10">
    <h2 class="font-bold text-center">Register</h2>
    <div class="grid gap-4 my-10 md:grid-cols-1">
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label for="surname" class="label">Surname</label>
                <input id="surname" wire:model='surname' class="input" placeholder="enter surname" required>
                @error('surname')
                    <p class="mt-2 font-light text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="firstName" class="label">First Name</label>
                <input id="firstName" wire:model='firstName' class="input" placeholder="enter first name" required>
                @error('firstName')
                    <p class="mt-2 font-light text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <label for="username" class="label">Username</label>
            <input id="username" wire:model='username' class="input" placeholder="enter username" required>
            @error('username')
                <p class="mt-2 font-light text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email" class="label">Email</label>
            <input id="email" type="email" wire:model='email' class="input" placeholder="enter email" required>
            @error('email')
                <p class="mt-2 font-light text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password" class="label">Password</label>
            <input id="password" type="password" wire:model='password' class="input" placeholder="enter password" required>
            @error('password')
                <p class="mt-2 font-light text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <button class="w-full text-center btn">
        Submit
    </button>
    <p class="text-right">
        Have an account <a href="{{ route('login') }}" class="text-blue-900 hover:underline">login</a>
    </p>
</form>
