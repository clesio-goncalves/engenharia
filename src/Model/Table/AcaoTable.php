<?php
namespace App\Model\Table;

use App\Model\Entity\Acao;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

/**
 * Acao Model
 */
class AcaoTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('acao');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Tarefa', [
            'foreignKey' => 'tarefa_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Usuario', [
            'foreignKey' => 'usuario_id',
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
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo')
            ->add('role', 'inList', [
                'rule' => ['inList', ['D', 'P']],
                'message' => 'Error: Informe um tipo valido'
            ]);
            
        $validator
            ->requirePresence('observacao', 'create')
            ->notEmpty('observacao', 'Error: Observação obrigatório!');
            

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
        $rules->add($rules->existsIn(['tarefa_id'], 'Tarefa'));
        $rules->add($rules->existsIn(['usuario_id'], 'Usuario'));
        return $rules;
    }

    public function beforeSave(Event $evento, Entity $entidade){
        $entidade->data = date('Y-m-d');
    }
}
