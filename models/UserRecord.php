<?php
namespace app\models;
use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord
{
    public static function tableName() {
        return 'user';
    }

    public function setTestUser()
    {
        $this->name = 'John';
        $this->email = 'vev@pub.osf.lt';
        $this->passhash = 'SHA512 HASH';
        $this->status = 2;
    }
}
