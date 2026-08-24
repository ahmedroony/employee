<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-5 border-b border-base-300">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight">إدارة المستخدمين</h1>
            <p class="text-base-content/60 text-sm mt-1">قائمة بجميع المستخدمين المسجلين في النظام</p>
        </div>
        <div>
            <a href="{{ route('admin.users.create') }}" wire:navigate class="btn btn-primary btn-sm">
                <i class='bx bx-plus text-base'></i> مستخدم جديد
            </a>
        </div>
    </div>

    <!-- Session Alerts -->
    @if (session()->has('success'))
        <div class="alert alert-success shadow-sm">
            <i class='bx bx-check-circle text-xl'></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-error shadow-sm">
            <i class='bx bx-error-circle text-xl'></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <!-- Users Table Card -->
    <div class="card bg-base-100 shadow-sm border border-base-300">
        <div class="overflow-x-auto w-full">
            <table class="table table-zebra table-md w-full">
                <thead>
                    <tr class="bg-base-200/50 text-base-content/75 font-semibold text-sm">
                        <th class="w-16">ID</th>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>تاريخ الإنشاء</th>
                        <th class="w-40 text-left">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="hover:bg-base-200/30 transition-colors">
                            <td class="font-semibold text-base-content/60">#{{ $user->id }}</td>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar placeholder">
                                        <div class="bg-primary/10 text-primary rounded-full w-10 h-10 flex items-center justify-center font-bold">
                                            <span>{{ Str::limit($user->name, 1, '') }}</span>
                                        </div>
                                    </div>
                                    <span class="font-bold text-sm text-base-content">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="text-sm font-medium text-base-content/80">{{ $user->email }}</td>
                            <td class="text-sm text-base-content/60">{{ $user->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="flex items-center justify-start gap-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" wire:navigate class="btn btn-ghost btn-xs text-primary font-semibold hover:bg-primary/10">
                                        <i class='bx bx-pencil text-sm'></i> تعديل
                                    </a>
                                    <button wire:click="delete({{ $user->id }})"
                                        wire:confirm="هل أنت متأكد من حذف هذا المستخدم؟" class="btn btn-ghost btn-xs text-error font-semibold hover:bg-error/10">
                                        <i class='bx bx-trash text-sm'></i> حذف
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

