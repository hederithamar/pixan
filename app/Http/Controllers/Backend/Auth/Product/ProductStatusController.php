<?php

namespace App\Http\Controllers\Backend\Auth\Product;

use App\Models\Auth\Product;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Auth\ProductRepository;
use App\Http\Requests\Backend\Auth\Product\ManageProductRequest;

/**
 * Class ProductStatusController.
 */
class ProductStatusController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    
    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageProductRequest $request)
    {
        return view('backend.auth.product.deleted')
            ->withProducts($this->productRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param Product              $deletedProduct
     * @param ManageProductRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Product $deletedProduct, ManageProductRequest $request)
    {
        $this->productRepository->forceDelete($deletedProduct);

        return redirect()->route('admin.auth.product.deleted')->withFlashSuccess(__('alerts.backend.products.deleted_permanently'));
    }

    /**
     * @param Product              $deletedProduct
     * @param ManageProductRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(Product $deletedProduct, ManageProductRequest $request)
    {
        $this->productRepository->restore($deletedProduct);

        return redirect()->route('admin.auth.product.index')->withFlashSuccess(__('alerts.backend.products.restored'));
    }
}
