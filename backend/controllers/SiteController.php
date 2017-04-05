<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use backend\models\SignupForm;
use backend\models\ContactForm;

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
            'access' => [
                'class' => AccessControl::className(),
                /*'only' => ['logout', 'signup'],*/
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // if missing, value will be 'en'
        //$lang = Yii::$app->request->get('lang', 'en');
        //Yii::$app->language = $lang;

        $fuck = Yii::$app->request->get('fuck', 'fuck');
        $fuckfuck = Yii::$app->request->get('fuckfuck', '1');


        return $this->render('index', [
            'fuck' => $fuck,
            'fuckfuck' => $fuckfuck
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

#add from frontend
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
                  Yii::$app->session->setFlash('error', 'There was an error sending email.');
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
       * Signs user up.
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
                  Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
              }
          }

          return $this->render('requestPasswordResetToken', [
              'model' => $model,
          ]);
      }

      /**
       * Resets password.
       *
       * @param string $token
       * @return mixed
       * @throws BadRequestHttpException
       */
      public function actionResetPassword($token)
      {
          try {
              $model = new ResetPasswordForm($token);
          } catch (InvalidParamException $e) {
              throw new BadRequestHttpException($e->getMessage());
          }

          if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
              Yii::$app->session->setFlash('success', 'New password was saved.');

              return $this->goHome();
          }

          return $this->render('resetPassword', [
              'model' => $model,
          ]);
      }
#add from frontend end
}
