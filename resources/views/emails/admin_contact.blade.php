<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>New Contact Form Submission</h2>
    <p>You have received a new message from the website contact form.</p>
    
    <table border="0" cellpadding="5" cellspacing="0" style="margin-bottom: 20px;">
        <tr>
            <td><strong>Name:</strong></td>
            <td>{{ $contact->name }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $contact->email }}</td>
        </tr>
        <tr>
            <td><strong>Phone:</strong></td>
            <td>{{ $contact->phone ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Subject:</strong></td>
            <td>{{ $contact->subject ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Date:</strong></td>
            <td>{{ $contact->created_at->format('M d, Y h:i A') }}</td>
        </tr>
    </table>
    
    <h3>Message:</h3>
    <div style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #dc2626;">
        {!! nl2br(e($contact->message)) !!}
    </div>
    
    <p style="margin-top: 30px; font-size: 0.9em; color: #777;">
        This email was sent automatically from the London Elite Trades website.
    </p>
</body>
</html>
