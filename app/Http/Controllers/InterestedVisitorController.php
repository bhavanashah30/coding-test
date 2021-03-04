<?php

namespace App\Http\Controllers;

use App\Services\InterestedVisitorService;
use Illuminate\Http\Request;

class InterestedVisitorController extends Controller
{
    private $interestedVisitorService;

    public function __construct(InterestedVisitorService $interestedVisitorService)
    {
        $this->interestedVisitorService = $interestedVisitorService;
    }

    public function saveInfo(Request $request)
    {
        $data = json_decode($request->data);

        $this->interestedVisitorService->saveInfo($data->name,
            $data->email, $data->address, $data->phone, $data->source, $data->budget);

    }
}
