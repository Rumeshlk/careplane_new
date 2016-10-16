<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Therapy;
use AdminBundle\Form\TherapyFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class TherapyController extends Controller
{
    /**
     * @Route("/therapy/list", name="therapy_list")
     */
    public function listFunction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $therapyList = $em->getRepository('AdminBundle:Therapy')->findAll();

        return $this->render('Therapy/list.html.twig', ['therapyList' => $therapyList]);

    }

    /**
     * @Route("/therapy/create", name="therapy_create")
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(TherapyFormType::class);

        //only handles data on POST
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recommendation = $form->getData();

            $em = $this->getDoctrine()->getEntityManager();

            $em->persist($recommendation);

            $em->flush();

            $this->addFlash('success', 'New Therapy was successfully added');

            return $this->redirectToRoute('therapy_list');
        }

        return $this->render('Recommendation/create.html.twig', [
            'therapyForm' => $form->createView()
        ]);


    }


    /**
     * @Route("/therapy/edit/{id}", name="therapy_edit")
     */
    public function editAction(Request $request, Therapy $therapy)
    {
        $form = $this->createForm(TherapyFormType::class, $therapy);

        //only handles data on POST
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recommendation = $form->getData();

            $em = $this->getDoctrine()->getEntityManager();

            $em->persist($recommendation);

            $em->flush();

            $this->addFlash('success', 'Therapy was successfully updated');

            return $this->redirectToRoute('therapy_list');
        }

        return $this->render('Therapy/edit.html.twig', [
            'therapyForm' => $form->createView()
        ]);


    }

}
