<?php
/**
 * Created by PhpStorm.
 * User: Romesh
 * Date: 9/26/2016
 * Time: 10:06 PM
 */

namespace AdminBundle\Controller;

use AdminBundle\Entity\Laboratory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;



class LaboratoryController extends Controller
{
    /**
     * @Route("/laboratory" , name= "laboratory")
     */
    public function showAction(){
        $laboratory_list = $this->getDoctrine()->getRepository('AdminBundle:Laboratory')->findAll();
        return $this->render('AdminBundle:Laboratory:laboratory.html.twig',array('laboratory' => $laboratory_list ));
    }

    /**
     * @Route("/laboratory/create" , name= "laboratory_create")
     */
    public function createAction(Request $request)
    {
        $laboratory = new Laboratory;

        $form = $this->createFormBuilder($laboratory)
            ->add('Laboratory_Name',TextType::class)
            ->add('save',SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            DIE('Submited');
        }

        return $this->render('AdminBundle:Laboratory:create.html.twig',array('form' => $form->createView()));
    }

}

