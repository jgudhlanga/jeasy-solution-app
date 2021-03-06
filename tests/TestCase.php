<?php

namespace Tests;

use App\Exceptions\Handler;
use App\User;
use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;


abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    protected function setUp(): void
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    protected function disableExceptionHandling ()
    {
        $this->oldExceptionHandler = app()->make(ExceptionHandler::class);
        app()->instance(ExceptionHandler::class, new PassThroughHandler);
    }

    protected function withExceptionHandling ()
    {
        app()->instance(ExceptionHandler::class, $this->oldExceptionHandler);
        return $this;
    }

    protected function signIn($user = [])
    {
        $user = $user ?: create(User::class);
        $this->actingAs($user);
        return $this;
    }

    protected function signOut()
    {
        $this->post('/logout');
        return $this;
    }
}

class PassThroughHandler extends Handler
{
    public function __construct () {}

    public function report (Exception $e) {}

    public function render ($request, Exception $e)
    {
        throw $e;
    }
}
