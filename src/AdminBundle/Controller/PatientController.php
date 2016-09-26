<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Patient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\HttpFoundation\Request;

class PatientController extends Controller
{
    /**
     * @Route("/patient", name = "patient_list")
     */
    public function listAction()
    {
        $patient_list = $this->getDoctrine()->getRepository('AdminBundle:Patient')->findAll();
        return $this->render('AdminBundle:Patient:index.html.twig',array('patient' => $patient_list ));
    }

    /**
     * @Route("/patient/create" , name= "patient_create")
     */
    public function createAction(Request $request)
    {
        $patient = new Patient;

        $form = $this->createFormBuilder($patient)
            ->add('first_name',TextType::class)
            ->add('last_name',TextType::class)
            ->add('dob',BirthdayType::class)
            ->add('gender',TextType::class)
            ->add('bsn',IntegerType::class)
            ->add('therapist',TextType::class)
            ->add('email',EmailType::class)
            ->add('land_line',TextType::class)
            ->add('mobile_phone',TextType::class)
            ->add('address',TextType::class)
            ->add('zip_code',TextType::class)
            ->add('location',TextType::class)
            ->add('country',TextType::class)
            ->add('practitioner_name',TextType::class)
            ->add('Insurer',TextType::class)
            ->add('Policy_Number',TextType::class)
            ->add('add_insured',TextType::class)
            ->add('got_to_know_from',TextType::class)
            ->add('value',MoneyType::class)
            ->add('save',SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            DIE('Submited');
        }

        return $this->render('AdminBundle:Patient:create.html.twig',array('form' => $form->createView()));
    }

    /**
     * @Route("/patient/edit/{id}" ,name = "patient_edit")
     */
    public function editAction($id, Request $request)
    {

        return $this->render('AdminBundle:Patient:edit.html.twig');
    }

    /**
     * @Route("/patient/detail/{id}" ,name = "patient_edit")
     */
    public function detailAction($id, Request $request)
    {

        return $this->render('AdminBundle:Patient:detail.html.twig');
    }

}
