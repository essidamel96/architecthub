<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Domaines Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $ParentDomaines
 * @property |\Cake\ORM\Association\HasMany $ChildDomaines
 *
 * @method \App\Model\Entity\Domaine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Domaine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Domaine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Domaine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Domaine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Domaine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Domaine findOrCreate($search, callable $callback = null, $options = [])
 */
class DomainesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('domaines');
        $this->setDisplayField('name');
        $this->setPrimaryKey('domaine_id');

        $this->belongsTo('ParentDomaines', [
            'className' => 'Domaines',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildDomaines', [
            'className' => 'Domaines',
            'foreignKey' => 'parent_id'
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
            ->integer('domaine_id')
            ->allowEmpty('domaine_id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentDomaines'));

        return $rules;
    }
}
