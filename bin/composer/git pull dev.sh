#!/bin/sh
cd ../../vendor

git clone "git@github.com:php7lab/core.git" "php7lab-dev/core"
git clone "git@github.com:php7lab/test.git" "php7lab-dev/test"
git clone "git@github.com:zntool/dev.git" "php7lab-dev/dev"
git clone "git@github.com:zncore/db.git" "php7lab-dev/eloquent"
git clone "git@github.com:php7lab/rest.git" "php7lab-dev/rest"
git clone "git@github.com:php7lab/sandbox.git" "php7lab-dev/sandbox"
git clone "git@github.com:php7lab/yii2-legacy.git" "php7lab-dev/yii2-legacy"

git clone "git@github.com:php7bundle/messenger.git" "php7bundle-dev/messenger"
git clone "git@github.com:php7bundle/reference.git" "php7bundle-dev/reference"
git clone "git@github.com:php7bundle/user.git" "php7bundle-dev/user"

git clone "git@github.com:zncrypt/base.git" "zncrypt-dev/base"
git clone "git@github.com:zncrypt/jwt.git" "zncrypt-dev/jwt"
git clone "git@github.com:zncrypt/pki.git" "zncrypt-dev/pki"
git clone "git@github.com:zncrypt/tunnel.git" "zncrypt-dev/tunnel"

git clone "git@github.com:zndoc/rest-api.git" "zndoc-dev/rest-api"

cd "php7lab-dev/yii2-legacy"
git checkout task-1
