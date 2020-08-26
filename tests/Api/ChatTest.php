<?php

namespace Tests\Api;

use GuzzleHttp\RequestOptions;
use PhpLab\Core\Enums\Http\HttpHeaderEnum;
use PhpLab\Core\Enums\Http\HttpMethodEnum;
use PhpLab\Core\Enums\Http\HttpStatusCodeEnum;
use PhpLab\Test\Base\BaseRestApiTest;

class ChatTest extends BaseRestApiTest
{

    protected $basePath = 'v1';

    protected function fixtures(): array
    {
        return [
            'user_security',
            'messenger_member',
        ];
    }

    public function testUnauthorized()
    {
        $response = $this->getRestClient()->sendGet('messenger-chat');
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::UNAUTHORIZED);
    }

    /*public function testAuthorized()
    {
        $client = $this->getRestClient();
        $client->getAuthAgent()->authByLogin('admin');
        $response = $client->sendGet('messenger-chat');
        $expectedBody = [

        ];
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::OK)
            ->assertPagination(2,1)
            ->assertBody($expectedBody);
    }*/

}
