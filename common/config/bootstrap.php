<?php

$root = $_ENV['PROJECT_DIR'];

Yii::setAlias('@root', $root);
Yii::setAlias('@common', $root . '/common');
Yii::setAlias('@frontend', $root . '/frontend');
Yii::setAlias('@backend', $root . '/backend');
Yii::setAlias('@console', $root . '/console');
Yii::setAlias('@api', $root . '/api');
