<?php

namespace Migrations;

use Illuminate\Database\Schema\Blueprint;
use PhpLab\Eloquent\Migration\Base\BaseCreateTableMigration;

if ( ! class_exists(m_2020_03_05_114403_create_identity_table::class)) {

    class m_2020_03_05_114403_create_identity_table extends BaseCreateTableMigration
    {

        protected $tableName = 'user_identity';
        protected $tableComment = '';

        public function tableSchema()
        {
            return function (Blueprint $table) {
                $table->integer('id')->autoIncrement()->comment('Идентификатор');
                $table->string('login')->comment('');
                $table->smallInteger('status')->comment('Статус');
            };
        }

    }

}