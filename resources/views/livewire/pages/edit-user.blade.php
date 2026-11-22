<div class="space-y-6 max-w-4xl mx-auto">
    <!-- Header with Breadcrumbs -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-5 border-b border-base-300">
        <div>
            <div class="breadcrumbs text-xs text-base-content/60 mb-1">
                <ul>
                    <li><a href="{{ route('admin.users') }}" wire:navigate>إدارة المستخدمين</a></li>
                    <li class="font-semibold text-primary">تعديل بيانات المستخدم</li>
                </ul>
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight">تعديل مستخدم</h1>
            <p class="text-base-content/60 text-sm mt-1">قم بتعديل بيانات المستخدم الحالي</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.users') }}" wire:navigate class="btn btn-outline btn-sm">إلغاء</a>
            <button type="submit" form="edit-user-form" class="btn btn-primary btn-sm">حفظ التعديلات</button>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card bg-base-100 shadow-sm border border-base-300">
        <div class="card-body p-6 sm:p-8">
            <form id="edit-user-form" wire:submit.prevent="edituser" class="space-y-6">
                <!-- Grid section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Basic Info -->
                    <fieldset class="fieldset bg-base-200/40 border border-base-300 rounded-xl p-5 space-y-4">
                        <legend class="fieldset-legend font-bold text-base-content flex items-center gap-1.5 px-2">
                            <i class='bx bx-user text-lg text-primary'></i> المعلومات الأساسية
                        </legend>

                        <div class="w-full">
                            <label class="label text-sm font-semibold" for="user_name">الاسم الكامل</label>
                            <input type="text" id="user_name" wire:model="name" placeholder="مثال: أحمد محمد" class="input input-bordered w-full @error('name') input-error @enderror" />
                            @error('name')
                                <p class="text-xs text-error mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label class="label text-sm font-semibold" for="user_email">البريد الإلكتروني</label>
                            <input type="email" id="user_email" wire:model="email" placeholder="example@email.com" class="input input-bordered w-full @error('email') input-error @enderror" />
                            @error('email')
                                <p class="text-xs text-error mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>

                    <!-- Password Info -->
                    <fieldset class="fieldset bg-base-200/40 border border-base-300 rounded-xl p-5 space-y-4">
                        <legend class="fieldset-legend font-bold text-base-content flex items-center gap-1.5 px-2">
                            <i class='bx bx-lock-alt text-lg text-primary'></i> كلمة المرور (اختياري)
                        </legend>

                        <div class="w-full">
                            <label class="label text-sm font-semibold" for="user_password">كلمة المرور الجديدة</label>
                            <input type="password" id="user_password" wire:model="password" placeholder="اتركه فارغاً إذا لم ترد تغييره" class="input input-bordered w-full @error('password') input-error @enderror" />
                            @error('password')
                                <p class="text-xs text-error mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>

                </div>

                <!-- Form Actions -->
                <div class="flex justify-end gap-3 pt-4 border-t border-base-200">
                    <a href="{{ route('admin.users') }}" wire:navigate class="btn btn-ghost btn-sm">إلغاء</a>
                    <button type="submit" class="btn btn-primary btn-sm">حفظ التعديلات</button>
                </div>
            </form>
        </div>
    </div>
</div>
