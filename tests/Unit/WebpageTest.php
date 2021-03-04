<?php

namespace Tests\Unit;
use App\Services\Webpage;
use Tests\TestCase;

class WebpageTest extends TestCase
{

    public function test_showHighlight()
    {
        $testCases = [
            [
                'myUrl' => '/section/index.html',
                'requestedUrl' => '/section/index.html',
                'expectedResult' => true
            ],
            [
                'myUrl' => '/section/index.html',
                'requestedUrl' => '/section/page.html',
                'expectedResult' => true
            ],
            [
                'myUrl' => '/section/page.html',
                'requestedUrl' => '/section/other-page.html',
                'expectedResult' => false
            ],
            [
                'myUrl' => '/section/index.html',
                'requestedUrl' => '/section/subsection/index.html',
                'expectedResult' => true
            ],
            [
                'myUrl' => '/section/index.html',
                'requestedUrl' => '/section/subsection/page.html',
                'expectedResult' => true
            ],
            [
                'myUrl' => '/section/subsection/index.html',
                'requestedUrl' => '/section/other/index.html',
                'expectedResult' => false
            ],
            [
                'myUrl' => 'http://localhost/test/index.html',
                'requestedUrl' => 'http://localhost/test/index.html',
                'expectedResult' => true
            ],
            [
                'myUrl' => 'http://localhost/test/page.html',
                'requestedUrl' => 'http://localhost/test/index.html',
                'expectedResult' => false
            ],
            [
                'myUrl' => 'http://localhost/test/index.html',
                'requestedUrl' => 'http://localhost/test/subsection/page.html',
                'expectedResult' => true
            ],
            [
                'myUrl' => 'http://localhost/test/page.html',
                'requestedUrl' => 'http://localhost/test/subsection/page.html',
                'expectedResult' => false
            ],
            [
                'myUrl' => 'http://localhost/test/page.html',
                'requestedUrl' => 'http://localhost/test/subsectuion/index.html',
                'expectedResult' => false
            ]
        ];

        foreach ($testCases as $testCase) {
            $service = app()->makeWith(Webpage::class, ['myUrl' => $testCase['myUrl']]);
            $result = $service->showHighlight($testCase['requestedUrl']);
            $this->assertEquals($testCase['expectedResult'], $result);
        }
    }

}
