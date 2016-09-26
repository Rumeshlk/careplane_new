<?php
/**
 * Created by PhpStorm.
 * User: Romesh
 * Date: 9/26/2016
 * Time: 9:23 PM
 */

namespace AdminBundle\Controller;

use AdminBundle\Entity\Units;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\HttpFoundation\Request;

class UnitController extends Controller
{
    /**
     * @Route("/units" , name= "units")
     */
    public function showAction(){
        $units_list = $this->getDoctrine()->getRepository('AdminBundle:Units')->findAll();
        return $this->render('AdminBundle:Units:units.html.twig',array('unit' => $units_list ));
    }

    /**
     * @Route("/units/create" , name= "units_create")
     */
    public function createAction(Request $request)
    {
        $unit = new Units;

        $form = $this->createFormBuilder($unit)
            ->add('Name_singular',TextType::class)
            ->add('Name_plural',TextType::class)
            ->add('Abbreviation',TextType::class)
            ->add('save',SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            DIE('Submited');
        }

        return $this->render('AdminBundle:Units:create.html.twig',array('form' => $form->createView()));
    }

}