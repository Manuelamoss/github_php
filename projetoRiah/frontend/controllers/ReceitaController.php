<?php

namespace frontend\controllers;

use Yii;
use common\models\Receita;
use common\models\ReceitaSearch;
use common\models\Curtidas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReceitaController implements the CRUD actions for Receita model.
 */
class ReceitaController extends Controller
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
     * Lists all Receita models.
     * @return mixed
     */
    public function actionIndex($flag = 1)
    {
        $mensagemErro = ' ';
        if ($flag == 0) {
            $mensagemErro = 'Deve-se fazer login para ver o conteudo.';
        }
        $searchModel = new ReceitaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'mensagemErro' => $mensagemErro,
            'flag' => $flag
        ]);
    }

    /**
     * Displays a single Receita model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $like = Curtidas::find()->where(['id_receita' => $id,'id_user' => Yii::$app->user->id, 'status' => 1])->one();
        $dislike = Curtidas::find()->where(['id_receita' => $id,'id_user' => Yii::$app->user->id, 'status' => -1])->one();


        if (yii::$app->user->isGuest) {
            return $this->redirect(['index', 'flag' => 0]);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'like'=>$like,
            'dislike'=>$dislike
        ]);
    }

    /**
     * Creates a new Receita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Receita();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionTestPjax1($receita_id = null, $like = null)
    {

        // try get like per post
        if (!empty($receita_id) && !Yii::$app->user->isGuest) {
            $curtida = Curtidas::find()->where(['id_receita' => $receita_id,'id_user' => Yii::$app->user->id, 'status' => $like])->one();

            $data = Receita::find()->where(['id' => $receita_id])->one();

            if (!empty($like) && empty($curtida)) {
                $novaCurtida = new Curtidas();
                $novaCurtida->id_user = Yii::$app->user->id;
                $novaCurtida->id_receita = $receita_id;
                $novaCurtida->status = $like;
                $novaCurtida->save();

                // set from like /dislike
                if (empty($data)) {
                    // new record
                    $data = new Receita();
                    $data->id = $receita_id;
                }

                if ($like < 0) {
                    $data->descurtir = $data->descurtir + 1;
                } else {
                    $data->curtir = $data->curtir + 1;
                }
                $data->save();
            } else {
                $curtida->delete();
                if ($like < 0) {
                    $data->descurtir = $data->descurtir - 1;
                } else {
                    $data->curtir = $data->curtir - 1;
                }
                $data->save();
            }
        }
        return $this->redirect(['view', 'id' => $receita_id]);
    }

    /**
     * Updates an existing Receita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Receita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Receita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Receita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Receita::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
