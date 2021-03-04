<?php

namespace App\Services;

class Webpage
{
    /**
     * @var string
     */
    private $myUrl;

    /**
     * Webpage constructor.
     * @param string $myUrl
     */
    public function __construct(string $myUrl)
    {
        $this->myUrl = $myUrl;
    }

    /**
     * @param string $requestedUrl
     * @return bool
     */
    public function showHighlight(string $requestedUrl): bool
    {
        //requested url is same as my url
        if ($requestedUrl === $this->myUrl) {
            return true;
        }

        $myUrlArray = explode(DIRECTORY_SEPARATOR, $this->myUrl);
        $myUrlSection = array_slice($myUrlArray, 0, -1);
        $requestedUrlArray = explode(DIRECTORY_SEPARATOR, $requestedUrl);
        $requestedUrlSection = array_slice($requestedUrlArray, 0, -1);
        $parentSectionOfRequestedUrl = array_slice($requestedUrlSection, 0, -1);

        if ($myUrlArray[count($myUrlArray) - 1] === 'index.html') {
            //myUrl is a landing page and both urls are located in same section
            if ($myUrlSection === $requestedUrlSection)
                return true;
            //myUrl is landing page of parent section of requested url
            if ($myUrlSection === $parentSectionOfRequestedUrl) {
                return true;
            }
        }

        return false;
    }

}
