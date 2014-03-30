<?php
namespace suralc\yii2\PureWidgets;


class PureAssetConfig
{
    const PURE_VERSION_DEFAULT = '0.4.2';
    const CDN_NONE = false;
    const CDN_DEFAULT = self::CDN_NONE;
    const CDN_YAHOO = '//yui.yahooapis.com/pure/{version}/pure{min}.css';
    const CDN_CDNJS = '//cdnjs.cloudflare.com/ajax/libs/pure/{version}/pure{min}.css';
    const CDN_MAXCDN = '//oss.maxcdn.com/libs/pure/{version}/pure{min}.css';
    const CDN_STATICFILE = 'http://cdn.staticfile.org/pure/{version}/pure{min}.css';

    /**
     * Version to load
     * This is only relevant, if you use the yahoo-cdn
     * @var string
     */
    public static $pureVersion = self::PURE_VERSION_DEFAULT;
    /**
     * Use the yahoo-cdn instead of the supplied files
     * @var bool|string
     */
    public static $useCDN = self::CDN_DEFAULT;
    public static $useMinified = true;
    public static $disableAssetLoading = false;

} 