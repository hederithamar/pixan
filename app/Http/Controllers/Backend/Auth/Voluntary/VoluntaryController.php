<?php

namespace App\Http\Controllers\Backend\Auth\Voluntary;

use App\Models\Auth\User;
use App\Models\Auth\Voluntary;
use App\Http\Controllers\Controller;
use App\Events\Backend\Auth\Voluntary\VoluntaryDeleted;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Backend\Auth\VoluntaryRepository;
use App\Repositories\Backend\Auth\UserRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\Voluntary\StoreVoluntaryRequest;
use App\Http\Requests\Backend\Auth\Voluntary\ManageVoluntaryRequest;
use App\Http\Requests\Backend\Auth\Voluntary\UpdateVoluntaryRequest;

/**
 * Class VoluntaryController.
 */
class VoluntaryController extends Controller
{
    /**
     * @var ServiceRepository
     */
    protected $voluntaryRepository;

    /**
     * ServiceController constructor.
     *
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(VoluntaryRepository $voluntaryRepository)
    {
        $this->voluntaryRepository = $voluntaryRepository;
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageVoluntaryRequest $request)
    {
        return view('backend.auth.voluntary.index')
            ->withVoluntaries($this->voluntaryRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageProductRequest    $request
     * @param UserRepository       $userRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(ManageVoluntaryRequest $request, UserRepository $userRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.voluntary.create')
            ->withUsers($userRepository->with('permissions')->get())
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreProductRequest $request
     *
     * @return mixed
     */
    public function store(StoreVoluntaryRequest $request)
    {   
        $this->voluntaryRepository->create($request->all());

        return redirect()->route('admin.auth.donation.voluntary.index')->withFlashSuccess(__('alerts.backend.products.created'));
    }

    /**
     * @param Product           $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function show(Voluntary $voluntary, ManageVoluntaryRequest $request)
    {
        return view('backend.auth.service.show')
            ->withVoluntary($voluntary);
    }

    /**
     * @param Product              $product
     * @param ManageProductRequest $request
     * @param UserRepository       $userRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function edit(Voluntary $voluntary, ManageVoluntaryRequest $request, UserRepository $userRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.voluntary.edit')
            ->withVoluntary($voluntary)
            ->withUsers($userRepository->with('permissions')->get());
    }

    /**
     * @param Product           $product
     * @param UpdateProductRequest $request
     *
     * @return mixed
     */
    public function update(Voluntary $voluntary, UpdateVoluntaryRequest $request)
    {
        $this->voluntaryRepository->update($voluntary, $request->all());

        return redirect()->route('admin.auth.donation.voluntary.index')->withFlashSuccess(__('alerts.backend.voluntarys.updated'));
    }

    /**
     * @param Product           $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function destroy(Voluntary $voluntary, ManageServiceRequest $request)
    {
        $this->voluntaryRepository->deleteById($voluntary->id);

        event(new ServiceDeleted($service));

        return redirect()->route('admin.auth.donation.service.deleted')->withFlashSuccess(__('alerts.backend.products.deleted'));
    }


    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageVoluntaryRequest $request)
    {
        return view('backend.auth.voluntary.deleted')
            ->withVoluntary($this->voluntaryRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param Product              $deletedProduct
     * @param ManageProductRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Voluntary $deletedVoluntary, ManageVoluntaryRequest $request)
    {
        $this->voluntaryRepository->forceDelete($deletedVoluntary);

        return redirect()->route('admin.auth.service.deleted')->withFlashSuccess(__('alerts.backend.voluntaries.deleted_permanently'));
    }

    /**
     * @param Product              $deletedProduct
     * @param ManageProductRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(Voluntary $deletedVoluntary, ManageVoluntaryRequest $request)
    {
        $this->voluntaryRepository->restore($deletedVoluntary);

        return redirect()->route('admin.auth.donation.voluntary.index')->withFlashSuccess(__('alerts.backend.voluntaries.restored'));
    }
}