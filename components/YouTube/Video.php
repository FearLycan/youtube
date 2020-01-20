<?php


namespace app\components\YouTube;

/**
 * Class Video
 * @package components\YouTube
 */
class Video
{
    /** @var YouTube */
    private $youtube;

    public function __construct(YouTube $youTube)
    {
        $this->youtube = $youTube;
    }

    public function getList($play_list_id, $max_results = 50, $next_page = null)
    {
        $data = [
            'part' => 'snippet',
            'playlistId' => $play_list_id,
            'maxResults' => $max_results,
        ];

        if ($next_page) {
            $data['pageToken'] = $next_page;
        }

        return $this->youtube->request(YouTube::API_PLAY_LIST_ITEMS, YouTube::METHOD_GET, $data);
    }
}