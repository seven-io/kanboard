<?php

namespace Kanboard\Plugin\Seven;

require_once __DIR__ . '/vendor/autoload.php';

use Exception;
use Kanboard\Core\Base;
use Kanboard\Model\ConfigModel;
use Pimple\Container;
use Sms77\Api\Client;
use Sms77\Api\Params\SmsParams;

/**
 * SMS Manager
 * @package  sms
 * @author   seven communications GmbH & Co. KG
 */
class Seven extends Base {
    /**
     * seven API Key
     * @var string
     */
    private $apiKey;

    /**
     * sender identifier
     * @var string|null
     */
    private $from;

    public function __construct(Container $container) {
        parent::__construct($container);

        /** @var ConfigModel $configModel */
        $configModel = $container['configModel'];
        $this->apiKey = $configModel->get('seven_api_key');
        $this->from = $configModel->get('seven_from');
    }

    /**
     * Send SMS
     * @param string $to The recipients phone number
     * @param string $text The text to send
     * @throws Exception
     */
    public function sms(string $to, string $text): void {
        try {
            $this->logger->debug('seven: Sending SMS to ' . $to);

            $smsParams = (new SmsParams)
                ->setFrom($this->from)
                ->setText(t('Kanboard verification code: %d', $text))
                ->setTo($to)
            ;

            (new Client($this->apiKey, 'Kanboard'))->sms($smsParams);
        } catch (Exception $e) {
            $this->logger->error('seven: ' . $e->getMessage());
        }
    }
}
