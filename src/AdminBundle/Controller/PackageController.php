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
        $package_list = $this->getDoctrine()->getRepository('AdminBundle:Package')->findAll();
        return $this->render('Package/package.html.twig',array('package' => $package_list ));
    }

    /**
     * @Route("/package/create" , name= "package_create")
     */
    public function createAction(Request $request)
    {
        $Package = new Package;

        $form = $this->createFormBuilder($Package)
            ->add('singular_name',TextType::class, array('attr' => array('class' => 'form-control input-sm', 'style' => 'margin-bottom:15px')))
            ->add('plural_name',TextType::class, array('attr' => array('class' => 'form-control input-sm', 'style' => 'margin-bottom:15px')))
            ->add('save',SubmitType::class, array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary input-sm col-md-4', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           // get submitted data
            $s_name = $form['singular_name']->getData();
            $p_name = $form['plural_name']->getData();

            $Package->setSingularName($s_name);
            $Package->setPluralName($p_name);

            $em = $this->getDoctrine()->getManager();
            $em->persist($Package);

            $em->flush();

            $this->addFlash(
                'notice', 'Package Added'
            );
            return $this->redirectToRoute('package');
        }

        return $this->render('Package/create.html.twig',array('form' => $form->createView()));
    }

    /**
     * @Route("/package/edit/{id}" ,name = "package_edit")
     */
    public function editAction($id, Request $request)
    {
        $Package = $this->getDoctrine()->getRepository('AdminBundle:Package')->find($id);

        $Package->setSingularName($Package->getSingularName());
        $Package->setPluralName($Package->getPluralName());

        $form = $this->createFormBuilder($Package)
            ->add('singular_name',TextType::class, array('attr' => array('class' => 'form-control input-sm', 'style' => 'margin-bottom:15px')))
            ->add('plural_name',TextType::class, array('attr' => array('class' => 'form-control input-sm', 'style' => 'margin-bottom:15px')))
            ->add('save',SubmitType::class, array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary input-sm col-md-4', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //get submitted data
            $s_name = $form['singular_name']->getData();
            $p_name = $form['plural_name']->getData();

            $em = $this->getDoctrine()->getManager();
            $Package = $em->getRepository('AdminBundle:Package')->find($id);

            $Package->setSingularName($s_name);
            $Package->setPluralName($p_name);

            $em->flush();

            $this->addFlash(
                'notice', 'Unit Updated'
            );
            return $this->redirectToRoute('package');
        }
        return $this->render('Package/edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/package/delete/{id}" ,name = "package_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $unit = $em->getRepository('AdminBundle:Units')->find($id);

        $em->remove($unit);
        $em->flush();

        $this->addFlash(
            'notice', 'Unit Deleted'
        );
        return $this->redirectToRoute('units');
    }

}

