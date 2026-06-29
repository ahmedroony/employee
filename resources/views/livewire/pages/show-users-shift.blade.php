<div>
    <h2>تفاصيل الشفت رقم: {{ $shift->id }}</h2>

    <h3>المستخدمين (العملاء) في الشفت ده:</h3>

    @if($shift->users->count() > 0)
        <ul>
            @foreach($shift->users as $user)
                <li>
                    {{ $user->name }} - {{ $user->email }}
                </li>
            @endforeach
        </ul>
    @else
        <p>مفيش مستخدمين متسجلين في الشفت ده حالياً.</p>
    @endif
</div>
