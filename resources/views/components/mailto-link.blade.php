@if (Str::contains($email, '@'))
    {{ Html::mailto(trim($email)) }}
@else
    {{ $email }}
@endif