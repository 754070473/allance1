<?php  
namespace frontend\models;
use yii\frontend\Model;
use yii\web\UploadedFile;
class UploadForm extends Model{    
	/**     
	 * * @var UploadedFile
	 * @return [type] [description]
	 */
    public $imageFile;    
    public function rules()    {        
    	return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];    
    }        
    public function upload()    {
	    if ($this->validate()) {
	        $this->imageFile->saveAs('upload/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
	        return true;        
	    } else {            
	    	return false;        
	    }    
    }
}




?>