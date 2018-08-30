<?php

namespace App\Http\Controllers\Backend\Auth\Donation;

use App\Models\Auth\User;
use App\Models\Auth\Product;
use App\Http\Controllers\Controller;
use App\Events\Backend\Auth\Product\ProductDeleted;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Backend\Auth\ProductRepository;

use App\Repositories\Backend\Auth\UserRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\Product\StoreProductRequest;
use App\Http\Requests\Backend\Auth\Product\ManageProductRequest;
use App\Http\Requests\Backend\Auth\Product\UpdateProductRequest;

/**
 * Class donationController.
 */
class DonationController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * ProductController constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageProductRequest $request)
    {
        return view('backend.auth.donation.index')
            ->withProducts($this->productRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param Product           $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function show(Product $product, ManageProductRequest $request)
    {
        return view('backend.auth.product.show')
            ->withProduct($product);
    }

}