<?php
namespace App\Model\Table;

use App\Model\Entity\RecetaCategoria;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecetaCategorias Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Recetas * @property \Cake\ORM\Association\BelongsTo $Categorias */
class RecetaCategoriasTable extends Table
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

        $this->table('receta_categorias');
        $this->displayField(['receta_id', 'categoria_id']);
        $this->primaryKey(['receta_id', 'categoria_id']);

        $this->belongsTo('Recetas', [
            'foreignKey' => 'receta_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
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
            ->add('receta_id', 'valid', ['rule' => 'numeric'])            
            ->allowEmpty('receta_id', 'create');
        $validator
            ->add('categoria_id', 'valid', ['rule' => 'numeric'])            
            ->allowEmpty('categoria_id', 'create');
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
        $rules->add($rules->existsIn(['receta_id'], 'Recetas'));
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'));
        return $rules;
    }
}
