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

        return$this->youtube->request(YouTube::API_CHANNELS, YouTube::METHOD_GET, $data);
    }
}