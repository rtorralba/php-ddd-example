<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Courses\Application\Create;

use CodelyTv\Backoffice\Courses\Domain\BackofficeCourseRepository;
use CodelyTv\Shared\Domain\Criteria\Criteria;
use CodelyTv\Shared\Domain\Criteria\Filter;
use CodelyTv\Shared\Domain\Criteria\FilterField;
use CodelyTv\Shared\Domain\Criteria\FilterOperator;
use CodelyTv\Shared\Domain\Criteria\Filters;
use CodelyTv\Shared\Domain\Criteria\FilterValue;
use CodelyTv\Shared\Domain\Criteria\Order;
use CodelyTv\Shared\Domain\Criteria\OrderBy;
use CodelyTv\Shared\Domain\Criteria\OrderType;
use CodelyTv\Backoffice\Courses\Domain\BackofficeCourse;

final class BackofficeCourseNameUpdater
{
    public function __construct(private BackofficeCourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update(string $id, string $name): void
    {

        $video = $this->getVideo($id);
        $this->repository->save($video);
    }

    private function getVideo(string $id): BackofficeCourse
    {
        $filter = new Filter(
            new FilterField('id'),
            new FilterOperator('='),
            new FilterValue($id)
        );
        $filters = new Filters([$filter]);
        $criteria = new Criteria(
            $filters,
            new Order(new OrderBy('id'), new OrderType('asc')),
            0,
            1
        );
        return $this->repository->matching($criteria)[0];
    }
}
