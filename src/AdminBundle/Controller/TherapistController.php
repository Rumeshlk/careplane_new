<?php
/**
 * Created by PhpStorm.
 * User: Romesh
 * Date: 9/26/2016
 * Time: 11:21 PM
 */

namespace AdminBundle\Controller;

use AdminBundle\Entity\Therapist;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
class TherapistController extends Controller
{
    /**
     * @Route("/therapist" , name= "therapist_list")
     */
    public function showAction(){
        $laboratory_list = $this->getDoctrine()->getRepository('AdminBundle:Therapist')->findAll();
        return $this->render('Therapist/therapist.html.twig',array('therapist' => $laboratory_list ));
    }

    /**
     * @Route("/therapist/create" , name= "therapist_create")
     */
    public function createAction(Request $request)
    {
        $therapist = new therapist;

        $form = $this->createFormBuilder($therapist)
            ->add('Name',TextType::class)
            ->add('Email',TextType::class)
            ->add('type',TextType::class)
            ->add('isHead',TextType::class)
            ->add('save',SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            DIE('Submited');
        }

        return $this->render('Therapist/create.html.twig',array('form' => $form->createView()));
    }

}