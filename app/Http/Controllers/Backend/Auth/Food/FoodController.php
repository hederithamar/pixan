<?php

namespace App\Http\Controllers\Backend\Auth\Food;

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
 * Class FoodController.
 */
class FoodController extends Controller
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
        return view('backend.auth.food.index')
            ->withProducts($this->productRepository->getActiveAuthPaginated(25, 'id', 'asc', 'Alimentos'));
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
        return view('backend.auth.food.create')
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
        $request->request->add(
            [
                'genero' => "Alimentos",
            ]
        );

        $this->productRepository->create($request->all(),
            $request->has('image_location') ? $request->file('image_location') : false);

        return redirect()->route('admin.auth.donation.food.index')->withFlashSuccess(__('alerts.backend.products.created'));
    }

    /**
     * @param Product           $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function show(Product $product, ManageProductRequest $request)
    {
        return view('backend.auth.food.show')
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
        return view('backend.auth.food.edit')
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
        $this->productRepository->update($product, $request->only(
            'first_name',
            'last_name',
            'email',
            'timezone',
            'roles',
            'permissions'
        ), $request->has('evidence_location') ? $request->file('evidence_location') : false);

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