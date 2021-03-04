<?php

namespace App\Services;

use App\Mail\NewVisitorMail;
use App\Models\InterestedVisitor;
use Illuminate\Support\Facades\Mail;

class InterestedVisitorService
{
    /**
     * @param string $name
     * @param string $email
     * @param string $address
     * @param string $phone
     * @param string $source
     * @param string $budget
     */
    public function saveInfo(
        string $name,
        string $email,
        string $address,
        string $phone,
        string $source,
        string $budget
    ): void
    {
        $budgetRanges = explode('-', $budget);
        $minBudget = implode("", explode(',', $budgetRanges[0]));
        $maxBudget = implode("", explode(',', $budgetRanges[1]));

        //don't save duplicates
        if (!InterestedVisitor::where([
            'name' => $name,
            'email' => $email
        ])->exists()) {
            //save to DB
            $visitorInfo = InterestedVisitor::create([
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone_number' => $phone,
                'source' => $source,
                'budget_min_value' => $minBudget,
                'budget_max_value' => $maxBudget
            ]);

            //send email
            $visitorInfo->budget = $budget;
            Mail::to('bhavana30793@gmail.com')
                ->send(new NewVisitorMail($visitorInfo));
        }
    }
}
