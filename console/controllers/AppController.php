<?php
namespace console\controllers;

use common\models\AboutUs;
use common\models\Gallery;
use common\models\Languages;
use common\models\Sliders;
use common\models\User;
use yii\console\Controller;
use yii\helpers\Console;

class AppController extends Controller
{
    public function actionCreateAdminUser($username,$password=null)
    {
        $password = $password?:\Yii::$app->security->generateRandomString(8);
        $this->addModelToDb(
            User::class,
            [
                'name'=>'admin',
                'surname'=>'admin',
                'email'=>$username.'@example.com',
                'username'=>$username,
                'admin'=>1,
                'status'=>User::STATUS_ACTIVE,
                'password_hash' => \Yii::$app->security->generatePasswordHash($password),
            ]
        );

    }

    public function actionRemoveUser($userId)
    {
        $user = User::findOne(['id'=>$userId]);
        if($user === null)
        {
            Console::error("There is no user with \"$userId\" ");
        }else{
            if($user->delete() === false)
            {
                Console::error('User not deleted');
            }else{
                Console::output('User deleted');
                Console::output($user);
            }
        }
    }

    public function actionAddLanguage($langName = '',$langCode = '')
    {
        if($langName == '' && $langCode == '')
        {
            $this->addModelToDb(
                Languages::class,
                [
                    'name'=>'Azərbaycan',
                    'code'=>'az'
                ],
                [
                    'Azerbaijan language added',
                    'Azerbaijan language NOT added'
                ]
            );
            $this->addModelToDb(
                Languages::class,
                [
                    'name'=>'English',
                    'code'=>'en'
                ],
                [
                    'English language added',
                    'English language NOT added'
                ]
            );
            $this->addModelToDb(
                Languages::class,
                [
                    'name'=>'Русский','code'=>'ru'
                ],
                [
                    'Russian language added',
                    'Russian language NOT added'
                ]
            );
        }else{
            $this->addModelToDb(
                Languages::class,
                [
                    'name' => $langName,
                    'code' => $langCode
                ],
                [
                    "$langName added",
                    "$langName NOT added"
                ]
            );
        }
    }

    public function actionAddSlider($title = '',$image_url = '',$land_id = 1)
    {
        $this->addModelToDb(
            Sliders::class,
            [
                'title'=>$title,
                'image_url'=>$image_url,
                'lang_code' => $land_id
            ]
        );
    }

    public function actionDbSeed($modelName,$count = 0)
    {
        $modelNameWithNamespace = 'common\models\\'.$modelName;
        if(class_exists($modelNameWithNamespace))
        {
            echo "var";
        }else{
            Console::error("$modelNameWithNamespace Model Not Found");
        }
//        $model = new $modelNameWithNamespace();
//        var_dump($model);
    }

    protected function addModelToDb($modelName,$modelPrams = [],$outputMsg = ['Added','Not Added'])
    {
        $model = new $modelName();
        foreach ($modelPrams as $key=>$value)
        {
            $model->{$key} = $value;
        }
        if($model->save())
        {
            Console::output($outputMsg[0]);
        }else{
            Console::error($outputMsg[1]);
        }
    }
}

