<?php
namespace App\Model\Table;

use App\Model\Entity\ColaboradorProjeto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ColaboradorProjeto Model
 */
class ColaboradorProjetoTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('colaborador_projeto');
        $this->displayField('projeto_id');
        $this->primaryKey(['projeto_id', 'usuario_id']);
        $this->belongsTo('Projeto', [
            'foreignKey' => 'projeto_id',
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
            ->add('gerente', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('gerente');
            
        $validator
            ->add('ativo', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('ativo');

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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuario'));
        return $rules;
    }
}
