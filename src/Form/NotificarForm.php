<?php 
namespace App\Form;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class NotificarForm extends Form{
	/*
	 * Cria schema do formulário
	 * @param Schema object
	 * @return Schema object
	 */
	protected function _buildSchema(Schema $schema){
	 	return $schema
	 		->addField('assunto', ['type'=>'string'])
	 		->addField('texto', ['type' => 'text'])
	 		->addField('anexo', ['type' => 'file']);
	}
	/*
	*Add regras de validação aos campos do formulário
	* @param Validator object
	* @return Validator object
	*/
	 protected function _buildValidator(Validator $validator)
    {
    	$validator->notEmpty('assunto', "Error: Assunto obrigatório");
    	$validator->notEmpty('texto', "Error: Texto obrigatório");    	
    	return $validator;
    }
	protected function _execute(array $data){
		return true;
	}
}
?>