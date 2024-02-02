<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rank Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $color
 * @property string|null $description
 * @property int|null $idsport
 * @property string|null $obs1
 * @property string|null $obs2
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $role
 * @property string|null $urlimage
 */
class Rank extends Entity
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
        'color' => true,
        'description' => true,
        'idsport' => true,
        'obs1' => true,
        'obs2' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'urlimage' => true,
        'inactive' => true,
    ];
}
