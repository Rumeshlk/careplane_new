<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Therapy;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


class TherapyController extends Controller
{
    /**
     * @Route("/therapy/create", name="therapy_create")
     */
    public function createAction(Request $request)
    {
        $therapy = new Therapy;

        $form = $this->createFormBuilder($therapy)
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'height' => '5', 'resize' => 'false', 'style' => 'margin-bottom:15px')))
            ->add('save', SubmitType::class, array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form['name']->getData();
            $description = $form['description']->getData();

            $therapy->setName($name);
            $therapy->setDescription($description);

            $em = $this->getDoctrine()->getManager();

            $em->persist($therapy);
            $em->flush();

            $this->addFlash(
                'notice', 'Therapy Was Successfully Added'
            );

            return $this->redirectToRoute('therapy_list');
        }
        return $this->render('AdminBundle:Therapy:create.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/therapy/edit/{id}", name="therapy_edit")
     */
    public function editAction($id)
    {
        return $this->render('AdminBundle:Therapy:edit.html.twig', array());
    }

    /**
     * @Route("/therapy/detail/{id}", name="therapy_detail")
     */
    public function detailAction($id)
    {
        return $this->render('AdminBundle:Therapy:detail.html.twig', array(// ...
        ));
    }

    /**
     * @Route("/therapy/delete/{id}", name="therapy_delete")
     */
    public function deleteAction($id)
    {
        return $this->render('AdminBundle:Therapy:delete.html.twig', array());
    }

    /**
     * @Route("/therapy/list", name="therapy_list")
     */
    public function listAction()
    {
        $therapyList = $this->getDoctrine()->getRepository('AdminBundle:Therapy')->findAll();
        return $this->render('AdminBundle:Therapy:list.html.twig', array('therapyList' => $therapyList));
    }

}
