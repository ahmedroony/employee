<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-5 border-b border-base-300">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight">إدارة الشفتات</h1>
            <p class="text-base-content/60 text-sm mt-1">
                {{ $shifts->count() }} شفتات نشطة — عدد الموظفين الإجمالي {{ $shifts->sum('users_count') }}
            </p>
        </div>
        <div>
            <a href="{{ route('admin.shifts.create') }}" wire:navigate class="btn btn-primary btn-sm">
                <i class='bx bx-plus text-base'></i> شفت جديد
            </a>
        </div>
    </div>

    <!-- Shifts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($shifts as $shift)
            <div class="card bg-base-100 shadow-sm border border-base-300 hover:shadow-md transition-shadow">
                <div class="card-body p-6 space-y-4">
                    <div class="flex justify-between items-start">
                        <h2 class="card-title text-lg font-bold text-primary">{{ $shift->name }}</h2>
                        <div class="badge badge-primary badge-outline font-semibold text-xs">{{ $shift->minstime() }} ساعات عمل</div>
                    </div>

                    <div class="flex items-center justify-between text-sm py-2 px-3 bg-base-200/50 rounded-lg">
                        <div class="flex flex-col items-center">
                            <span class="text-xs text-base-content/50 mb-0.5">البدء</span>
                            <span class="font-bold text-success text-base">{{ \Carbon\Carbon::parse($shift->start_time)->format('H:i') }}</span>
                        </div>
                        <div class="w-[1px] h-8 bg-base-300"></div>
                        <div class="flex flex-col items-center">
                            <span class="text-xs text-base-content/50 mb-0.5">النهاية</span>
                            <span class="font-bold text-error text-base">{{ \Carbon\Carbon::parse($shift->end_time)->format('H:i') }}</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-xs text-base-content/60 pt-2 border-t border-base-200">
                        <span class="flex items-center gap-1"><i class='bx bx-group text-sm'></i> {{ $shift->users_count }} موظف مسجل</span>
                    </div>

                    <div class="card-actions justify-end gap-2 pt-2">
                        <a href="{{ route('admin.shifts.showusersshift', $shift->id) }}" class="btn btn-outline btn-xs font-semibold" wire:navigate>
                            <i class='bx bx-group text-xs'></i> الموظفين
                        </a>
                        <a href="{{ route('admin.shifts.edit', $shift->id) }}" wire:navigate class="btn btn-ghost text-primary btn-xs font-semibold hover:bg-primary/10">
                            <i class='bx bx-pencil text-xs'></i> تعديل
                        </a>
                        <button wire:click="deleteShift({{ $shift->id }})" wire:confirm="هل أنت متأكد من حذف هذا الشفت؟" class="btn btn-ghost text-error btn-xs font-semibold hover:bg-error/10">
                            <i class='bx bx-trash text-xs'></i> حذف
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Add New Shift Card -->
        <a href="{{ route('admin.shifts.create') }}" wire:navigate class="card border-2 border-dashed border-base-300 hover:border-primary/50 transition-all flex flex-col items-center justify-center p-8 text-center gap-2 min-h-[220px] bg-base-100/50 hover:bg-base-100 group">
            <div class="p-3 bg-base-200 text-base-content/60 rounded-full group-hover:bg-primary/10 group-hover:text-primary transition-all">
                <i class='bx bx-plus text-3xl'></i>
            </div>
            <span class="font-bold text-base-content/70 text-sm">إضافة شفت جديد</span>
        </a>
    </div>
</div>
