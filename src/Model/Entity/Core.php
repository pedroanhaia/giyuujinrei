<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Core Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $city
 * @property int|null $cont_student
 * @property int|null $type
 * @property string|null $contact
 * @property string|null $positioncontact
 * @property string|null $phone
 * @property string|null $email
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $role
 */
class Core extends Entity
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
        'city' => true,
        'cont_student' => true,
        'type' => true,
        'contact' => true,
        'positioncontact' => true,
        'phone' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'inactive' => true,
    ];
}
