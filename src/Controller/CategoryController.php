<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }


    #[Route('/show/{id<^[0-9]+$>}', name: 'show')]
public function show(int $id, CategoryRepository $categoryRepository):Response
{
    $category = $categoryRepository->findOneBy(['id' => $id]);
  

    if (!$category) {
        throw $this->createNotFoundException(
            'No category with id : '.$id.' found in category\'s table.'
        );
    }
    return $this->render('category/show.html.twig', [
        'category' => $category,
    ]);
}
}
