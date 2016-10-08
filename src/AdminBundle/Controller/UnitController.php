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
    public function showAction()
    {
        $units_list = $this->getDoctrine()->getRepository('AdminBundle:Units')->findAll();
        return $this->render('AdminBundle:Units:units.html.twig', array('unit' => $units_list));
    }

    /**
     * @Route("/units/create" , name= "units_create")
     */
    public function createAction(Request $request)
    {
        $unit = new Units;

        $form = $this->createFormBuilder($unit)
            ->add('Name_singular', TextType::class, array('attr' => array('class' => 'form-control input-sm', 'style' => 'margin-bottom:15px')))
            ->add('Name_plural', TextType::class, array('attr' => array('class' => 'form-control input-sm', 'style' => 'margin-bottom:15px')))
            ->add('Abbreviation', TextType::class, array('attr' => array('class' => 'form-control input-sm', 'style' => 'margin-bottom:15px')))
            ->add('save', SubmitType::class, array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary input-sm col-md-4', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //get submitted data
            $s_name = $form['Name_singular']->getData();
            $p_name = $form['Name_plural']->getData();
            $abbr = $form['Abbreviation']->getData();

            $unit->setNameSingular($s_name);
            $unit->getNamePlural($p_name);
            $unit->setAbbreviation($abbr);

            $em = $this->getDoctrine()->getManager();

            $em->persist($unit);
            $em->flush();

            $this->addFlash(
                'notice', 'Unit Added'
            );
            return $this->redirectToRoute('units');
        }

        return $this->render('AdminBundle:Units:create.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/units/edit/{id}" ,name = "units_edit")
     */
    public function editAction($id, Request $request)
    {
        $unit = $this->getDoctrine()->getRepository('AdminBundle:Units')->find($id);

        $unit->setNameSingular($unit->getNameSingular());
        $unit->getNamePlural($unit->getNamePlural());
        $unit->setAbbreviation($unit->getAbbreviation());

        $form = $this->createFormBuilder($unit)
            ->add('Name_singular', TextType::class, array('attr' => array('class' => 'form-control input-sm', 'style' => 'margin-bottom:15px')))
            ->add('Name_plural', TextType::class, array('attr' => array('class' => 'form-control input-sm', 'style' => 'margin-bottom:15px')))
            ->add('Abbreviation', TextType::class, array('attr' => array('class' => 'form-control input-sm', 'style' => 'margin-bottom:15px')))
            ->add('save', SubmitType::class, array('label' => 'Update', 'attr' => array('class' => 'btn btn-primary input-sm col-md-4', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //get submitted data
            $s_name = $form['Name_singular']->getData();
            $p_name = $form['Name_plural']->getData();
            $abbr = $form['Abbreviation']->getData();

            $em = $this->getDoctrine()->getManager();
            $unit = $em->getRepository('AdminBundle:Units')->find($id);

            $unit->setNameSingular($s_name);
            $unit->getNamePlural($p_name);
            $unit->setAbbreviation($abbr);

            $em->flush();

            $this->addFlash(
                'notice', 'Unit Updated'
            );
            return $this->redirectToRoute('units');
        }
        return $this->render('AdminBundle:Units:edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/units/delete/{id}" ,name = "units_delete")
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