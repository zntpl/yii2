<?php

use PhpLab\Eloquent\Fixture\Helpers\FixtureFactoryHelper;

if( ! class_exists(UserSecurityFixture::class)) {

    class UserSecurityFixture extends \PhpLab\Eloquent\Fixture\Libs\DataFixture
    {

        public function deps()
        {
            return [
                'user_identity',
            ];
        }

        public function load()
        {
            $fixture = new FixtureFactoryHelper;
            $fixture->setCount(10);
            $fixture->setCallback(function ($index, FixtureFactoryHelper $fixtureFactory) {
                return [
                    'id' => $index,
                    'identity_id' => $index,
                    'password_hash' => '$2y$10$VeTx5VTpb4AGoLRO6FfVxuNM5Xqbf7SgbC1LMvuMAi28RB9v3lPj.',
                ];
            });
            return $fixture->generateCollection();
        }
    }
}

return new UserSecurityFixture;
