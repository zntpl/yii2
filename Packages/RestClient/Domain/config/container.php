<?php

return [
    'Packages\RestClient\Domain\Interfaces\Services\BookmarkServiceInterface' => 'Packages\RestClient\Domain\Services\BookmarkService',
    'Packages\RestClient\Domain\Interfaces\Repositories\BookmarkRepositoryInterface' => 'Packages\RestClient\Domain\Repositories\Eloquent\BookmarkRepository',
    'Packages\RestClient\Domain\Interfaces\Services\ProjectServiceInterface' => 'Packages\RestClient\Domain\Services\ProjectService',
    'Packages\RestClient\Domain\Interfaces\Repositories\ProjectRepositoryInterface' => 'Packages\RestClient\Domain\Repositories\Eloquent\ProjectRepository',
    'Packages\RestClient\Domain\Interfaces\Repositories\AccessRepositoryInterface' => 'Packages\RestClient\Domain\Repositories\Eloquent\AccessRepository',
    'Packages\RestClient\Domain\Interfaces\Services\AccessServiceInterface' => 'Packages\RestClient\Domain\Services\AccessService',
    'Packages\RestClient\Domain\Interfaces\Services\TransportServiceInterface' => 'Packages\RestClient\Domain\Services\TransportService',
    'Packages\RestClient\Domain\Interfaces\Services\AuthorizationServiceInterface' => 'Packages\RestClient\Domain\Services\AuthorizationService',
    'Packages\RestClient\Domain\Interfaces\Repositories\AuthorizationRepositoryInterface' => 'Packages\RestClient\Domain\Repositories\Eloquent\AuthorizationRepository',
    'Packages\RestClient\Domain\Interfaces\Services\EnvironmentServiceInterface' => 'Packages\RestClient\Domain\Services\EnvironmentService',
    'Packages\RestClient\Domain\Interfaces\Repositories\EnvironmentRepositoryInterface' => 'Packages\RestClient\Domain\Repositories\Eloquent\EnvironmentRepository',
];