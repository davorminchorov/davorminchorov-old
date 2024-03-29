<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Testing\TestResponse;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @var string
     */
    protected $apiV1Url;

    protected function setUp() : void
    {
        parent::setUp();

        $this->apiV1Url = config('app.url').'/api/v1/';
    }
}
