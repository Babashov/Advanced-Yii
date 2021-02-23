<?php


namespace backend\controllers;

use Yii;

use backend\models\search\SlidersSearch;
use common\models\Sliders;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class SliderController extends Controller
{
    public function behaviors()
    {
        return [
          'access'=>[
              'class' => AccessControl::className(),
              'rules' => [
                  [
                      'actions' => ['index','view','create','update','delete'],
                      'allow' => true,
                      'roles' => ['@']
                  ]
              ]
          ]
        ];
    }

    public function actionIndex()
    {
        $searchModel = new SlidersSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return $this->render('index',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view',[
           'model' => $this->findModel($id)
        ]);
    }

    public function actionCreate()
    {
        $model = new Sliders();
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $image_url = $model->image_url;
        unlink(Yii::getAlias('@frontend/web/storage'.$image_url));
        $model->delete();
        return $this->redirect(['index']);
    }



    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sliders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sliders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}