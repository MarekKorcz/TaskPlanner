<?php

namespace TaskPlannerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="TaskPlannerBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="user", cascade={"All"})
     */
    private $categories;
    
    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="user", cascade={"All"})
     */
    private $messages;
    
    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="user", cascade={"All"})
     */
    private $tasks;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    
    public function __construct(){
        
        parent::__construct();
    }
}
