<div class="space-y-6 max-w-4xl mx-auto">
    <!-- Header with Breadcrumbs -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-5 border-b border-base-300">
        <div>
            <div class="breadcrumbs text-xs text-base-content/60 mb-1">
                <ul>
                    <li><a href="{{ route('admin.shifts') }}" wire:navigate>إدارة الشفتات</a></li>
                    <li class="font-semibold text-primary">المستخدمين في الشفت</li>
                </ul>
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight">تفاصيل الشفت: {{ $shift->name }}</h1>
            <p class="text-base-content/60 text-sm mt-1">المستخدمين المسجلين في هذا الشفت حالياً</p>
        </div>
        <div>
            <a href="{{ route('admin.shifts') }}" wire:navigate class="btn btn-outline btn-sm">
                <i class='bx bx-arrow-back text-base'></i> العودة
            </a>
        </div>
    </div>

    <!-- Users Table Card -->
    <div class="card bg-base-100 shadow-sm border border-base-300">
        <div class="card-body p-0">
            <div class="p-6 border-b border-base-200">
                <h2 class="card-title text-lg font-bold">قائمة الموظفين في هذا الشفت</h2>
            </div>
            
            <div class="overflow-x-auto w-full">
                @if($shift->users->count() > 0)
                    <table class="table table-zebra table-md w-full">
                        <thead>
                            <tr class="bg-base-200/50 text-base-content/75 font-semibold text-sm">
                                <th class="w-16">ID</th>
                                <th>الاسم</th>
                                <th>البريد الإلكتروني</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shift->users as $user)
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-8 text-center text-base-content/50 space-y-2">
                        <i class='bx bx-group text-4xl block opacity-40'></i>
                        <p class="font-medium">لا يوجد مستخدمين مسجلين في هذا الشفت حالياً.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
