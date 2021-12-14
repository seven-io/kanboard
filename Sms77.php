<?php

namespace Kanboard\Plugin\Sms77;

require_once __DIR__ . '/vendor/autoload.php';

use Exception;
use Kanboard\Core\Base;
use Kanboard\Model\ConfigModel;
use Pimple\Container;
use Sms77\Api\Client;

/**
 * SMS Manager
 * @package  sms
 * @author   sms77 e.K.
 */
class Sms77 extends Base {
    /**
     * sms77 API Key
     * @access private
     * @var string
     */
    private $apiKey;

    /**
     * sender identifier
     * @access private
     * @var string|null
     */
    private $from;

    /**
     * Constructor
     * @access public
     * @param Container $container
     */
    public function __construct(Container $container) {
        parent::__construct($container);

        /** @var ConfigModel $configModel */
        $configModel = $container['configModel'];
        $this->apiKey = $configModel->get('sms77_api_key');
        $this->from = $configModel->get('sms77_from');
    }

    /**
     * Send SMS
     * @access public
     * @param string $to The recipients phone number
     * @param string $text The text to send
     * @throws Exception
     */
    public function sms(string $to, string $text): void {
        try {
            $this->logger->debug('sms77: Sending SMS to ' . $to);

            (new Client($this->apiKey, 'Kanboard'))
                ->sms($to, t('Kanboard verification code: %d', $text), ['from' => $this->from]);
        } catch (Exception $e) {
            $this->logger->error('sms77: ' . $e->getMessage());
        }
    }
}
