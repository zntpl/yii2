#!/bin/sh
cd ../../vendor/zncore/db/bin
php console db:migrate:down --withConfirm=0
# php console db:delete-all-tables --withConfirm=0
php console db:migrate:up --withConfirm=0
php console db:fixture:import --withConfirm=0