<?php

namespace IconTs\Base\Util;


use Exception;
use Illuminate\Support\Facades\Log;

class Helpers
{
    public static function logErrorAndReturnResponseData(
        Exception $e,
        string    $logChannel,
        string    $label,
        string    $keyRoute,
        string    $msgKey,
        bool      $isJson = true
    ): array|null
    {
        Log::channel(
            $logChannel
        )->error(
            implode(' - ',
                [$label, $keyRoute]
            ),
            [$e]
        );

        if ($isJson) {
            return [__($msgKey), [$e->getMessage()], 500];
        }

        abort(500, __($msgKey));
    }

    public static function send404(string $msgKey): array
    {
        return [__($msgKey), [], 404];
    }

    public static function logDashboardErrorAndReturnResponseData(
        Exception $e,
        string    $config,
        string    $keyRoute
    ): array
    {
        return self::logErrorAndReturnResponseData(
            $e,
            config($config . '.log-dashboard'),
            config($config . '.log-label'),
            $keyRoute,
            config($config . '.msg-key-error')
        );
    }

    public static function logPublicErrorAndReturnResponseData(
        Exception $e,
        string    $config,
        string    $keyRoute
    ): array
    {
        return self::logErrorAndReturnResponseData(
            $e,
            config($config . '.log-public'),
            config($config . '.log-label'),
            $keyRoute,
            config($config . '.msg-key-error')
        );
    }

    public static function logWebErrorAndReturnResponseData(
        Exception $e,
        string    $config,
        string    $keyRoute
    ): array|null
    {
        return self::logErrorAndReturnResponseData(
            $e,
            config($config . '.log-web'),
            config($config . '.log-label'),
            $keyRoute,
            config($config . '.msg-key-error')
        );
    }
}
