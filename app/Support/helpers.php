<?php

function get_thumbnail_from_url(string $url): string|null
{
    try {
        $pageContent = file_get_contents($url);
        $domObj = new DOMDocument('1.0', 'UTF-8');
        @$domObj->loadHTML($pageContent);
        $metaVal = null;
        foreach ($domObj->getElementsByTagName('meta') as $meta) {
            if ($meta->getAttribute('property') == 'og:image') {
                $metaVal = $meta->getAttribute('content');
            }
        }

        return $metaVal;
    } catch (Throwable) {
        return '';
    }
}

function is_persian_alphabet($input): bool
{
    return (bool) preg_match('/^[\x{600}-\x{6FF}\x{200c}\x{064b}\x{064d}\x{064c}\x{064e}\x{064f}\x{0650}\x{0651}\s]+$/u', $input);
}
