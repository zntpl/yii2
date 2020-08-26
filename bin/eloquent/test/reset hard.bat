@echo off

set rootDir="%~dp0/../../.."
set eloquentBinDir=%rootDir%/vendor/zncore/db/bin

cd %eloquentBinDir%
REM php console_test db:migrate:down --withConfirm=0
php console_test db:delete-all-tables --withConfirm=0
php console_test db:migrate:up --withConfirm=0
php console_test db:fixture:import --withConfirm=0
pause