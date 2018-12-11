<?php

namespace frontend\controllers;

use Yii;
use common\models\Comentario;
use common\models\ComentarioSearch;
use yii\rbac\DbManager;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Receita;

/**
 * ComentarioController implements the CRUD actions for Comentario model.
 */
class ComentarioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Comentario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComentarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comentario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Comentario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_receita)
    {
        $model = new Comentario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['receita/view', 'id' => $model->id_receita]);
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id_receita
        ]);
    }

    /**
     * Updates an existing Comentario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $id_receita)
    {
        $model = $this->findModel($id);
        //var_dump(\Yii::$app->user); die();
        if (\Yii::$app->user->can('updateComment', ['model' => $model])) {
            //var_dump(\Yii::$app->user); die();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['receita/view', 'id' => $id_receita]);
            }
            return $this->render('update', [
                'model' => $model,
                'id' => $id,
                'id_receita' => $id_receita
            ]);
        }
    }


    /**
     * Deletes an existing Comentario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $id_receita)
    {
        $this->findModel($id)->delete();

        return $this->redirect(array('receita/view',

            'id' => $id_receita));
    }

    /**
     * Finds the Comentario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comentario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comentario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
