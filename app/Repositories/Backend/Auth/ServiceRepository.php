<?php

namespace App\Repositories\Backend\Auth;

use App\Models\Auth\User;
use App\Models\Auth\Service;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Auth\Service\ServiceCreated;
use App\Events\Backend\Auth\Service\ServiceUpdated;
use App\Events\Backend\Auth\Service\ServiceRestored;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Events\Backend\Auth\Service\ServicePermanentlyDeleted;
use Auth;

/**
 * Class ServiceRepository.
 */
class ServiceRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Service::class;
    }

    /**
     * @return mixed
     */
    public function getUnconfirmedCount() : int
    {
        return $this->model
            ->where('confirmed', 0)
            ->count();
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->with('user')
            ->active()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }


    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActiveAuthPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc', $category = 'Alimentos') : LengthAwarePaginator
    {
        return $this->model
            ->with('user')
            ->where('user_id', Auth::user()->id)
            ->where('category', $category)
            ->active()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getInactivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->with('user')
            ->where('user_id', Auth::user()->id)
            ->active(false)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->with('user')
            ->where('user_id', Auth::user()->id)
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param array $data
     *
     * @return Service
     */
    public function create(array $data, $image = false) : Service
    {
        return DB::transaction(function () use ($data, $image) {
            $service = parent::create([
                'category'        => $data['category'],
                'name'            => $data['name'],
                'description'     => $data['description'],
                'persons'         => $data['persons'],
                'material'        => $data['material'],
                'active'          => 1,
                'status'          => $data['status'],
                'service'  => $data['service'],
                'fecha'           => $data['fecha']." ".$data['hora'],
                'direccion'       => $data['direccion'],
                'user_id'         => Auth::user()->id,
            ]);

            if ($service) {
                
                event(new ServiceCreated($service));

                return $service;
            }

            throw new GeneralException(__('exceptions.backend.access.services.create_error'));
        });
    }

    /**
     * @param Service  $service
     * @param array $data
     *
     * @return Service
     */
    public function update(Service $service, array $data, $image = false) : Service
    {
        return DB::transaction(function () use ($service, $data, $image) {
            if ($service->update([
                'category'        => $data['category'],
                'name'            => $data['name'],
                'description'     => $data['description'],
                'persons'           => $data['persons'],
                'material'  => $data['material'],
                'service'  => $data['service'],
                'active'          => 1,
                'status'          => $data['status'],
                'direccion'       => $data['direccion'],
                
            ])) {
               

                event(new ServiceUpdated($service));

                return $service;
            }

            throw new GeneralException(__('exceptions.backend.access.services.update_error'));
        });
    }

    /**
     * @param Product $product
     *
     * @return Product
     * @throws GeneralException
     */
    public function forceDelete(Service $service) : Service
    {
        if (is_null($service->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.access.services.delete_first'));
        }

        return DB::transaction(function () use ($product) {
            // Delete associated relationships

            if ($service->forceDelete()) {
                event(new ProductPermanentlyDeleted($service));

                return $service;
            }

            throw new GeneralException(__('exceptions.backend.access.services.delete_error'));
        });
    }

    /**
     * @param Product $product
     *
     * @return Product
     * @throws GeneralException
     */
    public function restore(Service $service) : Service
    {
        if (is_null($service->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.access.services.cant_restore'));
        }

        if ($service->restore()) {
            event(new ProductRestored($service));

            return $service;
        }

        throw new GeneralException(__('exceptions.backend.access.services.restore_error'));
    }
}
