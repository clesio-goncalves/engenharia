<?php
namespace App\Model\Table;

use App\Model\Entity\Usuario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuario Model
 */
class UsuarioTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('usuario');
        $this->displayField('email');
        $this->primaryKey('id');
        $this->hasMany('Acao', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('ColaboradorProjeto', [
            'foreignKey' => 'usuario_id'
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome', 'Error: Nome obrigatório!')
            ->add('nome', [
                'length' => [
                    'rule' => ['minLength', 10],
                    'message' => 'Error nome: Minimo de caracteres 10!',
                ]
            ]);
            
        $validator
            ->add('email', 'valid', ['rule' => 'email', 'message'=>'Error: E-mail invalido!'])  
            ->requirePresence('email', 'create')
            ->notEmpty('email', 'Error: E-mail obrigatório!');

        $validator->add('email', [
            'unique' => [
                'rule' => 'validateUnique', 
                'provider' => 'table',
                'message'=>'Error: E-mail já cadastrado!'

            ]
        ]);

        $validator
            ->requirePresence('senha', 'create')
            ->notEmpty('senha', 'Error: Senha obrigatória!')
            ->add('senha', [
                'minLength' => [
                    'rule' => ['minLength', 8],
                    'last' => true,
                    'message' => 'Error senha: Minimo de 8 caracteres.'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 12],
                    'message' => 'Error senha: Maximo de 12 caracteres.'
                ]
            ]);
        $extra = 'tss';
        $validator->add('senha', 'create', [
            'rule' => function ($value, $context) use ($extra) {
                return $context['data']['senha']==$context['data']['confSenha'];                
            },
            'message'=>'Error: Senhas não coincidem!',
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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
