<div class="min-h-[80vh] flex items-center justify-center px-4 py-12">
    <div class="card w-full max-w-md bg-base-100 shadow-2xl border border-base-300/80">
        <div class="card-body p-8">
            <!-- Header -->
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4 text-primary text-3xl shadow-inner">
                    <i class='bx bx-user-plus'></i>
                </div>
                <h1 class="text-2xl font-extrabold tracking-tight">تسجيل حساب جديد</h1>
                <p class="text-base-content/60 text-sm mt-1">أنشئ حساباً جديداً للبدء في إدارة وقت العمل</p>
            </div>

            <!-- Flash Error Message -->
            @if (session('error'))
                <div class="alert alert-error mb-6 text-sm py-3 shadow-sm flex items-center gap-2">
                    <i class='bx bx-error-circle text-lg'></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form wire:submit.prevent="storeuser" class="space-y-4">
                @csrf

                <!-- Name -->
                <div class="form-control w-full">
                    <label class="label text-sm font-semibold" for="name">الاسم الكامل</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none text-base-content/50">
                            <i class='bx bx-user text-lg'></i>
                        </span>
                        <input type="text" id="name" wire:model="name" placeholder="أحمد محمد" class="input input-bordered w-full ps-10 @error('name') input-error @enderror" required autofocus />
                    </div>
                    @error('name')
                        <p class="text-xs text-error mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-control w-full">
                    <label class="label text-sm font-semibold" for="email">البريد الإلكتروني</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none text-base-content/50">
                            <i class='bx bx-envelope text-lg'></i>
                        </span>
                        <input type="email" id="email" wire:model="email" placeholder="name@example.com" class="input input-bordered w-full ps-10 @error('email') input-error @enderror" required />
                    </div>
                    @error('email')
                        <p class="text-xs text-error mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-control w-full">
                    <label class="label text-sm font-semibold" for="password">كلمة المرور</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none text-base-content/50">
                            <i class='bx bx-lock-alt text-lg'></i>
                        </span>
                        <input type="password" id="password" wire:model="password" placeholder="8 أحرف على الأقل" class="input input-bordered w-full ps-10 @error('password') input-error @enderror" required />
                    </div>
                    @error('password')
                        <p class="text-xs text-error mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                @guest
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-full mt-2 shadow-md gap-2">
                        <i class='bx bx-user-check text-lg'></i>
                        <span>تسجيل حساب</span>
                    </button>
                @endguest
            </form>

            <!-- Login Link -->
            <div class="text-center mt-6 pt-6 border-t border-base-200">
                <p class="text-sm text-base-content/70">
                    لديك حساب بالفعل؟ 
                    <a href="{{ route('login') }}" wire:navigate class="text-primary font-semibold hover:underline ms-1">تسجيل الدخول</a>
                </p>
            </div>
        </div>
    </div>
</div>
