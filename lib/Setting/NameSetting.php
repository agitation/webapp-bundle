<?php
declare(strict_types=1);

namespace Agit\WebappBundle\Setting;

use Agit\IntlBundle\Tool\Translate;
use Agit\SettingBundle\Service\AbstractSetting;
use Agit\ValidationBundle\ValidationService;

class NameSetting extends AbstractSetting
{
    protected $validationService;

    public function __construct(ValidationService $validationService)
    {
        $this->validationService = $validationService;
    }

    public function getId()
    {
        return 'agit.name';
    }

    public function getName()
    {
        return Translate::t('Site name');
    }

    public function getDefaultValue()
    {
        return '';
    }

    public function validate($value)
    {
        $this->validationService->validate('string', $value, 3, 30);
    }
}
