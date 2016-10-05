<?php
/**
 * Created by PhpStorm.
 * User: Romesh
 * Date: 9/26/2016
 * Time: 10:06 PM
 */

namespace AdminBundle\Controller;

use AdminBundle\Entity\Diseases;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;



class DiseasesController extends Controller
{
    /**
     * @Route("/diseases" , name= "diseases_list")
     */
    public function showAction(){
        $laboratory_list = $this->getDoctrine()->getRepository('AdminBundle:Diseases')->findAll();
        return $this->render('AdminBundle:Diseases:diseases.html.twig',array('diseases' => $laboratory_list ));
    }

    /**
     * @Route("/Diseases/create" , name= "diseases_create")
     */
    public function createAction(Request $request)
    {
        $diseases = new Diseases;

        $form = $this->createFormBuilder($diseases)
            ->add('Disease_name',TextType::class)
            ->add('category',TextType::class)
            ->add('description',TextareaType::class)
            ->add('save',SubmitType::class)

            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            DIE('Submited');
        }

        return $this->render('AdminBundle:Diseases:create.html.twig',array('form' => $form->createView()));
    }

}

