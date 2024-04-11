<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Index Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $age_min
 * @property int|null $age_max
 * @property int|null $role
 * @property int|null $idrating
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Index extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'age_min' => true,
        'age_max' => true,
        'role' => true,
        'idrating' => true,
        'created' => true,
        'modified' => true,
        'inactive' => true,
    ];
}