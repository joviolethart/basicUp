<?PHP
namespace app\controllers;

use Yii; // serve per passare i dati al form = (Yii::$app->request->post())
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class CountryController extends Controller{


public function actionIndex(){

  //andiamo ad utilizzare AvtiveRecord

  //eseguiamo una query
   $query = Country::find(); //la SELECT
  //$query è un recordset --PDO statement

   $pagination= new Pagination ([

    'defaultPageSize' => 5, //record per pagina
    'totalCount' => $query->count(), //conteggio record

  ]);


//ordinamento

$countries = $query->orderBy('name')
         ->offset($pagination->offset)
         ->limit ($pagination->limit)
// offset e limit stano in SQL per (n, m) /es: 15, 10 ->parti da 15 e mi fai paginazione per 10)

         ->all(); //traduce l'oggetto $query in una matrice array associativi =>fetchAll(PDO::FETCH_BOTH)

return $this->render('index',[

  'countries' => $countries,
  'pagination' => $pagination
]);

} //END ActionIndex


public function actionView($code){

       if(isset($code) && is_string($code)){
         $code=addslashes($code);
         $model = $this->findModel($code);  //abbiamo creato findModel class per non prendere ogno volta:
         //Country::find()->where(['code' => $code])->one();

         //la Select
         return $this->render('view',['model' => $model]);

     } else{
         return $this->redirect('index.php?r=country');
      }

    } //END ActonView

    public function actionDelete($code){

             $del = $this->findModel();
             $del->delete();

             return $this->redirect('index.php?r=country');


        } //END ActonDelete


        public function actionCreate(){

               //creo un nuovo model
                $model = new Country();

                //controllo se i dati sono stati postati e validati
                if ($model->load(Yii::$app->request->post())
                   && $model->validate())

                 {
                   //print_r($model); die();
                   $model->save();
                   return $this->redirect(['view', 'code' => $model->code]);
              }
                 else{
                   return $this->render('create', [
                        'model' => $model,
                       ]);
                 }

            } // END ActionCreate

            public function actionUpdate($code){

                  $model = new Country();

                    $model = $this->findModel($code); //$this => la classe generale CountryClass

                  //controllo se i dati sono stati postati e validati
                    if ($model->load(Yii::$app->request->post())
                       && $model->validate())

                     {
                       //print_r($model); die();
                       $model->save();
                       return $this->redirect(['view', 'code' => $model->code]);
                  }
                     else{
                       return $this->render('update', [
                            'model' => $model,
                           ]);
                     }

                } // END ActionCreate



    public function findModel($code){ //siccome non interviene direttamente in rooting la classe non inizia con Action

      $arrQuery = Country::find()->where(['code' => $code])->one();

      //print_r($arrQuery);die();
      return $arrQuery;


    } //END findModel

} //END Class

?>
