<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Tenant;

class NewTenantPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $tenant;
    public $password;

    /**
     * Create a new message instance.
     *
     * @param Tenant $tenant
     * @param string $password
     */

    public function __construct(Tenant $tenant, $password)
    {
        $this->tenant = $tenant;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Tenant Password',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.new_tenant_password',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->markdown('emails.new_tenant_password')
            ->subject('Your New Tenant Password');
    }
}
