#!/bin/sh

sh "clean db.sh"
sh "test.sh"

php vendor/phpunit/phpunit/phpunit