<?php

namespace App\Controller\Api;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArtistRepository;
use Symfony\Component\Serializer\SerializerInterface;


class ArtistControllerApi extends AbstractController
{
    #[Route('/api/artists', name: 'api_artist')]
    public function list (ArtistRepository $artistRepository, SerializerInterface $serializer): JsonResponse // JsonResponse c'est un objet de symfony , serializer : j ai besoin du'n serialiser , miteny am symfony za hoe mila serializer de ataovy ao anatiny variable $serializer 

    {

    $artistList = $artistRepository->findAll(); // findall ca retourne un tableau d'objet 
  
    $artistJson = $serializer->serialize($artistList, 'json',['groups'=>'list']);  // ito ny miteny am serializer za hoe ito ny donnée($artiList) d mba transformer ho json 
    
        return new JsonResponse($artistJson,200, [], true); // ny reponse tsy maintsy json nefa eto tableau objet no retourner d lasa tsitany , returner ny eto am zay le donnée en Json
    }
}
