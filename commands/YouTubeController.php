<?php

namespace app\commands;

use app\components\YouTube\YouTube;
use app\models\Application;
use app\models\Channel;
use phpDocumentor\Reflection\Types\This;
use yii\console\Controller;


class YouTubeController extends Controller
{

    /** @var YouTube */
    private $youtube;

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

            $statistics = $this->youtube->channels->getStatistics($youtube_id);
            $snippet = $this->youtube->channels->getSnippet($youtube_id);
            $settings = $this->youtube->channels->getBrandingSettings($youtube_id);

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
}