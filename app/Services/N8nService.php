<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class N8nService
{
    protected string $webhookUrl;

    public function __construct()
    {
        $this->webhookUrl = config('services.n8n.webhook_url', env('N8N_WEBHOOK_URL'));
    }

    /**
     * Enviar identificador del proveedor de email a n8n
     *
     * @param int $userId
     * @param string $providerIdentifier
     * @param string $userEmail
     * @return bool
     */
    public function sendProviderIdentifier(int $userId, string $providerIdentifier, string $userEmail): bool
    {
        if (empty($this->webhookUrl)) {
            Log::warning('N8N_WEBHOOK_URL no está configurado');
            return false;
        }

        try {
            $response = Http::timeout(10)->post($this->webhookUrl, [
                'user_id' => $userId,
                'provider_identifier' => $providerIdentifier,
                'user_email' => $userEmail,
                'timestamp' => now()->toIso8601String(),
            ]);

            if ($response->successful()) {
                Log::info('Identificador de proveedor enviado a n8n exitosamente', [
                    'user_id' => $userId,
                    'provider_identifier' => $providerIdentifier,
                ]);
                return true;
            }

            Log::error('Error al enviar a n8n', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return false;
        } catch (\Exception $e) {
            Log::error('Excepción al enviar a n8n', [
                'message' => $e->getMessage(),
                'user_id' => $userId,
            ]);
            return false;
        }
    }
}

