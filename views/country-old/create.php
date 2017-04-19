<?PHP
use yii\helpers\Html;
?>

<h2> New Country </h2>

<?PHP
echo $this-> render ('_form', [
          'model' =>$model,
])
?>
