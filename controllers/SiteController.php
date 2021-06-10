<?php

namespace app\controllers;

use app\models\Genres;
use app\models\Artists;
use app\models\Albums;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->view->title = 'Моя музыка';

        $genres = Genres::find()->all();

        return $this->render('index', compact('genres'));
    }

    public function actionGenre($id)
    {
        $this->view->title = 'Моя музыка';

        $genre = Genres::findOne($id);
        if ($genre === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('genre', compact('genre'));
    }

    public function actionArtist($id)
    {
        $this->view->title = 'Моя музыка';

        $artist = Artists::findOne($id);
        if ($artist === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('artist', compact('artist'));
    }

    public function actionAlbum($id)
    {
        $this->view->title = 'Моя музыка';

        $album = Albums::findOne($id);
        if ($album === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('album', compact('album'));
    }

    public function actionSearch()
    {
        $this->view->title = 'Моя музыка';

        $search = Yii::$app->request->get('search');

        $query = new \yii\db\Query();

        $result = $query->select([
            'genres.name AS genre_name',
            'artists.id AS artist_id',
            'artists.name AS artist_name',
            'albums.id AS album_id',
            'albums.name AS album_name',
            'albums.year AS year',
            'tracks.name AS track_name',
        ])->from('artists')
            ->innerJoin('artist_genre', 'artists.id = artist_genre.artist_id')
            ->innerJoin('genres', 'artist_genre.genre_id = genres.id')
            ->innerJoin('albums', 'artists.id = albums.artist_id')
            ->innerJoin('tracks', 'albums.id = tracks.album_id')
            ->where(['or', ['like', 'artists.name', ':search', [':search' => $search]], ['like', 'albums.name',':search', [':search' => $search]], ['like', 'tracks.name', ':search', [':search' => $search]]])
        ->all();

        $artists = [];
        $genres = [];
        $albums = [];
        $tracks = [];
        foreach ($result as $item) {
            $artist = array('id' => $item['artist_id'], 'name' => $item['artist_name']);

            if(!in_array($artist, $artists)) {
                $artists[] = $artist;
                $genres[$item['artist_id']][] = $item['genre_name'];
            } else if(in_array($artist, $artists) && !in_array($item['genre_name'], $genres[$item['artist_id']])) {
                array_push($genres[$item['artist_id']], $item['genre_name']);
            }

            $album = array('id' => $item['album_id'], 'name' => $item['album_name'], 'artist_name' => $item['artist_name'], 'year' => $item['year']);

            if(!in_array($album, $albums)) {
                $albums[] = $album;
            }

            $track = array('name' => $item['track_name'], 'artist_name' => $item['artist_name'], 'album_name' => $item['album_name']);

            if(!in_array($track, $tracks)) {
                $tracks[] = $track;
            }
        }


        return $this->renderAjax('search', compact('artists', 'genres', 'albums', 'tracks'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
