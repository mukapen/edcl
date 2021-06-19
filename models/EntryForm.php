<?php
namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    // properties to store the data entered by the user
    public $name;
    public $email;
    public $age;

    // return a set of rules for validating the data
    // 1. both name and email values are required
    // 2. email data must be syntactically valid email address
    public function rules()
    {
        return [
           [['name', 'email', 'age'], 'required'],
           ['email', 'email'],
        ];
    }
}
