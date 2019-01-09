<?php

namespace frontend\controllers;

use Yii;
use common\models\Receita;
use common\models\ReceitaSearch;
use common\models\Curtidas;
use common\models\Comentario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

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
        $like = Curtidas::find()->where(['id_receita' => $id, 'id_user' => Yii::$app->user->id, 'status' => 1])->one();
        $dislike = Curtidas::find()->where(['id_receita' => $id, 'id_user' => Yii::$app->user->id, 'status' => -1])->one();

        if (yii::$app->user->isGuest) {
            return $this->redirect(['index', 'flag' => 0]);
        }

        $comment = Comentario::find()->where(['id_receita' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $comment,
            //ordenar os comentarios mais recentes primeiro
            'sort' => [
                'defaultOrder' => [
                    'data_hora' => SORT_DESC,
                ],
            ],
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'like' => $like,
            'dislike' => $dislike,
            'dataProvider' => $dataProvider
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


    public function actionCurtidas($receita_id = null, $like = null)
    {

        // try get like per recipe
        if (!empty($receita_id) && !Yii::$app->user->isGuest) {
            $curtida = Curtidas::find()->where(['id_receita' => $receita_id, 'id_user' => Yii::$app->user->id])->one();

            $data = Receita::find()->where(['id' => $receita_id])->one();

            if (!empty($like) && empty($curtida)) {
                $novaCurtida = new Curtidas();
                $novaCurtida->id_user = Yii::$app->user->id;
                $novaCurtida->id_receita = $receita_id;
                $novaCurtida->status = $like;
                $novaCurtida->save();

                if (empty($data)) {
                    // new record
                    $data = new Receita();
                    $data->id = $receita_id;
                }
                // set from like /dislike
                if (empty($curtida->status)) {
                    if ($like < 0) {
                        $data->descurtir = $data->descurtir + 1;
                    } else {
                        $data->curtir = $data->curtir + 1;
                    }
                    $data->save();
                }
            }
            //utilizador não pode curtir e descurtir ao mesmo tempo
            elseif ($curtida->status == $like) {
                $curtida->delete();
                if ($like < 0) {
                    $data->descurtir = $data->descurtir - 1;
                } else {
                    $data->curtir = $data->curtir - 1;
                }
                $data->save();
            } else {
                $curtida->status;
            }
        }
        return $this->redirect(['view', 'id' => $receita_id]);
    }

    public function actionList()
    {
        $dataProvider = new ActiveDataProvider();

        $this->view->title = 'Comentário List';
        return $this->render('list', ['listDataProvider' => $dataProvider,
        ]);
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
