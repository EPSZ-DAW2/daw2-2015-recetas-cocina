<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Usuario Entity.
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $nombre
 * @property string $rol
 * @property bool $aceptado
 * @property \Cake\I18n\Time $creado
 * @property \App\Model\Entity\Menu[] $menus
 * @property \App\Model\Entity\Planificacione[] $planificaciones
 * @property \App\Model\Entity\RecetaComentario[] $receta_comentarios
 * @property \App\Model\Entity\Receta[] $recetas
 * @property \App\Model\Entity\Tienda[] $tiendas
 */
class Usuario extends Entity
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
        '*' => true,
        'id' => false,
    ];
    
    /* 
     * Función estática que devuelve una lista con los roles definidos en la base de datos
     * 'A' = 'Administrador'
     * 'C' = 'Colaborador'
     * 'T' = 'Tienda'
     */
    public static function getRolUsuario()
    {
        $roles = [
            'A' => 'Administrador',
            'C' => 'Colaborador',
            'T' => 'Tienda'
        ];
        return $roles;
    }

    /*
     * Función estática que devuelve una lista con todos los roles definidos en la aplicación
     * Los roles que devuelve la función getRolUsuario() más el usuario 'sysadmin'
     */
    public static function getTodosRoles()
    {
        $roles = self::getRolUsuario();
        $todos = [
            'sysadmin' => 'sysadmin',
            '*' => 'Invitado'
        ];
        $todos = $roles+$todos;
        return $todos;
    }
    
    /**
     * DTR: Metodo para codificar la contraseña del usuario a la hora de 
     * establecerse en el modelo desde parametros de formulario, como en
     * el formulario de "login", o el de añadir "add" o el de editar "edit".
     */
    protected function _setPassword($password)
    {
        $res= null;
        if (strlen($password) > 0) {
            $res= (new DefaultPasswordHasher)->hash($password);
        }
        return $res;
    }
}
