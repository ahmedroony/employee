<div>
    @vite(['resources/css/admin/shifts.css'])

    <header class="top-header">
    <div class="header-right">
        <p>{{ $shifts->count() }} شفتات نشطة —  عدد الموظفين {{ $shifts->sum('users_count') }}</p>
    </div>

<div class="header-left">
    <a href="{{ route('admin.shifts.create') }}" wire:navigate class="btn btn-primary"><i class='bx bx-plus'></i>
        شفت جديد</a>
</div>
</header>

<div class="shifts-grid">
    @foreach ($shifts as $shift)
        <div class="shift-card border-blue">
            <div class="shift-header">
                <div class="shift-title">
                    {{ $shift->name }}
                </div>
            </div>

            <div class="shift-time-info">
                <span class="shift-time-label">بداية</span>
                <span
                    class="shift-time-value text-green">{{ \Carbon\Carbon::parse($shift->start_time)->format('H:i') }}</span>
            </div>
            <div class="shift-time-info">
                <span class="shift-time-label">نهاية</span>
                <span
                    class="shift-time-value text-red">{{ \Carbon\Carbon::parse($shift->end_time)->format('H:i') }}</span>
            </div>

            <div class="shift-divider"></div>

            <div class="shift-stats">
                <div class="shift-stats-right">
                    <div>
                        <span>{{ $shift->users_count }}
                        </span> موظف
                    </div>
                    <div><span>{{ $shift->minstime() }}</span> ساعات عمل</div>
                </div>
            </div>

            <div class="shift-actions">
                <a href="{{ route('admin.shifts.showusersshift', $shift->id) }}" class="btn btn-outline"><i
                        class='bx bx-group'></i> الموظفين</a>
                <a href="{{ route('admin.shifts.edit', $shift->id) }}" wire:navigate class="btn btn-blue"
                    class="btn btn-blue"><i class='bx bx-pencil'></i> تعديل</a>
                <button wire:click="deleteShift({{ $shift->id }})"><i class='bx bx-trash'></i>
                    حذف</button>
            </div>
        </div>
    @endforeach

    <!-- Add New Shift Card -->
    <a href="{{ route('admin.shifts.create') }}" wire:navigate class="shift-card dashed-card">
        <i class='bx bx-plus'></i>
        <span>إضافة شفت جديد</span>
    </a>
</div>
</div>
