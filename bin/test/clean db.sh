#!/bin/sh
cd ../..
#chmod -R a+rw var
#rm -rf var/cache/test/*
#rm var/log/test.log

php yii_test migrate/down 99999 --interactive=0

cd vendor/zncore/db/bin

php console_test db:migrate:down --withConfirm=0
php console_test db:delete-all-tables --withConfirm=0
