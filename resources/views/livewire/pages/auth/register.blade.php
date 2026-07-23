<div>
    @csrf
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 mx-auto">
        <form action="" wire:submit="storeuser">
            @csrf

            <legend class="fieldset-legend">register</legend>

            <label class="label">Name</label>
            <input type="name" class="input" placeholder="name" required name="name" wire:model="name" />

            <label class="label">Email</label>
            <input type="email" class="input" placeholder="Email" required name="email" wire:model="email" />

            <label class="label">Password</label>
            <input type="password" class="input" placeholder="Password" required name="password"
                wire:model="password" />
            @guest
                <button class="btn btn-neutral mt-4" type="submit">register</button>
            @endguest
        </form>
    </fieldset>
</div>
