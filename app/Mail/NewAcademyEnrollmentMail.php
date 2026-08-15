<?php

namespace App\Mail;

use App\Models\AcademyEnrollmentCms;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAcademyEnrollmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $enrollment;

    public function __construct(AcademyEnrollmentCms $enrollment)
    {
        $this->enrollment = $enrollment;
    }

    public function build()
    {
        return $this
            ->subject('New Academy Enrollment Application')
            ->view('emails.academy.new-enrollment');
    }
}