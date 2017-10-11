<?php

namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\AdminLoginForm;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use backend\models\SignupForm;
use backend\models\ContactForm;
use common\models\UploadForm;
use yii\web\UploadedFile;


/**
 * Site controller
 */
class SiteController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update','delete'],

                'rules' => [ [

                    'allow' => true,
                    'roles' => ['@'],
//                    'actions' => ['login','profile'],

                ],
                ],

            ]
        ];

    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout = "loginLayout";

        $model = new AdminLoginForm();
//        Yii::trace("Is this access guest or not: " . Yii::$app->user->isGuest, 'debug');
//        if (Yii::$app->user->isGuest) {
//            return $this->render('login', [
//                'model' => $model,
//            ]);
//        }


        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::trace("Is this access guest or not: " .Yii::$app->user->identity->role, 'debug');

            if (Yii::$app->user->identity->role == 'admin') {
//
                    $this->redirect('../dashboard/index');

                } else {

                    return $this->goBack();
                }

        } else {
            return $this->render('login', [
                'model' => $model,
            ]);


        }

    }
    /**
     * Logs out the current admin
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs admin up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
      $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
          if ($user = $model->signup()) {
               if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
               }
           }
       }

       return $this->render('signup', [
           'model' => $model,
        ]);
   }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

//    public function actionUpload()
//    {
//        $upload = new UploadForm();
//
//        if (Yii::$app->request->isPost)
//        {
//            $upload->product_image = UploadedFile::getInstance($upload, 'product_image');
//
//            if ($upload->upload()) {
//
//
//                // file is uploaded successfully
//                return $this->render('test');
//            }
//        }
//
//        return $this->render('upload', ['model' => $upload]);
//    }


}
