<?php

namespace Tests\Api;

use GuzzleHttp\RequestOptions;
use ZnCore\Base\Enums\Http\HttpHeaderEnum;
use ZnCore\Base\Enums\Http\HttpMethodEnum;
use ZnCore\Base\Enums\Http\HttpStatusCodeEnum;
use ZnTool\Test\Base\BaseRestApiTest;

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
