<?php

namespace Passionweb\AjaxRequests\Controller;

use Passionweb\AjaxRequests\Domain\Repository\CategoryRepository;
use Passionweb\AjaxRequests\Domain\Repository\ProductRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ProductController extends ActionController
{
    protected ProductRepository $productRepository;

    protected CategoryRepository $categoryRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->productRepository =  $productRepository;
        $this->categoryRepository =  $categoryRepository;
    }

    public function listAction(): ResponseInterface {
        $products = $this->productRepository->findAll();
        $categories = $this->categoryRepository->findAll();
        $this->view->assign('products', $products);
        $this->view->assign('categories', $categories);
        return $this->htmlResponse();
    }

    public function filterAction(): ResponseInterface {
        $categoryUid = (int)$_POST['tx_ajaxrequests_ajaxrequestsfilter']['category'] ?? 0;
        if($categoryUid > 0) {
            $products = $this->productRepository->findByCategory($categoryUid);
        } else {
            $products = $this->productRepository->findAll();
        }
        $this->view->assign('products', $products);
        return $this->htmlResponse();
    }
}
