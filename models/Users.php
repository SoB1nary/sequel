<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username', 'password', 'auth_key', 'email', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password', 'auth_key', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'email' => Yii::t('app', 'Email'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find(): UsersQuery
    {
        return new UsersQuery(get_called_class());
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      throw new NotSupportedException();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey(): string
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey): bool
    {
        return $this->getAuthKey()===$authKey;
    }
    public function validatePassword(string $password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
    /**
     * @throws Exception
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = Yii::$app->security->generateRandomString();
            }
        }
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

}
