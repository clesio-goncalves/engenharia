<?php
namespace App\Model\Table;

use App\Model\Entity\Projeto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

/**
 * Projeto Model
 */
class ProjetoTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('projeto');
        $this->displayField('titulo');
        $this->primaryKey('id');
        $this->hasMany('Tarefa', [
            'foreignKey' => 'projeto_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');
            
        $validator
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');
            
        $validator
            ->add('data', 'valid', ['rule' => 'date'])
            ->allowEmpty('data');
            
        $validator
            ->add('previsao', 'valid', ['rule' => 'date'])
            ->allowEmpty('previsao');
            
        $validator
            ->allowEmpty('status');

        return $validator;
    }

    public function beforeSave(Event $evento, Entity $entidade){
        $entidade->data = date('Y-m-d');
    }
}
