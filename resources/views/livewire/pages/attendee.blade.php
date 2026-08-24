<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-5 border-b border-base-300">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight">سجلات الحضور</h1>
            <p class="text-base-content/60 text-sm mt-1">سجلات حضور وانصراف الموظفين في النظام</p>
        </div>
        <input type="text"
        wire:model.live="search"
        placeholder="ابحث باسم الموظف..."
        class="input input-bordered w-full max-w-xs">
    </div>

    <!-- Attendance Table Card -->
    <div class="card bg-base-100 shadow-sm border border-base-300">
        <div class="overflow-x-auto w-full">
            <table class="table table-zebra table-md w-full">
                <thead>
                    <tr class="bg-base-200/50 text-base-content/75 font-semibold text-sm">
                        <th class="w-16">ID</th>
                        <th>اسم الموظف</th>
                        <th>وقت تسجيل الدخول</th>
                        <th>وقت تسجيل الخروج</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr class="hover:bg-base-200/30 transition-colors">
                            <td class="font-semibold text-base-content/60">#{{ $log->id }}</td>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar placeholder">
                                        <div
                                            class="bg-primary/10 text-primary rounded-full w-10 h-10 flex items-center justify-center font-bold">
                                            <span>{{ $log->user->name }}</span>
                                        </div>
                                    </div>
                                    <span
                                        class="font-bold text-sm text-base-content">{{ $log->user->name ?? '' }}</span>
                                </div>
                            </td>
                            <td class="text-sm font-medium text-base-content/80">
                                {{ $log->login_time }}
                            </td>
                            <td class="text-sm font-medium text-base-content/80">
                                {{ $log->logout_time ?? '—' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
