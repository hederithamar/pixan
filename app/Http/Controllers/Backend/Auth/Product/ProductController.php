<?php

namespace App\Http\Controllers\Backend\Auth\Product;

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
 * Class ProductController.
 */
class ProductController extends Controller
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
        return view('backend.auth.product.index')
            ->withProducts($this->productRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageProductRequest    $request
     * @param UserRepository       $userRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(ManageProductRequest $request, UserRepository $userRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.product.create')
            ->withUsers($userRepository->with('permissions')->get())
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreProductRequest $request
     *
     * @return mixed
     */
    public function store(StoreProductRequest $request)
    {   
        $this->productRepository->create($request->all());

        return redirect()->route('admin.auth.product.index')->withFlashSuccess(__('alerts.backend.products.created'));
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

    /**
     * @param Product              $product
     * @param ManageProductRequest $request
     * @param UserRepository       $userRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function edit(Product $product, ManageProductRequest $request, UserRepository $userRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.product.edit')
            ->withProduct($product)
            ->withUsers($userRepository->with('permissions')->get());
    }

    /**
     * @param Product           $product
     * @param UpdateProductRequest $request
     *
     * @return mixed
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $this->productRepository->update($product, $request->all(),$request->has('evidence_location') ? $request->file('evidence_location') : false);

        return redirect()->route('admin.auth.product.index')->withFlashSuccess(__('alerts.backend.products.updated'));
    }

    /**
     * @param Product           $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function destroy(Product $product, ManageProductRequest $request)
    {
        $this->productRepository->deleteById($product->id);

        event(new ProductDeleted($product));

        return redirect()->route('admin.auth.product.deleted')->withFlashSuccess(__('alerts.backend.products.deleted'));
    }
}