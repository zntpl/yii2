<?php

namespace common\enums\rbac;

use PhpLab\Core\Domain\Base\BaseEnum;

class RoleEnum extends BaseEnum {

    // Администратор системы
    const ADMINISTRATOR = 'rAdministrator';

    // Оператор поддержки
    const OPERATOR = 'rOperator';

    // Идентифицированный пользователь
    const USER = 'rUser';

    // Гость системы
    const GUEST = 'rGuest';

    // Не идентифицированный пользователь
    const UNKNOWN_USER = 'rUnknownUser';

    // Корневой администратор системы
    const ROOT = 'rRoot';

    // Модератор системы
    const MODERATOR = 'rModerator';

    // Разработчик
    const DEVELOPER = 'rDeveloper';

    public static function getLabels() {
        return [
            self::ADMINISTRATOR => 'Администратор системы',
            self::OPERATOR => 'Оператор поддержки',
            self::USER => 'Идентифицированный пользователь',
            self::GUEST => 'Гость системы',
            self::UNKNOWN_USER => 'Не идентифицированный пользователь',
            self::ROOT => 'Корневой администратор системы',
            self::MODERATOR => 'Модератор системы',
            self::DEVELOPER => 'Разработчик',
        ];
    }

}