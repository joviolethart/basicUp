<?
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//inizio form
$form = ActiveForm::begin();

//i campi
echo $form->field($model,'name');//field= vai a scrivere a video un campo input type text associando a questo campo il valore della proprietà name del model
echo $form->field($model,'email');?>

<div class="form-group">
<?echo Html::submitButton('Submit',['class' => 'btn btn-primary']);// il pulsante di submit ?>
<?
//fine form
ActiveForm::end();

?>
</div>
