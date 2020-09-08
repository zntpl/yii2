<?php

//return [];


use common\enums\rbac\PermissionEnum;
use common\enums\rbac\RoleEnum;
//use Packages\Product\Domain\Enums\ComplexPermissionEnum;
use ZnCore\Base\Domain\Base\BaseEnum;
//use ZnSandbox\Sandbox\Reference\Enums\ReferenceBookPermissionEnum;
use Packages\RestClient\Domain\Enums\RestClientPermissionEnum;
use yii\test\Fixture;
use yii2bundle\account\domain\v3\enums\AccountPermissionEnum;
use yii2bundle\geo\domain\enums\GeoPermissionEnum;
use yii2bundle\rbac\domain\enums\RbacPermissionEnum;
use ZnCore\Base\Legacy\Yii\Helpers\FileHelper;
use ZnCore\Base\Libs\Benchmark;
use RocketLab\Bundle\App\Libs\Kernel;
use RocketLab\Bundle\App\Libs\Loader\AdvancedLoader;
use RocketLab\Bundle\App\Libs\Rails;

$_ENV['PROJECT_DIR'] = realpath(__DIR__ . '/../../..');
$_ENV['APP_DIR'] = realpath(__DIR__ . '/../../..');
$_ENV['APP_NAME'] = 'frontend';

$loader = new AdvancedLoader($_ENV);
$kernel = new Kernel($_ENV, $loader);
$mainConfig = $kernel->run();
Rails::initAll($_ENV['PROJECT_DIR']);

$application = new yii\web\Application($mainConfig);



class AuthItemFixture extends \ZnCore\Db\Fixture\Libs\DataFixture
{

    private $authManager;

    public function __construct($data = [], array $deps = [])
    {
        $this->authManager = Yii::$app->authManager;
        //dd($this->authManager);
    }

    public function unload()
    {
        $this->authManager->removeAll();
    }

    public function load()
    {
        // Создание ролей
        $this->loadRolesFromEnum(RoleEnum::class);

        // Создание полномочий
        $this->addPermission(GeoPermissionEnum::CITY_MANAGE, 'Управление городами');
        //$this->addPermission(RestClientPermissionEnum::CLIENT_ALL, 'Доступ к REST-клиенту');

        //$this->loadPermissionsFromEnum(ComplexPermissionEnum::class);
        $this->loadPermissionsFromEnum(AccountPermissionEnum::class);
        $this->loadPermissionsFromEnum(RestClientPermissionEnum::class);
        $this->loadPermissionsFromEnum(RbacPermissionEnum::class);
        //$this->loadPermissionsFromEnum(ReferenceBookPermissionEnum::class);
        $this->loadPermissionsFromEnum(PermissionEnum::class);

        // Наследование ролей
        $this->addChilds(RoleEnum::UNKNOWN_USER, [
            RoleEnum::GUEST,
        ]);

        $this->addChilds(RoleEnum::USER, [
            RoleEnum::GUEST,
            RoleEnum::UNKNOWN_USER,
        ]);

        $this->addChilds(RoleEnum::DEVELOPER, [
            RoleEnum::GUEST,
            RoleEnum::UNKNOWN_USER,
            RoleEnum::USER,
        ]);

        $this->addChilds(RoleEnum::MODERATOR, [
            RoleEnum::GUEST,
            RoleEnum::UNKNOWN_USER,
            RoleEnum::USER,
        ]);

        $this->addChilds(RoleEnum::ADMINISTRATOR, [
            RoleEnum::GUEST,
            RoleEnum::UNKNOWN_USER,
            RoleEnum::USER,
            RoleEnum::DEVELOPER,
            RoleEnum::MODERATOR,
            RbacPermissionEnum::MANAGE,
        ]);

        // Назначение полномочий ролям
        $this->addChilds(RoleEnum::MODERATOR, [
            GeoPermissionEnum::CITY_MANAGE,
            AccountPermissionEnum::IDENTITY_READ,
            AccountPermissionEnum::IDENTITY_WRITE,
            RestClientPermissionEnum::ACCESS_MANAGE,
        ]);

        $this->addChilds(RoleEnum::GUEST, [
            //ComplexPermissionEnum::READ,
            //ReferenceBookPermissionEnum::READ,
        ]);

        $this->addChilds(RoleEnum::DEVELOPER, [

        ]);

        $this->addChilds(RoleEnum::USER, [
            RestClientPermissionEnum::PROJECT_WRITE,
            RestClientPermissionEnum::PROJECT_READ,
        ]);

        $this->addChilds(RoleEnum::MODERATOR, [
            //ComplexPermissionEnum::WRITE,
            //ReferenceBookPermissionEnum::WRITE,
            PermissionEnum::BACKEND_ALL
        ]);

        // Назначение ролей пользователям

        /*$this->assign(RoleEnum::ADMINISTRATOR, 1);
        $this->assign(RoleEnum::MODERATOR, 2);
        $this->assign(RoleEnum::DEVELOPER, 3);
        $this->assign(RoleEnum::OPERATOR, 4);*/
    }

    private function loadRolesFromEnum(string $enumClassName) {
        /** @var BaseEnum $enumClassName */
        foreach ($enumClassName::values() as $itemName) {
            $label = $enumClassName::getLabel($itemName);
            $this->addRole($itemName, $label);
        }
    }

    private function loadPermissionsFromEnum(string $enumClassName) {
        /** @var BaseEnum $enumClassName */
        foreach ($enumClassName::values() as $itemName) {
            $label = $enumClassName::getLabel($itemName);
            $this->addPermission($itemName, $label);
        }
    }

    private function assign(string $roleName, int $userId) {
        $role = $this->getItem($roleName);
        $this->authManager->assign($role, $userId);
    }

    private function addChilds(string $parentName, array $childNames) {
        foreach ($childNames as $childName) {
            $this->addChild($parentName, $childName);
        }
    }

    private function addChild(string $parentName, string $childName) {
        $parent = $this->getItem($parentName);
        $child = $this->getItem($childName);
        $this->authManager->addChild($parent, $child);
    }

    private function getItem(string $name) {
        return $this->authManager->getRole($name) ?? $this->authManager->getPermission($name);
    }

    private function addRole(string $name, string $description) {
        $item = $this->authManager->createRole($name);
        $item->description = $description;
        return $this->authManager->add($item);
    }

    private function addPermission(string $name, string $description) {
        $item = $this->authManager->createPermission($name);
        $item->description = $description;
        return $this->authManager->add($item);
    }

}

return new AuthItemFixture;
