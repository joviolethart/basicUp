<?
namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model {

//proprietà
public $name;
public $email;

//metodi
  public function rules(){

      return[
        [['name','email'], 'required'],
        ['email','email'], // proproetà email(può aver altro nome)  validata come email
      ];
  }//RULES


}//ENTRYFORM


?>
