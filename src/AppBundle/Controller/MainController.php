<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(UserFormType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $user = $form->getData();

            return $this->redirectToRoute('resume', ['username' => $user['username']]);
        }
        return $this->render('/main/index_form.html.twig', [
            'userForm' => $form->createView()
        ]);
    }

    /**
     * @Route("resume", name="resume")
     */
    public function resumeAction()
    {
        echo 'resume';exit;
    }
}
