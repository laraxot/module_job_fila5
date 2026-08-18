<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Modules\Job\Models\BaseModel;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('base model extends eloquent model', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $baseModel = new class extends BaseModel
=======
    $baseModel = new class() extends BaseModel
>>>>>>> f0c10529 (.)
=======
    $baseModel = new class extends BaseModel
>>>>>>> af4545e (.)
    {
        protected $table = 'test_job_table';
    };

    Assert::assertInstanceOf(Model::class, $baseModel);
});

test('base model has correct table name', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $baseModel = new class extends BaseModel
=======
    $baseModel = new class() extends BaseModel
>>>>>>> f0c10529 (.)
=======
    $baseModel = new class extends BaseModel
>>>>>>> af4545e (.)
    {
        protected $table = 'test_job_table';
    };

    Assert::assertSame('test_job_table', $baseModel->getTable());
});

test('base model can be instantiated', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $baseModel = new class extends BaseModel
=======
    $baseModel = new class() extends BaseModel
>>>>>>> f0c10529 (.)
=======
    $baseModel = new class extends BaseModel
>>>>>>> af4545e (.)
    {
        protected $table = 'test_job_table';
    };

    Assert::assertInstanceOf(BaseModel::class, $baseModel);
});

test('base model has proper inheritance chain', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $baseModel = new class extends BaseModel
=======
    $baseModel = new class() extends BaseModel
>>>>>>> f0c10529 (.)
=======
    $baseModel = new class extends BaseModel
>>>>>>> af4545e (.)
    {
        protected $table = 'test_job_table';
    };

    Assert::assertInstanceOf(BaseModel::class, $baseModel);
    Assert::assertInstanceOf(Model::class, $baseModel);
});

test('base model has timestamps enabled', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $baseModel = new class extends BaseModel
=======
    $baseModel = new class() extends BaseModel
>>>>>>> f0c10529 (.)
=======
    $baseModel = new class extends BaseModel
>>>>>>> af4545e (.)
    {
        protected $table = 'test_job_table';
    };

    Assert::assertTrue($baseModel->usesTimestamps());
<<<<<<< HEAD
});
=======
});
>>>>>>> af4545e (.)
