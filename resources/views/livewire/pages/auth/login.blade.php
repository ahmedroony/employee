<div>
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 mx-auto">
        <form action="" wire:submit="login">
            @csrf
            <legend class="fieldset-legend">Login</legend>

            <label class="label">Email</label>
            <input type="email" class="input" placeholder="Email" required name="email" wire:model="email" />

            <label class="label">Password</label>
            <input type="password" class="input" placeholder="Password" required name="password"
                wire:model="password" />

            <button class="btn btn-soft btn-success mt-4" type="submit">دخول</button>
            <a href="{{ route('register') }}" class="btn btn-error mt-4">تسجيل جديد</a>
        </form>
    </fieldset>
</div>
