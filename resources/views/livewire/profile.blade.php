<div class="space-y-10">
    <h1 class="font-bold">
        Student Profile
    </h1>
    <div>
        <table>
            <tr>
                <td class="py-2">First Name:</td>
                <td class="px-6 capitalize">{{ $user->first_name }}</td>
            </tr>
            <tr>
                <td class="py-2">Surname:</td>
                <td class="px-6 capitalize">{{ $user->surname }}</td>
            </tr>
            <tr>
                <td class="py-2">Student ID:</td>
                <td class="px-6">{{ $user->student_id }}</td>
            </tr>
        </table>
    </div>
    <form wire:submit.prevent='store' class="md:w-1/2">
        <div class="grid grid-cols-1 gap-4 mb-5">
            <div>
                <label class="label" for="firstName">First Name</label>
                <input class="input" wire:model='firstName' id="firstName" placeholder="enter first name" required>
            </div>
            <div>
                <label class="label" for="surname">Surname</label>
                <input class="input" wire:model='surname' id="surname" placeholder="enter surname" required>
            </div>
        </div>
        <button class="w-full btn">
            Update
        </button>
    </form>
</div>
