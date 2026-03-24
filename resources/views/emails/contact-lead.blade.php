@php
    $contactName = $contact->name ?? 'Unknown';
@endphp

<div style="font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial;">
    <h2 style="margin:0 0 12px 0;">New contact lead: {{ $contactName }}</h2>

    <div style="margin:0 0 10px 0;">
        <strong>Name:</strong> {{ $contact->name ?? 'N/A' }}
    </div>
    <div style="margin:0 0 10px 0;">
        <strong>Email:</strong> {{ $contact->email ?? 'N/A' }}
    </div>
    <div style="margin:0 0 10px 0;">
        <strong>Phone:</strong> {{ $contact->phone ?? 'N/A' }}
    </div>
    <div style="margin:0 0 10px 0;">
        <strong>Message:</strong>
        <div style="white-space: pre-wrap; margin-top:6px;">{{ $contact->message ?? '' }}</div>
    </div>

    <div style="color:#666; font-size:12px; margin-top:16px;">
        Received {{ $contact->created_at?->toDateTimeString() ?? '' }}
    </div>
</div>

