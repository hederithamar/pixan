<?php

namespace App\Http\Controllers\Backend\Auth\Clothes;

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
 * Class ClothesController.
 */
class ClothesController extends Controller
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
        return view('backend.auth.clothes.index')
            ->withProducts($this->productRepository->getActiveAuthPaginated(25, 'id', 'asc', 'Ropa'));
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
        return view('backend.auth.clothes.create')
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
                'genero' => "Ropa",
            ]
        );

        $this->productRepository->create($request->all(),
            $request->has('image_location') ? $request->file('image_location') : false);

        return redirect()->route('admin.auth.donation.clothes.index')->withFlashSuccess(__('alerts.backend.clothes.created'));
    }

    /**
     * @param Product           $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function show(Product $product, ManageProductRequest $request)
    {
        return view('backend.auth.clothes.show')
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
        return view('backend.auth.clothes.edit')
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
        ));

        return redirect()->route('admin.auth.clothes.index')->withFlashSuccess(__('alerts.backend.clothes.updated'));
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

        return redirect()->route('admin.auth.clothes.deleted')->withFlashSuccess(__('alerts.backend.clothes.deleted'));
    }
}