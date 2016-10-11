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
    public function showAction()
    {
        $laboratory_list = $this->getDoctrine()->getRepository('AdminBundle:Laboratory')->findAll();
        return $this->render('AdminBundle:Laboratory:laboratory.html.twig', array('laboratory' => $laboratory_list));
    }

    /**
     * @Route("/laboratory/create" , name= "laboratory_create")
     */
    public function createAction(Request $request)
    {
        $laboratory = new Laboratory;

        $form = $this->createFormBuilder($laboratory)
            ->add('Laboratory_Name', TextType::class, array('attr' => array('class' => 'form-control input-sm', 'style' => 'margin-bottom:15px')))
            ->add('save', SubmitType::class, array('label' => 'Add', 'attr' => array('class' => 'btn btn-primary input-sm col-md-4', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            DIE('Submited');
        }

        return $this->render('AdminBundle:Laboratory:create.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/laboratory/edit/{id}",name = "lab_edit")
     *
     */
    public function editAction($id, Request $request)
    {

        $lab = $this->getDoctrine()->getRepository('AdminBundle:Laboratory')->find($id);

        $lab->setLaboratoryName($lab->getLaboratoryName());

        $form = $this->createFormBuilder($lab)
            ->add('Laboratory_Name', TextType::class, array('attr' => array('class' => 'form-control input-sm', 'style' => 'margin-bottom:15px')))
            ->add('save', SubmitType::class, array('Update' => 'Add', 'attr' => array('class' => 'btn btn-primary input-sm col-md-4', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //get submitted data

            $l_name = $form['Laboratory_Name']->getData();

            $em = $this->getDoctrine()->getManager();
            $lab = $em->getRepository('AdminBundle:Laboratory')->find($id);

            $lab->setLaboratoryName($l_name);

            $em->flush();

            $this->addFlash(
                'notice', 'Laboratory Updated'
            );
            return $this->redirectToRoute('laboratory');
        }
        return $this->render('AdminBundle:Laboratory:edit.html.twig', array('form' => $form->createView()));

    }
}

