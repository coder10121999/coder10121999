<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $category_id
 * @property string|null $details
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $PostUrl
 * @property string|null $PostImage
 * @property int|null $approved
 * @property int|null $created_by
 * @property int|null $modified_by
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Comment[] $comments
 */
class Post extends Entity
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
        'title' => true,
        'category_id' => true,
        'details' => true,
        'created' => true,
        'modified' => true,
        'PostUrl' => true,
        'PostImage' => true,
        'approved' => true,
        'created_by' => true,
        'modified_by' => true,
        'category' => true,
        'comments' => true,
    ];
}
