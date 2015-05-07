<?php

namespace jordelca\alumnosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use jordelca\alumnosBundle\Entity\Alumnos;

class DefaultController extends Controller
{


    public function indexAction($name)
    {
        return $this->render('jordelcaalumnosBundle:Default:index.html.twig', array('name' => $name));
    }
    public function alumnosAction()
    {
        $repository = $this->getDoctrine()->getRepository("jordelcaalumnosBundle:Alumnos");
        $alumnos = $repository->findAll();
        return $this->render('jordelcaalumnosBundle:Default:alumnos.html.twig',array("alumnos"=>$alumnos));
    }

    public function alumnoAction($id)
    {	
        $repository = $this->getDoctrine()->getRepository("jordelcaalumnosBundle:Alumnos");
        $alumno = $repository->find($id);
        return $this->render('jordelcaalumnosBundle:Default:alumno.html.twig',array("alumno"=>$alumno));
    }

    public function nuevoAction()
    {   
        // Insertar en BD
        $alumno = new Alumnos();
        $alumno->setNombre("John");
        $alumno->setApellido("Appleseed");
        $alumno->setEmail("john@appleseed.com");
        $alumno->setEdad(19);

        $em = $this->getDoctrine()->getManager();
        $em->persist($alumno);
        $em->flush();

        return $this->redirect($this->generateUrl('jordelcaalumnos_alumnos'));
    }

    public function twigAction()
    {	
        return $this->render('jordelcaalumnosBundle:Default:twig.html.twig');
    }
}
