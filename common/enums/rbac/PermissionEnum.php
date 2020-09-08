<?php

namespace common\enums\rbac;

use ZnCore\Base\Domain\Base\BaseEnum;

class PermissionEnum extends BaseEnum {

	const BACKEND_ALL = 'oBackendAll';

    public static function getLabels() {
        return [
            self::BACKEND_ALL => 'Доступ в админ панель',
        ];
    }
}