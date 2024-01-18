<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Responsible Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $rg
 * @property string|null $socialfunction
 * @property string|null $email
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $role
 * @property int|null $iduser
 */
class Responsible extends Entity
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
        'phone' => true,
        'rg' => true,
        'socialfunction' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'iduser' => true,
    ];
}
