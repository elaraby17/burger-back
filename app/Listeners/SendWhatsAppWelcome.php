<?php

namespace App\Listeners;

use App\Services\WhatsAppService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendWhatsAppWelcome implements ShouldQueue
{
    public int $tries = 3;
    public int $backoff = 30;

    public function __construct(private WhatsAppService $whatsapp) {}

    public function handle(Registered $event): void
    {
        $user = $event->user;

        if (! $user->phone || ! $user->whatsapp_opt_in) {
            return;
        }

        $response = $this->whatsapp->sendTemplate(
            to: $user->phone,
            template: config('services.whatsapp.welcome_template'),
            params: [$user->name],
        );

        if ($response->failed()) {
            Log::error('WhatsApp welcome failed', [
                'user_id' => $user->id,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            $response->throw(); // عشان الـ Queue يعيد المحاولة
        }
    }
}
