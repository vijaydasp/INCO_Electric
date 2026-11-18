<?php

namespace App\Http\Controllers;

use App\Mail\ContactEnquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    /**
     * Validate the website enquiry and send it to the INCO inbox.
     */
    public function send(Request $request): JsonResponse
    {
        // Honeypot: real visitors never see or fill this field.
        if ($request->filled('website')) {
            return response()->json([
                'message' => 'Your enquiry has been sent.',
            ]);
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'phone' => ['required', 'string', 'min:8', 'max:40'],
            'email' => ['required', 'string', 'email:rfc', 'max:180'],
            'product' => ['nullable', 'string', 'max:120'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'captcha' => ['accepted'],
        ], [
            'captcha.accepted' => "Please confirm you're not a robot.",
            'captcha.required' => "Please confirm you're not a robot.",
        ]);

        $throttleKey = 'contact-form:' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            return response()->json([
                'message' => 'Too many enquiries from this connection. Please try again in a few minutes.',
            ], 429);
        }

        RateLimiter::hit($throttleKey, 600);

        $recipient = config('mail.contact_to') ?: config('mail.from.address');

        try {
            Mail::to($recipient)->send(new ContactEnquiry($data));
        } catch (\Throwable $exception) {
            report($exception);

            return response()->json([
                'message' => 'We could not send your enquiry right now. Please email us at inducomponentsinco@gmail.com or call 92071 93005.',
            ], 500);
        }

        return response()->json([
            'message' => 'Your enquiry has been sent.',
        ]);
    }
}
