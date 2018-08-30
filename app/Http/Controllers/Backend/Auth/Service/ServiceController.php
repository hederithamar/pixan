<?php

namespace App\Http\Controllers\Backend\Auth\Service;

use App\Models\Auth\User;
use App\Models\Auth\Service;
use App\Http\Controllers\Controller;
use App\Events\Backend\Auth\Service\ServiceDeleted;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Backend\Auth\ServiceRepository;
use App\Repositories\Backend\Auth\UserRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\Service\StoreServiceRequest;
use App\Http\Requests\Backend\Auth\Service\ManageServiceRequest;
use App\Http\Requests\Backend\Auth\Service\UpdateServiceRequest;

/**
 * Class ServiceController.
 */
class ServiceController extends Controller
{
    /**
     * @var ServiceRepository
     */
    protected $serviceRepository;

    /**
     * ServiceController constructor.
     *
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageServiceRequest $request)
    {
        return view('backend.auth.service.index')
            ->withServices($this->serviceRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageProductRequest    $request
     * @param UserRepository       $userRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(ManageServiceRequest $request, UserRepository $userRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.service.create')
            ->withUsers($userRepository->with('permissions')->get())
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreProductRequest $request
     *
     * @return mixed
     */
    public function store(StoreServiceRequest $request)
    {   
        $this->serviceRepository->create($request->all());

        return redirect()->route('admin.auth.donation.service.index')->withFlashSuccess(__('alerts.backend.products.created'));
    }

    /**
     * @param Product           $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function show(Service $service, ManageServiceRequest $request)
    {
        return view('backend.auth.service.show')
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
    public function edit(Service $service, ManageServiceRequest $request, UserRepository $userRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.service.edit')
            ->withService($service)
            ->withUsers($userRepository->with('permissions')->get());
    }

    /**
     * @param Product           $product
     * @param UpdateProductRequest $request
     *
     * @return mixed
     */
    public function update(Service $service, UpdateServiceRequest $request)
    {
        $this->serviceRepository->update($service, $request->all());

        return redirect()->route('admin.auth.donation.service.index')->withFlashSuccess(__('alerts.backend.services.updated'));
    }

    /**
     * @param Product           $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function destroy(Service $service, ManageServiceRequest $request)
    {
        $this->serviceRepository->deleteById($service->id);

        event(new ServiceDeleted($service));

        return redirect()->route('admin.auth.donation.service.deleted')->withFlashSuccess(__('alerts.backend.products.deleted'));
    }


    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageServiceRequest $request)
    {
        return view('backend.auth.service.deleted')
            ->withServices($this->serviceRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param Product              $deletedProduct
     * @param ManageProductRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Service $deletedService, ManageServiceRequest $request)
    {
        $this->serviceRepository->forceDelete($deletedService);

        return redirect()->route('admin.auth.service.deleted')->withFlashSuccess(__('alerts.backend.services.deleted_permanently'));
    }

    /**
     * @param Product              $deletedProduct
     * @param ManageProductRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(Service $deletedService, ManageServiceRequest $request)
    {
        $this->serviceRepository->restore($deletedService);

        return redirect()->route('admin.auth.service.index')->withFlashSuccess(__('alerts.backend.services.restored'));
    }
}