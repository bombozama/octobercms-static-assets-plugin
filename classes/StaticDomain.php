<?php namespace Wiz\StaticDomain\Classes;

use Wiz\StaticDomain\Models\Setting;

class StaticDomain {

    public static function replaceDomain($url)
    {
        $settings = Setting::instance();
        $parsed = parse_url($url);

        if( $parsed && $settings->cookie_free_domain ) {

            # Replace url domain for static domain
            $parsed['host'] = $settings->cookie_free_domain;
            $url = self::unparse_url($parsed);
        }

        return $url;
    }

    public static function unparse_url($parsed)
    {
        if (!is_array($parsed)) {
            return false;
        }

        $uri = isset($parsed['scheme']) ? $parsed['scheme'].':'.((strtolower($parsed['scheme']) == 'mailto') ? '' : '//') : '';
        $uri .= isset($parsed['user']) ? $parsed['user'].(isset($parsed['pass']) ? ':'.$parsed['pass'] : '').'@' : '';
        $uri .= isset($parsed['host']) ? $parsed['host'] : '';
        $uri .= isset($parsed['port']) ? ':'.$parsed['port'] : '';

        if (isset($parsed['path'])) {
            $uri .= (substr($parsed['path'], 0, 1) == '/') ?
                $parsed['path'] : ((!empty($uri) ? '/' : '' ) . $parsed['path']);
        }

        $uri .= isset($parsed['query']) ? '?'.$parsed['query'] : '';
        $uri .= isset($parsed['fragment']) ? '#'.$parsed['fragment'] : '';

        return $uri;
    }
}