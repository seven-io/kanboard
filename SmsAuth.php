<?php

namespace Kanboard\Plugin\Sms77;

use Kanboard\Core\Base;
use Kanboard\Core\Security\PostAuthenticationProviderInterface;

/**
 * SMS Authentication Provider
 * @package  auth
 * @author   sms77 e.K.
 */
class SmsAuth extends Base implements PostAuthenticationProviderInterface {
    private const SESSION_KEY = 'sms77_2fa_secret';

    /**
     * User pin code
     * @access private
     * @var string
     */
    private $code = '';

    /**
     * Get authentication provider name
     * @access public
     * @return string
     */
    public function getName(): string {
        return t('SMS') . ' (sms77)';
    }

    /**
     * Authenticate the user
     * @access public
     * @return boolean
     */
    public function authenticate(): bool {
        if (session_exists(self::SESSION_KEY)
            && (string)session_get(self::SESSION_KEY) === $this->code) {
            session_remove(self::SESSION_KEY);

            return true;
        }

        return false;
    }

    /** @inheritDoc */
    public function beforeCode(): void {
        $secret = random_int(100000, 999999);
        session_set(self::SESSION_KEY, $secret);
        $to = $this->userMetadataModel->get($this->userSession->getId(), 'phone_number');
        $this->container['sms77']->sms($to, $secret);
    }

    /** @inheritDoc */
    public function setCode($code): void {
        $this->code = $code;
    }

    /** @inheritDoc */
    public function generateSecret(): string {
        return '';
    }

    /**
     * Set secret token
     * @access public
     * @param string $secret
     */
    public function setSecret($secret): void {
    }

    /** @inheritDoc */
    public function getSecret(): string {
        return '';
    }

    /** @inheritDoc */
    public function getKeyUrl($label): string {
        return '';
    }
}
