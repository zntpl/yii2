@echo off

set rootDir="%~dp0/../.."
set eloquentBinDir=%rootDir%/vendor/zncore/db/bin

cd %eloquentBinDir%
php console db:delete-all-tables --withConfirm=0

cd %rootDir%
php yii migrate/down 99999 --interactive=0
php yii migrate --interactive=0
php yii fixture "*" --interactive=0

pause