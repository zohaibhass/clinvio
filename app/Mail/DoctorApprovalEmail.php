<?php

namespace App\Mail;

use App\Models\Doctor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class DoctorApprovalEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $doctorName;

    /**
     * Create a new message instance.
     */
    public $doctor;
    public $status;

    public function __construct(Doctor $doctor, $status)
    {
        $this->doctor = $doctor;
        $this->status = $status; // 'approved' or 'rejected'
    }

    public function build()
    {
        if ($this->status === 'approved') {
            return $this->markdown('emails.doctor.approval')
                ->subject('Doctor Approval Email');
        } elseif ($this->status === 'rejected') {
            return $this->markdown('emails.doctor.rejection')
                ->subject('Doctor Rejection Email');
        }
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Doctor Approval Email',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
