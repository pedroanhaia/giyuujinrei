<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Assessment Entity
 *
 * @property int $id
 * @property int $idindex
 * @property int $idteacher
 * @property int $idstudent
 * @property int $value
 * @property int|null $idschedule
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $role
 */
class Assessment extends Entity
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
        'idindex' => true,
        'idteacher' => true,
        'idstudent' => true,
        'value' => true,
        'idschedule' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
    ];
}
