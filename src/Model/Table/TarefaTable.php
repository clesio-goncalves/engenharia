<?php
namespace App\Model\Table;

use App\Model\Entity\Tarefa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

/**
 * Tarefa Model
 */
class TarefaTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('tarefa');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Projeto', [
            'foreignKey' => 'projeto_id',
            'joinType' => 'INNER'
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
            ->notEmpty('titulo', 'Error: Titulo obrigatório!')
            ->add('titulo', [
                'length' => [
                    'rule' => ['minLength', 10],
                    'message' => 'Error titulo: Minimo de caracteres 10!',
                ]
            ]);
            
        $validator
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao', 'Error: Descrição obrigatório!')
            ->add('descricao', [
                'length' => [
                    'rule' => ['minLength', 20],
                    'message' => 'Error descrição: Minimo de caracteres 10!',
                ]
            ]);
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['projeto_id'], 'Projeto'));
        return $rules;
    }

    public function beforeSave(Event $evento, Entity $entidade){
        $entidade->data = date('Y-m-d');
    }
}
