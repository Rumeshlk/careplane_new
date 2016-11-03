<?php
/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 10/8/2016
 * Time: 11:43 PM
 */

namespace AdminBundle\Controller\Therapy;

use AdminBundle\Entity\Therapy\Recommendation;
use AdminBundle\Form\Therapy\RecommendationFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RecommendationController extends Controller
{

    /**
     * @Route("/recommendation/list", name="recommendation_list")
     */
    public function listFunction()
    {
        $em = $this->getDoctrine()->getManager();

        $recommendations = $em->getRepository('AdminBundle:Therapy\Recommendation')->findAll();

        return $this->render('TherapyViews/Recommendation/list.html.twig', ['recommendationList' => $recommendations]);

    }

    /**
     * @Route("/recommendation/create", name="recommendation_create")
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(RecommendationFormType::class);

        //only handles data on POST
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recommendation = $form->getData();

            $em = $this->getDoctrine()->getManager();

            $em->persist($recommendation);

            $em->flush();

            $this->addFlash('success', 'New Recommendation was successfully added');

            return $this->redirectToRoute('recommendation_list');
        }

        return $this->render('TherapyViews/Recommendation/create.html.twig', [
            'recommendationForm' => $form->createView()
        ]);


    }


    /**
     * @Route("/recommendation/edit/{id}", name="recommendation_edit")
     */
    public function editAction(Request $request, Recommendation $recommendation)
    {
        $form = $this->createForm(RecommendationFormType::class, $recommendation);

        //only handles data on POST
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recommendation = $form->getData();

            $em = $this->getDoctrine()->getManager();

            $em->persist($recommendation);

            $em->flush();

            $this->addFlash('success', 'Recommendation was successfully updated');

            return $this->redirectToRoute('recommendation_list');
        }

        return $this->render('TherapyViews/Recommendation/edit.html.twig', [
            'recommendationForm' => $form->createView()
        ]);


    }

}