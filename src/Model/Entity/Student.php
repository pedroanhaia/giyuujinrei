<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $urlpicture
 * @property int $idcore
 * @property int $idresponsible
 * @property string|null $phone
 * @property int|null $age
 * @property string|null $idclass
 * @property string|null $email
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $role
 * @property int|null $iduser
 * @property int|null $idgrank
 */
class Student extends Entity
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
        'urlpicture' => true,
        'idcore' => true,
        'idresponsible' => true,
        'phone' => true,
        'birthday' => true,
        'idsport' => true,
        'idclass' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'iduser' => true,
        'idgrank' => true,
    ];
}
