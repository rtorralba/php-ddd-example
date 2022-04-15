<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Courses\Domain;

use CodelyTv\Shared\Domain\Criteria\Criteria;

interface BackofficeCourseNotifier
{
    public function notify(string $message): void;
}
