<?php
/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 10/8/2016
 * Time: 11:43 PM
 */

namespace AdminBundle\Controller;

use AdminBundle\Entity\Recommendation;
use AdminBundle\Form\RecommendationFormType;
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
        $em = $this->getDoctrine()->getEntityManager();

        $recommendations = $em->getRepository('AdminBundle:Recommendation')->findAll();

        return $this->render('Recommendation/list.html.twig', ['recommendationList' => $recommendations]);

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

            $em = $this->getDoctrine()->getEntityManager();

            $em->persist($recommendation);

            $em->flush();

            $this->addFlash('success', 'New Recommendation was successfully added');

            return $this->redirectToRoute('recommendation_list');
        }

        return $this->render('Recommendation/create.html.twig', [
            'recommendationForm' => $form->createView()
        ]);


    }
}