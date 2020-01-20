<?php

namespace app\commands;

use app\components\YouTube\YouTube;
use app\models\Application;
use app\models\Channel;
use app\models\Video;
use yii\console\Controller;
use yii\debug\panels\EventPanel;


class YouTubeController extends Controller
{

    /** @var YouTube */
    private $youtube;

    private $nextPageToken = null;

    /**
     * YouTubeController constructor.
     * @param $id
     * @param $module
     * @param YouTube $youTube
     */
    public function __construct($id, $module, YouTube $youTube)
    {
        $this->youtube = $youTube;
        parent::__construct($id, $module);
    }

    public function actionDownloadChannels($limit = 100)
    {
        $applications = Application::find()
            ->where(['status' => Application::STATUS_READY_TO_DOWNLOAD])
            ->limit($limit);

        foreach ($applications->each(10) as $application) {
            /** @var $application Application */
            $youtube_id = $application->getYouTubeID();


            $channel = Channel::findOne(['youtube_id' => $youtube_id]);

            if (empty($channel)) {
                $channel = new Channel();
            }

            $statistics = $this->youtube->channel->getStatistics($youtube_id);
            $snippet = $this->youtube->channel->getSnippet($youtube_id);
            $settings = $this->youtube->channel->getBrandingSettings($youtube_id);

            $channel->title = $snippet['items'][0]['snippet']['title'];
            $channel->youtube_id = $youtube_id;
            $channel->description = $this->clearDescription($snippet['items'][0]['snippet']['description']);
            $channel->thumbnails = json_encode($snippet['items'][0]['snippet']['thumbnails']);
            $channel->banners = json_encode($settings['items'][0]['brandingSettings']['image']);
            $channel->viewCount = $statistics['items'][0]['statistics']['viewCount'];
            $channel->subscriberCount = $statistics['items'][0]['statistics']['subscriberCount'];
            $channel->videoCount = $statistics['items'][0]['statistics']['videoCount'];
            $channel->status = Channel::STATUS_ACTIVE;

            $channel->save();

            if ($channel->errors) {
                die(var_dump($channel->errors));
            }

        }


    }

    private function clearDescription($description)
    {
        $description = str_replace("\n", " ", $description);
        $description = preg_replace('/[\s]+/', ' ', $description);

        return $description;
    }

    public function actionDownloadVideoList($limit = 100)
    {
        $today = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") - 7, date("Y")));

        $channels = Channel::find()
            ->where(['status' => Channel::STATUS_ACTIVE])
            ->andWhere(['<=', 'synchronized_at', $today])
            ->limit($limit)
            ->all();


        foreach ($channels as $channel) {
            do {
                /** @var Channel $channel */
                $token = $this->youtube->channel->getUploadToken($channel->youtube_id);

                $list = $this->youtube->video->getList($token, YouTube::MAX_RESULTS, $this->nextPageToken);
//die(var_dump(json_encode($list['nextPageToken'])));
                if (isset($list['nextPageToken'])) {
                    $this->nextPageToken = $list['nextPageToken'];
                } else {
                    $this->nextPageToken = 'end';
                }

                foreach ($list['items'] as $item) {
                    $youtube_id = $item['snippet']['resourceId']['videoId'];

                    $video = Video::findOne(['youtube_id' => $youtube_id]);

                    if (empty($video)) {
                        $video = new Video();
                    }

                    $video->title = $item['snippet']['title'];
                    $video->description = $item['snippet']['description'];
                    $video->thumbnails = json_encode($item['snippet']['thumbnails']);
                    $video->youtube_id = $youtube_id;
                    $video->status = Video::STATUS_ACTIVE;
                    $video->channel_id = $channel->id;
                    $video->published_at = date("Y-m-d H:i:s", strtotime($item['snippet']['publishedAt']));
                    $video->save();

                    if ($video->errors) {
                        die(var_dump($video->errors));
                    }
                }
            } while ($this->nextPageToken != 'end');
        }
    }
}