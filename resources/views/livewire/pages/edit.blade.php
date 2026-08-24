<div class="space-y-6 max-w-2xl mx-auto">
    <!-- Header with Breadcrumbs -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-5 border-b border-base-300">
        <div>
            <div class="breadcrumbs text-xs text-base-content/60 mb-1">
                <ul>
                    <li><a href="{{ route('admin.shifts') }}" wire:navigate>إدارة الشفتات</a></li>
                    <li class="font-semibold text-primary">تعديل الشفت</li>
                </ul>
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight">تعديل الشفت: {{ $name }}</h1>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.shifts') }}" wire:navigate class="btn btn-outline btn-sm">إلغاء</a>
            <button type="submit" form="edit-shift-form" class="btn btn-primary btn-sm">تحديث الشفت</button>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card bg-base-100 shadow-sm border border-base-300">
        <div class="card-body p-6 sm:p-8">
            <form id="edit-shift-form" wire:submit="update" class="space-y-6">
                <fieldset class="fieldset bg-base-200/40 border border-base-300 rounded-xl p-5 space-y-4">
                    <legend class="fieldset-legend font-bold text-base-content flex items-center gap-1.5 px-2">
                        <i class='bx bx-info-circle text-lg text-primary'></i> المعلومات الأساسية
                    </legend>

                    <div class="w-full">
                        <label class="label text-sm font-semibold" for="shift_name">اسم الشفت</label>
                        <input type="text" id="shift_name" wire:model="name" required class="input input-bordered w-full @error('name') input-error @enderror" />
                        @error('name')
                            <p class="text-xs text-error mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full">
                        <div class="form-control">
                            <label class="label text-sm font-semibold" for="start_time">وقت البدء</label>
                            <input type="time" id="start_time" wire:model="start_time" required class="input input-bordered w-full @error('start_time') input-error @enderror" />
                            @error('start_time')
                                <p class="text-xs text-error mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label text-sm font-semibold" for="end_time">وقت النهاية</label>
                            <input type="time" id="end_time" wire:model="end_time" required class="input input-bordered w-full @error('end_time') input-error @enderror" />
                            @error('end_time')
                                <p class="text-xs text-error mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <!-- Form Actions -->
                <div class="flex justify-end gap-3 pt-4 border-t border-base-200">
                    <a href="{{ route('admin.shifts') }}" wire:navigate class="btn btn-ghost btn-sm">إلغاء</a>
                    <button type="submit" class="btn btn-primary btn-sm">تحديث الشفت</button>
                </div>
            </form>
        </div>
    </div>
</div>
