<?PHP
use yii\helpers\Html;
?>

<h2><?PHP echo $model['name'];?></h2> <!-- $model->name; - lavoro sull'oggetto -->

<?= Html::a('Update', ['country/update', 'code' => $model->code],
['class' => 'btn btn-primary']) ?>

<!-- <a href="index.php?r=country/update&code=<?PHP //echo $model->code?>" 
class="btn btn-primary">Update</a> -->

<?= Html::a('Delete', ['country/delete', 'code' => $model->code], [
           'class' => 'btn btn-danger',
           'data' => [
               'confirm' => 'Are you sure you want to delete this item?',
               'method' => 'post',
           ],
       ]) ?>
<p>
<ul>
  <li>The code of Country: <?PHP echo Html::encode($model['code']);?></li>
  <li>The name of Country: <?PHP echo Html::encode($model['name']);?></li>
  <li>The pupulation of Country: <?PHP echo Html::encode($model['population']);?></li>
</ul>
</p>
