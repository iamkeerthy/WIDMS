<?php
declare(strict_types=1);

function sendRegistrationDecisionEmail(string $email, string $name, string $decision): bool
{
    $approved = $decision === 'approved';
    $subject = 'WIDMS registration request ' . ($approved ? 'approved' : 'rejected');
    $message = "Hello {$name},\r\n\r\n";
    $message .= $approved
        ? "Your WIDMS registration request has been approved. You can now sign in using your email address and the password you selected.\r\n"
        : "Your WIDMS registration request has been rejected. Please contact the system administrator if you need more information.\r\n";
    $message .= "\r\nWIDMS Administration";

    $headers = [
        'From: WIDMS <no-reply@widms.local>',
        'Content-Type: text/plain; charset=UTF-8',
    ];

    return @mail($email, $subject, $message, implode("\r\n", $headers));
}
