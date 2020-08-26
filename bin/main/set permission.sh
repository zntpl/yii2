#!/bin/sh

cd ../..

sudo chown -R www-data:www-data common/runtime
sudo chown -R www-data:www-data frontend/web/assets
sudo chown -R www-data:www-data backend/web/assets

sudo chmod -R ugo+rw common/runtime
sudo chmod -R ugo+rw frontend/web/assets
sudo chmod -R ugo+rw backend/web/assets

ls -l
