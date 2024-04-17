<form wire:submit.prevent="store" class="space-y-10">
    <h2 class="font-bold text-center">Login</h2>
    <div class="grid gap-4 my-10 md:grid-cols-1">
        <div>
            <label for="username" class="label">Username</label>
            <input id="username" wire:model='username' class="input" placeholder="enter username" required>
            @error('username')
                <p class="mt-2 font-light text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password" class="label">Password</label>
            <input id="password" wire:model='password' type="password" class="input" placeholder="enter password" required>
        </div>
    </div>
    <button class="w-full text-center btn">
        Submit
    </button>
    <p class="text-right">
        Don't have an account <a href="{{ route('register') }}" class="text-blue-900 hover:underline">create an account</a>
    </p>
</form>
