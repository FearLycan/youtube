<?php


namespace app\components\YouTube;

use Exception;
use yii\base\Component;
use yii\httpclient\Client;
use Yii;
use yii\helpers\VarDumper;

/**
 * Class YouTube
 * @package components\YouTube
 * @property Channel $channel;
 * @property Video $video;
 */
class YouTube extends Component
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    const MAX_RESULTS = 50;

    const API_CHANNELS = 'https://www.googleapis.com/youtube/v3/channels';
    const API_SEARCH = 'https://www.googleapis.com/youtube/v3/search';
    const API_PLAY_LIST_ITEMS = 'https://www.googleapis.com/youtube/v3/playlistItems';

    /** @var Channel */
    private $channel;

    /** @var Video */
    private $video;

    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Channel
     */
    public function getChannel()
    {
        if ($this->channel == null) {
            $this->channel = new Channel($this);
        }
        return $this->channel;
    }

    /**
     * @return Video
     */
    public function getVideo()
    {
        if ($this->video == null) {
            $this->video = new Video($this);
        }
        return $this->video;
    }

    /**
     * @param $url
     * @param string $type
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function request($url, $type = 'GET', $data = [])
    {
        $data = array_merge($data, ['key' => Yii::$app->params['youtube_api_key']]);

        $request = $this->client->createRequest()
            ->setMethod($type)
            ->setUrl($url)
            ->setData($data);

        $response = $request->send();
//die(var_dump(http_build_query($data)));
        if ($response->isOk) {
            return json_decode($response->content, true);
        } else {
            throw new Exception(
                "Request to $request->url failed with response: \n"
                . VarDumper::dumpAsString($response->content)
            );
        }
    }


}