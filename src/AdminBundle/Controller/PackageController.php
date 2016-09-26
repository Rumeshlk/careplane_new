<?php
/**
 * Created by PhpStorm.
 * User: Romesh
 * Date: 9/26/2016
 * Time: 10:06 PM
 */

namespace AdminBundle\Controller;

use AdminBundle\Entity\Package;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;



class PackageController extends Controller
{
    /**
     * @Route("/package" , name= "package")
     */
    public function showAction(){
        $units_list = $this->getDoctrine()->getRepository('AdminBundle:Package')->findAll();
        return $this->render('AdminBundle:Package:package.html.twig',array('package' => $units_list ));
    }

    /**
     * @Route("/package/create" , name= "package_create")
     */
    public function createAction(Request $request)
    {
        $Package = new Package;

        $form = $this->createFormBuilder($Package)
            ->add('singular_name',TextType::class)
            ->add('plural_name',TextType::class)
            ->add('save',SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            DIE('Submited');
        }

        return $this->render('AdminBundle:Package:create.html.twig',array('form' => $form->createView()));
    }

}

