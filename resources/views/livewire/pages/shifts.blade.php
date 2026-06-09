<div>
    @vite(['resources/css/admin/shifts.css'])

    <header class="top-header">
        <div class="header-right">
            <h1>إدارة الشفتات</h1>
            <p>3 شفتات نشطة — 24 موظف مُعيّن</p>
        </div>
        <div class="header-left">
            <a href="{{ route('admin.shifts.create') }}" wire:navigate class="btn btn-primary"><i class='bx bx-plus'></i>
                شفت جديد</a>
        </div>
    </header>

    <!-- Shifts Grid -->
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
                        <div><span>12</span> موظف</div>
                        <div><span>{{ $shift->minstime() }}</span> ساعات عمل</div>
                    </div>
                </div>

                <div class="shift-actions">
                    <button class="btn btn-outline"><i class='bx bx-group'></i> الموظفين</button>
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

    <!-- Overtime Rules -->
    <div class="rules-section">
        <div class="rules-header">
            <i class='bx bxs-cog'></i> قواعد الأوفرتايم العامة
        </div>

        <div class="rules-list">
            <div class="rule-item">
                <span class="rule-label">الحساب يبدأ بعد نهاية الشفت بـ</span>
                <div class="rule-value">
                    <strong>0 دقيقة</strong>
                    <span class="badge-active">نشط</span>
                </div>
            </div>

            <div class="rule-item">
                <span class="rule-label">الحد الأقصى للأوفرتايم اليومي</span>
                <div class="rule-value">
                    <strong>4 ساعات</strong>
                    <span class="badge-active">نشط</span>
                </div>
            </div>

            <div class="rule-item">
                <span class="rule-label">الأوفرتايم في الإجازات</span>
                <div class="rule-value">
                    <strong>2.0x</strong>
                    <span class="badge-active">نشط</span>
                </div>
            </div>
        </div>
    </div>
</div>
