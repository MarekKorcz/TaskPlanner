<?php

namespace TaskPlannerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('date')
            ->add('deadline')
            ->add('priority')
            ->add('attach')
            ->add('category', EntityType::class, array(
                'class' => 'TaskPlannerBundle:Category',
                'query_builder' => function(EntityRepository $er) use($options){
                        return $er->displayLogedUsersCategories($options['userId']);
                },
                'choice_label' => 'name',
            ))
        ;
                
        /*
        $builder
            ->add('name')
            ->add('description')
            ->add('date')
            ->add('deadline')
            ->add('priority')
            ->add('attach')
            ->add('category', EntityType::class, array(
                'class' => 'TaskPlannerBundle:Category',
                'query_builder' => function(EntityRepository $er) use($options){
                        return $er->createQueryBuilder('c')
                            ->where('c.user = :userId')
                            ->setParameter('userId', $options['userId'])
                            ->orderBy('u.name', 'ASC')
                                ;
                },
                'empty_value' => 'There is no category to choose',
            ))
        ;
        */
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TaskPlannerBundle\Entity\Task'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'taskplannerbundle_task';
    }


}
