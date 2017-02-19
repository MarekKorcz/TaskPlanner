<?php

namespace TaskPlannerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="TaskPlannerBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 4,
     *      max = 30,
     *      minMessage = "Your category name must be at least {{ limit }} characters long",
     *      maxMessage = "Your category name cannot be longer than {{ limit }} characters"
     * )
     */
    private $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="categories")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;
    
    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="category", cascade={"All"})
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

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set user
     *
     * @param \AddressBookBundle\Entity\User $user
     * @return Category
     */
    public function setUser(\TaskPlannerBundle\Entity\User $user){
        
        $this->user = $user;
        
        return $this;
    }
    
    /**
     * Get user
     *
     * @return \AddressBookBundle\Entity\User 
     */
    public function getuser(){
        
        return $this->user;
    }
}
