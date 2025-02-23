<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramService
{
    public static function sendMessage(string $message)
    {
        try {
            // 1. Исправляем названия параметров конфигурации
            $botToken = config('services.telegram.bot_token');
            $chatId = config('services.telegram.chat_id');

            if (!$botToken || !$chatId) {
                throw new \Exception('Telegram credentials not configured');
            }

            // 2. Добавляем логирование отправляемого сообщения
            Log::info("Sending to Telegram: {$message}");

            $response = Http::timeout(15)
                ->post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                    'chat_id' => $chatId,
                    'text' => $message,
                    'parse_mode' => 'Markdown' // 3. Меняем на Markdown
                ]);

            if ($response->failed()) {
                Log::error('Telegram API Error: ' . $response->body());
            }

        } catch (\Exception $e) {
            Log::error('TelegramService error: ' . $e->getMessage());
        }
    }
}
