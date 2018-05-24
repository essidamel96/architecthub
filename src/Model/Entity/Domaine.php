<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Domaine Entity
 *
 * @property int $domaine_id
 * @property string $name
 * @property int $parent_id
 */
class Domaine extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'parent_id' => true
    ];
}
