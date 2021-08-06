<?php

namespace app\controllers;

use Yii;
use app\models\Artical;
use app\models\ArticalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticalController implements the CRUD actions for Artical model.
 */
class ArticalController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Artical models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	public function actionAlready()
	{
		return [
			'images-get' => [
				'class' => 'vova07\imperavi\actions\GetImagesAction',
				'url' => '/uploads', // Directory URL address, where files are stored.
				'path' => '@alias/uploads', // Or absolute path to directory where files are stored.
				'options' => ['only' => ['*.jpg', '*.jpeg', '*.png', '*.gif', '*.ico']], // These options are by default.
			],
		];
	}
	// DefaultController.php
public function actionUpload()
{
    return [
        'image-upload' => [
            'class' => 'vova07\imperavi\actions\UploadFileAction',
			'url' => '/uploads', // Directory URL address, where files are stored.
			'path' => '@alias/uploads', // Or absolute path to directory where files are stored.
        ],
    ];
}

    /**
     * Displays a single Artical model.
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
public function actions()
{
    return [
        // 'images-get' => [
            // 'class' => 'vova07\imperavi\actions\GetImagesAction',
            // 'url' => '/uploads', // Directory URL address, where files are stored.
            // 'path' => '@webroot/uploads', // Or absolute path to directory where files are stored.
        // ],
        'image-upload' => [
            'class' => 'vova07\imperavi\actions\UploadFileAction',
            'url' => '/uploads', // Directory URL address, where files are stored.
            'path' => '@webroot/uploads', // Or absolute path to directory where files are stored.
        ],
        'file-delete' => [
            'class' => 'vova07\imperavi\actions\DeleteFileAction',
            'url' => '/uploads', // Directory URL address, where files are stored.
            'path' => '@webroot/uploads', // Or absolute path to directory where files are stored.
        ],
    ];
}



    /**
     * Creates a new Artical model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Artical();

        if ($model->load(Yii::$app->request->post())) {
			$model->description="sample 3";
			if($model->save())
			{
			return $this->redirect(['view', 'id' => $model->id]);
			}else
			{
				print_r($model->geterrors());
				exit;
			}

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Artical model.
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
     * Deletes an existing Artical model.
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
     * Finds the Artical model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Artical the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Artical::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
