<div class="bg-zinc-50 min-h-screen p-6 flex items-center justify-center">

    <div class="card bg-white shadow-sm border border-zinc-200 p-6 w-full max-w-md">

        <div class="flex justify-center items-center gap-3 my-6 text-zinc-800">
            <div class="hour text-4xl font-bold font-mono">18</div>
            <div class="text-2xl font-bold text-zinc-300">:</div>
            <div class="minute text-4xl font-bold font-mono">42</div>
            <div class="text-2xl font-bold text-zinc-300">:</div>
            <div class="second text-4xl font-bold font-mono">32</div>

        </div>
        <div class="display-the-day flex flex-col items-center text-sm text-zinc-500">
            <span id="dayname" class="font-bold text-zinc-800">الجمعة</span>
        </div>
        <div class="space-y-3 my-4 border-t border-zinc-100 pt-4 text-sm text-zinc-600">
            <div class="flex justify-between items-center">
                <span>⏱️ مدة العمل الحالي:</span>
                <span id="display" data-start="{{ $login_time }}"
                    class="font-semibold text-zinc-800">00:00:00:00</span>
            </div>
            <div class="flex justify-between items-center">
                <span>📅 بدأ الشفت:</span>
                <span id="start-time" class="font-semibold text-zinc-800">{{ $login_time }}</span>
            </div>
        </div>

        <div class="flex gap-4 mt-6">
            <button wire:click="startShift" class="btn btn-success flex-1 text-white gap-2" onclick="start()">
                <span>بدء العمل</span> ✅
            </button>
            <button wire:click="endShift" class="btn btn-error flex-1 text-white gap-2" onclick="end()">
                <span>إنهاء العمل</span> ❌
            </button>
        </div>

    </div>
    <div class="bg-blue-50/60 rounded-2xl p-5 border border-blue-100 flex justify-between items-center text-right">
        <div class="flex flex-col gap-1 text-right">
            <span class="text-xs text-blue-500 font-bold">شفتك اليوم</span>
            <h3 class="text-base font-bold text-zinc-800">
                @foreach ($shifts as $shift)
                    {{ $shift->name }}
                @endforeach
            </h3>
            <p class="text-xs text-zinc-500">
                <span>بدايه الشيفت</span> {{ $officaltimeshift?->start_time }}
                ->
                <span>نهايه الشيفت</span> {{ $officaltimeshift?->end_time }}
            </p>
        </div>
        <h2 class="shift-day">شفتك اليوم</h2>
        @foreach ($shifts as $shift)
            <p>{{ $shift->name }}</p>
        @endforeach
    </div>
</div>
</div>
</div>
