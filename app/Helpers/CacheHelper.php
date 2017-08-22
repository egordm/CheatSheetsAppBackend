<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 22-8-2017
 * Time: 12:32
 */

namespace App\Helpers;


class CacheHelper
{
    public static function formatCacheKey($key, $version, $beta)
    {
        return $key . '_' . $version . '_' . $beta;
    }

    public static function deleteCache($key)
    {
        \Log::debug('Deleted cache');
        foreach (AppHelper::VERSIONS as $version) {
            \Cache::forget(self::formatCacheKey($key, $version, true));
            \Cache::forget(self::formatCacheKey($key, $version, false));
        }
    }


}