<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    public function sendTemplate(string $to, string $template, array $params = [], string $lang = 'ar'): Response
    {
        $url = sprintf(
            'https://graph.facebook.com/%s/%s/messages',
            config('services.whatsapp.version'),
            config('services.whatsapp.phone_id')
        );

        $components = [];

        if (! empty($params)) {
            $components[] = [
                'type' => 'body',
                'parameters' => array_map(
                    fn ($p) => ['type' => 'text', 'text' => (string) $p],
                    $params
                ),
            ];
        }

        return Http::withToken(config('services.whatsapp.token'))
            ->acceptJson()
            ->timeout(15)
            ->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => $this->normalizePhone($to),
                'type' => 'template',
                'template' => [
                    'name' => $template,
                    'language' => ['code' => $lang],
                    'components' => $components,
                ],
            ]);
    }

    /**
     * يحوّل 01012345678 أو +201012345678 إلى 201012345678
     */
    public function normalizePhone(string $phone): string
    {
        $phone = preg_replace('/\D+/', '', $phone);

        if (str_starts_with($phone, '00')) {
            $phone = substr($phone, 2);
        }

        // رقم مصري محلي: 01xxxxxxxxx
        if (str_starts_with($phone, '0') && strlen($phone) === 11) {
            $phone = '20' . substr($phone, 1);
        }

        return $phone;
    }
}
