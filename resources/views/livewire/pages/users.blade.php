<div>
    @vite(['resources/css/admin/users.css'])
    <header class="top-header">
        <div class="header-right">
            <h1>إدارة المستخدمين</h1>
            <p>قائمة بجميع المستخدمين المسجلين في النظام</p>
        </div>
        <div class="header-left">
            <a href="{{ route('admin.users.create') }}" wire:navigate class="btn btn-primary">
                <i class='bx bx-plus'></i> مستخدم جديد
            </a>
        </div>
    </header>
    @if (session()->has('success'))
        <div class="alert alert-success">
            <i class='bx bx-check-circle'></i> {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-error">
            <i class='bx bx-error-circle'></i> {{ session('error') }}
        </div>
    @endif
    <div class="users-table-wrapper">
        <table class="users-table">
            <thead>
                    <tr>
                        <th>id:</th>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>تاريخ الإنشاء</th>
                        <th>الإجراءات</th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <div class="user-name-cell">
                                <div class="user-avatar">{{ Str::limit($user->name, 1, '') }}</div>
                                <span>{{ $user->name }}</span>
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.users.edit', $user->id) }}" wire:navigate class="btn btn-blue btn-sm">
                                    <i class='bx bx-pencil'></i> تعديل
                                </a>
                                <button wire:click="delete({{ $user->id }})"
                                    wire:confirm="هل أنت متأكد من حذف هذا المستخدم؟" class="btn btn-danger btn-sm">
                                    <i class='bx bx-trash'></i> حذف
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
