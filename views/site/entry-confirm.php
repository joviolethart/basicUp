
<?PHP
use yii\helpers\Html;
?>

<p>Hai inserito seguenti dati:</p>


<ul>
  <li><label> Nome </label> : <?= Html::encode($model->name) ?></li> <!--encode è metodo statico-->
  <li><label> Email </label> : <?= Html::encode($model->email) ?></li>

</ul>
