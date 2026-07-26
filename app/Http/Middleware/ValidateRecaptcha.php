<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ValidateRecaptcha
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Config::get('recaptcha.enabled', false)) {
            return $next($request);
        }

        $recaptchaResponse = $request->input('g-recaptcha-response');

        if (!$recaptchaResponse) {
            return redirect()->back()->with('error', 'Please complete the reCAPTCHA verification.')
                ->withInput();
        }

        $secretKey = Config::get('recaptcha.secret_key');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
            'remoteip' => $request->ip(),
        ]);

        $result = $response->json();

        if (!($result['success'] ?? false)) {
            Log::warning('reCAPTCHA validation failed', [
                'ip' => $request->ip(),
                'errors' => $result['error-codes'] ?? [],
            ]);

            return redirect()->back()->with('error', 'reCAPTCHA verification failed. Please try again.')
                ->withInput();
        }

        return $next($request);
    }
}