<?php

namespace Kanboard\Plugin\Seven;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base {
    public function initialize(): void {
        $this->container['seven'] = static function ($container) {
            return new Seven($container);
        };

        $this->authenticationManager->register(new SmsAuth($this->container));

        $hooks = [
            'template:config:integrations' => 'Seven:config/integration',
            'template:user:integrations' => 'Seven:user/integration',
        ];

        foreach ($hooks as $k => $v) $this->template->hook->attach($k, $v);
    }

    public function onStartup() {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getPluginName(): string {
        return 'seven';
    }

    public function getPluginDescription(): string {
        return t('Use SMS for two-factor authentication');
    }

    public function getPluginAuthor(): string {
        return 'seven communications GmbH & Co. KG';
    }

    public function getPluginVersion(): string {
        return '1.0.0';
    }

    public function getPluginHomepage(): string {
        return 'https://github.com/seven-io/kanboard';
    }

    public function getCompatibleVersion(): string {
        return '>=1.2.13';
    }
}
