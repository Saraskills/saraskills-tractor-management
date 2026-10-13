<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use App\Services\ApiResponseService;

class ContactController extends Controller
{
    public function store(StoreContactMessageRequest $request)
    {
        $message = ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'new',
        ]);

        return ApiResponseService::success('Your message has been sent successfully.', [
            'message' => $message,
        ], 201);
    }
}
