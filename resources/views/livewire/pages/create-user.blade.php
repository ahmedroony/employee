<div>
    @vite(['resources/css/admin/CreateShift.css'])
    <header class="top-header">
        <div class="header-right">
            <div class="breadcrumb">
                <a href="">إدارة المستخدمين</a>
                <i class='bx bx-chevron-left'></i>
                <span>إضافة مستخدم جديد</span>
            </div>
            <h1>إضافة مستخدم جديد</h1>
            <p>قم بإنشاء حساب مستخدم جديد وتحديد صلاحياته</p>
        </div>
        <div class="header-left">
            <a href="{{ route('admin.users') }}" class="btn btn-outline">إلغاء</a>
            <button type="submit" form="create-user-form" class="btn btn-primary">حفظ المستخدم</button>
        </div>
    </header>
    <div class="form-container">
        <form id="create-user-form" class="premium-form" wire:submit.prevent="store">
            <div class="form-grid">
                <div class="form-section">
                    <div class="section-header">
                        <i class='bx bx-user'></i>
                        <h3>المعلومات الأساسية</h3>
                    </div>
                    <div class="input-group">
                        <label for="user_name">الاسم الكامل</label>
                        <input type="text" id="user_name" wire:model="name" placeholder="مثال: أحمد محمد">
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label for="user_email">البريد الإلكتروني</label>
                        <input type="email" id="user_email" wire:model="email" placeholder="example@email.com">
                        @error('email')
                            <span class="text-danger" style="color:red; font-size:12px">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-section">
                    <div class="section-header">
                        <i class='bx bx-lock-alt'></i>
                        <h3>كلمة المرور</h3>
                    </div>
                    <div class="input-group">
                        <label for="user_password">كلمة المرور</label>
                        <input type="password" id="user_password" wire:model="password" placeholder="8 أحرف على الأقل">
                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label for="user_password_confirmation">تأكيد كلمة المرور</label>
                        <input type="password" id="user_password_confirmation" wire:model="password_confirmation"
                            placeholder="أعد كتابة كلمة المرور">
                    </div>
                </div>
            </div>
            <div class = "input-group">
                <label for="shifts">اختار الشيفت</label>
                <select id="shifts" wire:model="selected_shifts" class="form-control" multiple>
                    <option value="">اختر الشيفت</option>

                    @foreach ($shifts as $shift)
                        <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                    @endforeach
                </select>
                @error('selected_shifts')
                    <span class="text-danger" style="color:red; font-size:12px">{{ $message }}</span>
                @enderror

            </div>
            <div style="margin-top: 20px;">
                <label for="user_type">صلاحية المستخدم</label>
                <select id="user_type" wire:model="user_type_id" class="form-control">
                    <option value="">-- اختر الصلاحية --</option>

                    @foreach ($userTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>

                @error('user_type_id')
                    <span class="text-danger" style="color:red; font-size:12px">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">حفظ المستخدم</button>
            </div>
        </form>
    </div>
</div>
