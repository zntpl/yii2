#!/bin/sh

sh "migrate.sh"

cd ../..

php vendor/phpunit/phpunit/phpunit