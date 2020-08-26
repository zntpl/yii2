#!/bin/sh
cd ../..

php yii_test migrate --interactive=0

cd vendor/zncore/db/bin

php console_test db:migrate:up --withConfirm=0
#php console_test db:fixture:import --withConfirm=0

cd ../../../..
