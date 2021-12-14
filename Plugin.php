<?php

namespace Kanboard\Plugin\Sms77;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base {
    public function initialize(): void {
        $this->container['sms77'] = static function ($container) {
            return new Sms77($container);
        };

        $this->authenticationManager->register(new SmsAuth($this->container));

        $hooks = [
            'template:config:integrations' => 'Sms77:config/integration',
            'template:user:integrations' => 'Sms77:user/integration',
        ];

        foreach ($hooks as $k => $v) $this->template->hook->attach($k, $v);
    }

    public function onStartup() {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getPluginName(): string {
        return 'sms77';
    }

    public function getPluginDescription(): string {
        return t('Use SMS for two-factor authentication');
    }

    public function getPluginAuthor(): string {
        return 'sms77 e.K.';
    }

    public function getPluginVersion(): string {
        return '1.0.0';
    }

    public function getPluginHomepage(): string {
        return 'https://github.com/sms77io/kanboard';
    }

    public function getCompatibleVersion(): string {
        return '>=1.2.0';
    }
}
