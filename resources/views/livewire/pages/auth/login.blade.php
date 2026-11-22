<div class="min-h-[80vh] flex items-center justify-center px-4 py-12">
    <div class="card w-full max-w-md bg-base-100 shadow-2xl border border-base-300/80">
        <div class="card-body p-8">
            <!-- Header -->
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4 text-primary text-3xl shadow-inner">
                    <i class='bx bx-time-five'></i>
                </div>
                <h1 class="text-2xl font-extrabold tracking-tight">تسجيل الدخول</h1>
                <p class="text-base-content/60 text-sm mt-1">مرحباً بك مجدداً، يرجى تسجيل الدخول للمتابعة</p>
            </div>

            <!-- Flash Error Message -->
            @if (session('error'))
                <div class="alert alert-error mb-6 text-sm py-3 shadow-sm flex items-center gap-2">
                    <i class='bx bx-error-circle text-lg'></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form wire:submit.prevent="login" class="space-y-4">
                @csrf

                <!-- Email -->
                <div class="form-control w-full">
                    <label class="label text-sm font-semibold" for="email">البريد الإلكتروني</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none text-base-content/50">
                            <i class='bx bx-envelope text-lg'></i>
                        </span>
                        <input type="email" id="email" wire:model="email" placeholder="name@example.com" class="input input-bordered w-full ps-10 @error('email') input-error @enderror" required autofocus />
                    </div>
                    @error('email')
                        <p class="text-xs text-error mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-control w-full">
                    <div class="flex items-center justify-between">
                        <label class="label text-sm font-semibold" for="password">كلمة المرور</label>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none text-base-content/50">
                            <i class='bx bx-lock-alt text-lg'></i>
                        </span>
                        <input type="password" id="password" wire:model="password" placeholder="••••••••" class="input input-bordered w-full ps-10 @error('password') input-error @enderror" required />
                    </div>
                    @error('password')
                        <p class="text-xs text-error mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-full mt-2 shadow-md gap-2">
                    <i class='bx bx-log-in text-lg'></i>
                    <span>دخول</span>
                </button>
            </form>

            <!-- Register Link -->
            <div class="text-center mt-6 pt-6 border-t border-base-200">
                <p class="text-sm text-base-content/70">
                    ليس لديك حساب؟ 
                    <a href="{{ route('register') }}" wire:navigate class="text-primary font-semibold hover:underline ms-1">تسجيل جديد</a>
                </p>
            </div>
        </div>
    </div>
</div>
