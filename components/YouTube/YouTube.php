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
 * @property Channel $channels;
 */
class YouTube extends Component
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    const API_CHANNELS = 'https://www.googleapis.com/youtube/v3/channels';

    /** @var Channel */
    private $channel;

    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Channel
     */
    public function getChannels()
    {
        if ($this->channel == null) {
            $this->channel = new Channel($this);
        }
        return $this->channel;
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

        if ($response->isOk) {
            return json_decode($response->content, true);
        } else {
            throw new Exception(
                "Request to $response->url failed with response: \n"
                . VarDumper::dumpAsString($data->content)
            );
        }
    }


}