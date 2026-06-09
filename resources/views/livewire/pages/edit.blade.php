<div>
    @vite(['resources/css/admin/CreateShift.css'])

    <header class="top-header">
        <div class="header-right">
            <div class="breadcrumb">
                <a href="{{ route('admin.shifts') }}">إدارة الشفتات</a>
                <i class='bx bx-chevron-left'></i>
                <span>تعديل الشفت</span>
            </div>
            <h1>تعديل الشفت: {{ $name }}</h1>
        </div>
        <div class="header-left">
            <a href="{{ route('admin.shifts') }}" class="btn btn-outline">إلغاء</a>
            <button type="submit" form="edit-shift-form" class="btn btn-primary">تحديث الشفت</button>
        </div>
    </header>

    <div class="form-container">
        <form id="edit-shift-form" class="premium-form" wire:submit="update">
            <div class="form-grid">
                <div class="form-section">
                    <div class="section-header">
                        <i class='bx bx-info-circle'></i>
                        <h3>المعلومات الأساسية</h3>
                    </div>

                    <div class="input-group">
                        <label for="shift_name">اسم الشفت</label>
                        <input type="text" id="shift_name" wire:model="name" required>
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-row">
                        <div class="input-group">
                            <label for="start_time">وقت البدء</label>
                            <div class="time-input-wrapper">
                                <i class='bx bx-time'></i>
                                <input type="time" id="start_time" wire:model="start_time" required>
                            </div>
                            @error('start_time')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <label for="end_time">وقت النهاية</label>
                            <div class="time-input-wrapper">
                                <i class='bx bx-time'></i>
                                <input type="time" id="end_time" wire:model="end_time" required>
                            </div>
                            @error('end_time')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
