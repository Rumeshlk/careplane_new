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
        return $this->render('AdminBundle:Patient:index.html.twig', array('patient' => $patient_list));
    }

    /**
     * @Route("/patient/create" , name= "patient_create")
     */
    public function createAction(Request $request)
    {
        $patient = new Patient;

        $form = $this->createFormBuilder($patient)
            ->add('first_name', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('last_name', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('dob', BirthdayType::class,array('attr'=>array('class'=>'','style' => 'margin-bottom:15px')))
            ->add('gender', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('bsn', IntegerType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('therapist', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('email', EmailType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('land_line', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('mobile_phone', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('address', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('zip_code', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('location', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('country', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('practitioner_name', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('Insurer', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('Policy_Number', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('add_insured', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('got_to_know_from', TextType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('value', MoneyType::class,array('attr'=>array('class'=>'form-control','style' => 'margin-bottom:15px')))
            ->add('save', SubmitType::class,array('label'=> 'Save','attr'=>array('class'=>'btn btn-primary','style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //get submitted data
            $f_name = $form['first_name']->getData();
            $l_name = $form['last_name']->getData();
            $dob = $form['dob']->getData();
            $gender = $form['gender']->getData();
            $bsn = $form['bsn']->getData();
            $therapist = $form['therapist']->getData();
            $email = $form['email']->getData();
            $l_line = $form['land_line']->getData();
            $m_phone = $form['mobile_phone']->getData();
            $address = $form['address']->getData();
            $z_code = $form['zip_code']->getData();
            $location = $form['location']->getData();
            $country = $form['country']->getData();
            $p_name = $form['practitioner_name']->getData();
            $insurer = $form['Insurer']->getData();
            $p_number = $form['Policy_Number']->getData();
            $add_insured = $form['add_insured']->getData();
            $got_to_know = $form['got_to_know_from']->getData();
            $value = $form['value']->getData();

            $patient->setFirstName($f_name);
            $patient->setLastName($l_name);
            $patient->setDob($dob);
            $patient->setGender($gender);
            $patient->setBsn($bsn);
            $patient->setTherapist($therapist);
            $patient->setEmail($email);
            $patient->setLandline($l_line);
            $patient->setMobilePhone($m_phone);
            $patient->setAddress($address);
            $patient->setZipCode($z_code);
            $patient->setLocation($location);
            $patient->setCountry($country);
            $patient->setPractitionerName($p_name);
            $patient->setInsurer($insurer);
            $patient->setPolicyNumber($p_number);
            $patient->setAddInsured($add_insured);
            $patient->setGotToKnowFrom($got_to_know);
            $patient->setValue($value);

            $em = $this->getDoctrine()->getManager();

            $em->persist($patient);
            $em->flush();

            $this->addFlash(
                'notice', 'Patient Added'
            );
            return $this->redirectToRoute('patient_list');
        }

        return $this->render('AdminBundle:Patient:create.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/patient/edit/{id}" ,name = "patient_edit")
     */
    public function editAction($id, Request $request)
    {

        $patient = $this->getDoctrine()->getRepository('AdminBundle:Patient')->find($id);

        $patient->setFirstName($patient->getFirstName());
        $patient->setLastName($patient->getLastName());
        $patient->setDob($patient->getDob());
        $patient->setGender($patient->getGender());
        $patient->setBsn($patient->getBsn());
        $patient->setTherapist($patient->getTherapist());
        $patient->setEmail($patient->getEmail());
        $patient->setLandline($patient->getLandline());
        $patient->setMobilePhone($patient->getMobilePhone());
        $patient->setAddress($patient->getAddress());
        $patient->setZipCode($patient->getZipCode());
        $patient->setLocation($patient->getLocation());
        $patient->setCountry($patient->getCountry());
        $patient->setPractitionerName($patient->getPractitionerName());
        $patient->setInsurer($patient->getInsurer());
        $patient->setPolicyNumber($patient->getPolicyNumber());
        $patient->setAddInsured($patient->getAddInsured());
        $patient->setGotToKnowFrom($patient->getGotToKnowFrom());
        $patient->setValue($patient->getValue());

        $form = $this->createFormBuilder($patient)
            ->add('first_name', TextType::class)
            ->add('last_name', TextType::class)
            ->add('dob', BirthdayType::class)
            ->add('gender', TextType::class)
            ->add('bsn', IntegerType::class)
            ->add('therapist', TextType::class)
            ->add('email', EmailType::class)
            ->add('land_line', TextType::class)
            ->add('mobile_phone', TextType::class)
            ->add('address', TextType::class)
            ->add('zip_code', TextType::class)
            ->add('location', TextType::class)
            ->add('country', TextType::class)
            ->add('practitioner_name', TextType::class)
            ->add('Insurer', TextType::class)
            ->add('Policy_Number', TextType::class)
            ->add('add_insured', TextType::class)
            ->add('got_to_know_from', TextType::class)
            //->add('value', MoneyType::class)
            ->add('Update', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //get submitted data
            $f_name = $form['first_name']->getData();
            $l_name = $form['last_name']->getData();
            $dob = $form['dob']->getData();
            $gender = $form['gender']->getData();
            $bsn = $form['bsn']->getData();
            $therapist = $form['therapist']->getData();
            $email = $form['email']->getData();
            $l_line = $form['land_line']->getData();
            $m_phone = $form['mobile_phone']->getData();
            $address = $form['address']->getData();
            $z_code = $form['zip_code']->getData();
            $location = $form['location']->getData();
            $country = $form['country']->getData();
            $p_name = $form['practitioner_name']->getData();
            $insurer = $form['Insurer']->getData();
            $p_number = $form['Policy_Number']->getData();
            $add_insured = $form['add_insured']->getData();
            $got_to_know = $form['got_to_know_from']->getData();
            $value = $form['value']->getData();

            $em = $this->getDoctrine()->getManager();
            $patient = $em->getRepository('AdminBundle:Patient')->find($id);

            $patient->setFirstName($f_name);
            $patient->setLastName($l_name);
            $patient->setDob($dob);
            $patient->setGender($gender);
            $patient->setBsn($bsn);
            $patient->setTherapist($therapist);
            $patient->setEmail($email);
            $patient->setLandline($l_line);
            $patient->setMobilePhone($m_phone);
            $patient->setAddress($address);
            $patient->setZipCode($z_code);
            $patient->setLocation($location);
            $patient->setCountry($country);
            $patient->setPractitionerName($p_name);
            $patient->setInsurer($insurer);
            $patient->setPolicyNumber($p_number);
            $patient->setAddInsured($add_insured);
            $patient->setGotToKnowFrom($got_to_know);
            $patient->setValue($value);


            $em->flush();

            $this->addFlash(
                'notice', 'Patient updated'
            );
            return $this->redirectToRoute('patient_list');
        }
        return $this->render('AdminBundle:Patient:edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/patient/detail/{id}" ,name = "patient_detail")
     */
    public function detailAction($id)
    {
        $patient = $this->getDoctrine()->getRepository('AdminBundle:Patient')->find($id);
        return $this->render('AdminBundle:Patient:detail.html.twig', array('patient' => $patient));
    }

    /**
     * @Route("/patient/delete/{id}" ,name = "patient_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $patient = $em->getRepository('AdminBundle:Patient')->find($id);

        $em->remove($patient);
        $em->flush();

        $this->addFlash(
            'notice', 'Patient Deleted'
        );
        return $this->redirectToRoute('patient_list');
    }

}
