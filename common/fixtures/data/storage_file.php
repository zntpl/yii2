<?php

use PhpBundle\Crypt\Domain\Enums\HashAlgoEnum;
use PhpLab\Eloquent\Fixture\Helpers\FixtureFactoryHelper;

class StorageFileFixture extends \PhpLab\Eloquent\Fixture\Libs\DataFixture {

    public function deps()
    {
        return [
            'storage_service',
        ];
    }

    public function load()
    {
        $fixture = new FixtureFactoryHelper;
        $fixture->setCount(200);
        $fixture->setCallback(function ($index, FixtureFactoryHelper $fixtureFactory) {
            return [
                'id' => $index,
                'service_id' => $fixtureFactory->ordIndex($index, 4),
                'entity_id' => $fixtureFactory->ordIndex($index, 5),
                'editor_id' => $fixtureFactory->ordIndex($index, 10),
                'hash' => hash(HashAlgoEnum::CRC32B, $index),
                'extension' => $fixtureFactory->ordIndex($index, 2) == 1 ? 'png' : 'jpg',
                'size' =>  $fixtureFactory->ordIndex($index, 11) * 3979 + $index * 13,
                'name' => 'file ' . $index,
                'description' => 'file ' . $index . ' description',
                'status' => 1,
                'created_at' => '2020-02-09 21:54:25',
                'updated_at' => '2020-02-09 21:54:25',
            ];
        });
        return $fixture->generateCollection();
    }
}

return new StorageFileFixture;