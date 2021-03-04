<?php

namespace Tests\Unit;

use App\Services\InterestedVisitorService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class InterestedVisitorServiceTest extends TestCase
{
    use DatabaseTransactions;

    private $service;

    public function __setUp(): void
    {
        parent::setUp();
        $service = app()->make(InterestedVisitorService::class);
    }

    public function test_saveInfo_givenCustomerDetails_savesInfo()
    {
//        string $name,
////        string $email,
////        string $address,
////        int $phone,
////        string $source,
////        int $minBudget,
////        int $maxBudget
        $service = app()->make(InterestedVisitorService::class);
        //dd($service);
        $service->saveInfo('test123', 'test@test.com', 'abc, 123 drive', 9999999999,
            'FB', '2000000', '4000000'
        );
        dd('done');

    }

    public function test_saveInfo_givenExistingCustomer_doesNotSaveInfo()
    {

    }
}
