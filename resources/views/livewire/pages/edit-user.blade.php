<div>
    @vite(['resources/css/admin/CreateShift.css'])
    <header class="top-header">
        <div class="header-right">
            <div class="breadcrumb">
                <a href="{{ route('admin.users') }}">إدارة المستخدمين</a>
                <i class='bx bx-chevron-left'></i>
                <span>تعديل بيانات المستخدم</span>
            </div>
            <h1>تعديل مستخدم</h1>
            <p>قم بتعديل بيانات المستخدم</p>
        </div>
        <div class="header-left">
            <a href="{{ route('admin.users') }}" class="btn btn-outline">إلغاء</a>
            <button type="submit" form="edit-user-form" class="btn btn-primary">حفظ التعديلات</button>
        </div>
    </header>
    <div class="form-container">
        <form id="edit-user-form" class="premium-form" wire:submit.prevent="edituser">
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
                            <span class="text-danger" style="color:red; font-size:12px">{{ $message }}</span>
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
                        <h3>كلمة المرور (اختياري)</h3>
                    </div>
                    <div class="input-group">
                        <label for="user_password">كلمة المرور الجديدة</label>
                        <input type="password" id="user_password" wire:model="password" placeholder="اتركه فارغاً إذا لم ترد تغييره">
                        @error('password')
                            <span class="text-danger" style="color:red; font-size:12px">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-actions" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
            </div>
        </form>
    </div>
</div>
