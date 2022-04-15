<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Courses\Infrastructure\Notify;

use CodelyTv\Backoffice\Courses\Domain\BackofficeCourseNotifier;

class EmailBackofficeCourse implements BackofficeCourseNotifier
{
    private $to;
    private $subject;

    public function __construct($to, $subject)
    {
        $this->to = $to;
        $this->subject = $subject;
    }

    public function notify(string $message): void
    {
        // TODO: code that sends an email
    }
}
