<?php

namespace app\components\YouTube;

/**
 * Class Channel
 * @package components\YouTube
 */
class Channel
{
    /** @var YouTube */
    private $youtube;

    public function __construct(YouTube $youTube)
    {
        $this->youtube = $youTube;
    }

    public function getStatistics($channel_id)
    {
        $data = [
            'part' => 'statistics',
            'id' => $channel_id,
        ];

        return $this->youtube->request(YouTube::API_CHANNELS, YouTube::METHOD_GET, $data);
    }

    public function getSnippet($channel_id)
    {
        $data = [
            'part' => 'snippet',
            'id' => $channel_id,
        ];

        return $this->youtube->request(YouTube::API_CHANNELS, YouTube::METHOD_GET, $data);
    }

    public function getBrandingSettings($channel_id)
    {
        $data = [
            'part' => 'brandingSettings',
            'id' => $channel_id,
        ];

        return $this->youtube->request(YouTube::API_CHANNELS, YouTube::METHOD_GET, $data);
    }

    public function getUploadToken($channel_id)
    {
        $data = [
            'part' => 'contentDetails',
            'id' => $channel_id,
        ];

        $token = $this->youtube->request(YouTube::API_CHANNELS, YouTube::METHOD_GET, $data);

        return $token['items'][0]['contentDetails']['relatedPlaylists']['uploads'];
    }
}