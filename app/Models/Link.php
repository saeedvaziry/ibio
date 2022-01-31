<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class Link extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'type',
        'title',
        'title_en',
        'url',
        'meta',
        'order',
        'active',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'user_id' => 'integer',
        'active' => 'boolean',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'token',
        'real_url',
        'display_title',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function stats()
    {
        return $this->morphMany('App\Models\Stat', 'statable');
    }

    /**
     * @param $date
     * @return int
     */
    public function clicks($date)
    {
        return $this->stats()->where('date', $date)->count();
    }

    /**
     * @return string
     */
    public function getTokenAttribute()
    {
        return Crypt::encryptString($this->id);
    }

    /**
     * @return mixed|string|string[]|null
     */
    public function getRealUrlAttribute()
    {
        return $this->generate();
    }

    /**
     * @return string|string[]|null
     */
    public function getYoutubeEmbedLinkAttribute()
    {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "//www.youtube.com/embed/$2",
            $this->real_url
        );
    }

    /**
     * @return string
     */
    public function getSoundcloudEmbedLinkAttribute()
    {
        return 'https://w.soundcloud.com/player/?url=' . $this->real_url . '&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true';
    }

    /**
     * @return mixed|string|string[]
     */
    public function getSpotifyEmbedLinkAttribute()
    {
        return str_replace('track', 'embed/track', $this->real_url);
    }

    /**
     * @return mixed|string|string[]
     */
    public function getAparatEmbedLinkAttribute()
    {
        $videoId = str_replace('https://www.aparat.com/v/', '', $this->real_url);

        return 'https://www.aparat.com/video/video/embed/videohash/' . $videoId . '/vt/frame';
    }

    /**
     * @return mixed|string|string[]|null
     */
    public function generate()
    {
        switch ($this->type) {
            case 'social':
                return str_replace('{value}', $this->url, $this->getSchema($this->title, config('links.social_medias')));
            case 'contact':
                return str_replace('{value}', $this->url, $this->getSchema($this->title, config('links.contacts')));
            default:
                return $this->url;
        }
    }

    /**
     * @return mixed
     */
    public function getDisplayTitleAttribute()
    {
        $isEn = session()->has('lang-' . $this->user_id) && session()->get('lang-' . $this->user_id) == 'en';

        if ($this->type == 'social') {
            foreach (config('links.social_medias') as $link) {
                if ($this->title == $link['value']) {
                    return $isEn ? $link['value'] : $link['title'];
                }
            }
        }
        if ($this->type == 'contact') {
            foreach (config('links.contacts') as $link) {
                if ($this->title == $link['value']) {
                    return $isEn ? $link['value'] : $link['title'];
                }
            }
        }

        return $isEn ? $this->title_en ?? substr($this->url, 0, 10) . '...' : $this->title;
    }

    /**
     * @param $value
     * @param $links
     * @return null
     */
    private function getSchema($value, $links)
    {
        foreach ($links as $link) {
            if ($link['value'] == $value) {
                return $link['schema'];
            }
        }

        return null;
    }
}
