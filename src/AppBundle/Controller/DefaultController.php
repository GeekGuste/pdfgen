<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }

    /**
     * @Route("/pdf", name="pdfpage")
     */
    public function pdfAction(Request $request)
    { 
        $html2pdf = $this->get('app.html2pdf');
        // replace this example code with whatever you need
        $template = $this->renderView('default/pdf.html.twig', []);
        //dump($template); exit;
        $html2pdf->create('P', 'A4', 'fr');

        return $html2pdf->generatePdf($template, "facture");
    }

}
