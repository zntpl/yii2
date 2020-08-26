<?php

use PhpLab\Eloquent\Fixture\Helpers\FixtureFactoryHelper;

if( ! class_exists(UserIdentityFixture::class)) {

    class UserIdentityFixture extends \PhpLab\Eloquent\Fixture\Libs\DataFixture
    {

        public function deps()
        {
            return [

            ];
        }

        public function load()
        {
            $time = '2018-03-28 21:00:13';

            $collection = [
                [
                    'id' => 1,
                    'login' => 'admin',
                    'status' => 1,
                    'created_at' => $time,
                    'updated_at' => $time,
                ],
                [
                    'id' => 2,
                    'login' => 'moderator',
                    'status' => 1,
                    'created_at' => $time,
                    'updated_at' => $time,
                ],
                [
                    'id' => 3,
                    'login' => 'developer',
                    'status' => 1,
                    'created_at' => $time,
                    'updated_at' => $time,
                ],
                [
                    'id' => 4,
                    'login' => 'bot',
                    'status' => 1,
                    'created_at' => $time,
                    'updated_at' => $time,
                ],

            ];

            $fixture = new FixtureFactoryHelper;
            $fixture->setCount(10);
            $fixture->setStartIndex(count($collection) + 1);
            $fixture->setCallback(function ($index, FixtureFactoryHelper $fixtureFactory) use ($time) {
                $username = 'user' . $index;
                return [
                    'id' => $index,
                    'login' => $username,
                    'status' => 1,
                    'created_at' => $time,
                    'updated_at' => $time,
                ];
            });

            return array_merge($collection, $fixture->generateCollection());
        }
    }

}

return new UserIdentityFixture;
