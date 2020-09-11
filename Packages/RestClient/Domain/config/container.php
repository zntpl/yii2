<?php

return [
    'ZnBundle\RestClient\Domain\Interfaces\Services\BookmarkServiceInterface' => 'ZnBundle\RestClient\Domain\Services\BookmarkService',
    'ZnBundle\RestClient\Domain\Interfaces\Repositories\BookmarkRepositoryInterface' => 'ZnBundle\RestClient\Domain\Repositories\Eloquent\BookmarkRepository',
    'ZnBundle\RestClient\Domain\Interfaces\Services\ProjectServiceInterface' => 'ZnBundle\RestClient\Domain\Services\ProjectService',
    'ZnBundle\RestClient\Domain\Interfaces\Repositories\ProjectRepositoryInterface' => 'ZnBundle\RestClient\Domain\Repositories\Eloquent\ProjectRepository',
    'ZnBundle\RestClient\Domain\Interfaces\Repositories\AccessRepositoryInterface' => 'ZnBundle\RestClient\Domain\Repositories\Eloquent\AccessRepository',
    'ZnBundle\RestClient\Domain\Interfaces\Services\AccessServiceInterface' => 'ZnBundle\RestClient\Domain\Services\AccessService',
    'ZnBundle\RestClient\Domain\Interfaces\Services\TransportServiceInterface' => 'ZnBundle\RestClient\Domain\Services\TransportService',
    'ZnBundle\RestClient\Domain\Interfaces\Services\AuthorizationServiceInterface' => 'ZnBundle\RestClient\Domain\Services\AuthorizationService',
    'ZnBundle\RestClient\Domain\Interfaces\Repositories\AuthorizationRepositoryInterface' => 'ZnBundle\RestClient\Domain\Repositories\Eloquent\AuthorizationRepository',
    'ZnBundle\RestClient\Domain\Interfaces\Services\EnvironmentServiceInterface' => 'ZnBundle\RestClient\Domain\Services\EnvironmentService',
    'ZnBundle\RestClient\Domain\Interfaces\Repositories\EnvironmentRepositoryInterface' => 'ZnBundle\RestClient\Domain\Repositories\Eloquent\EnvironmentRepository',
];