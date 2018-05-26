<?php

namespace App\Repositories\Backend\Auth;

use App\Models\Auth\User;
use App\Models\Auth\Voluntary;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Auth\Voluntary\VoluntaryCreated;
use App\Events\Backend\Auth\Voluntary\VoluntaryUpdated;
use App\Events\Backend\Auth\Voluntary\VoluntaryRestored;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Events\Backend\Auth\Voluntary\VoluntaryPermanentlyDeleted;
use Auth;

/**
 * Class VoluntaryRepository.
 */
class VoluntaryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Voluntary::class;
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
    public function create(array $data, $image = false) : Voluntary
    {
        return DB::transaction(function () use ($data, $image) {
            $voluntary = parent::create([
                'category'        => $data['category'],
                'celphone'            => $data['celphone'],
                'sexo'     => $data['sexo'],
                'facebook'         => $data['facebook'],
                'escolaridad'        => $data['escolaridad'],
                'active'          => 1,
                'status'          => $data['status'],
                'carrera'         => $data['carrera'],
                'habilidad'           => $data['habilidades'],
                'porque'       => $data['porque'],
                
                'user_id'         => Auth::user()->id,
            ]);

            if ($voluntary) {
                
                event(new VoluntaryCreated($voluntary));

                return $voluntary;
            }

            throw new GeneralException(__('exceptions.backend.access.services.create_error'));
        });
    }

    /**
     * @param Service  $voluntary
     * @param array $data
     *
     * @return Service
     */
    public function update(Voluntary $voluntary, array $data, $image = false) : Service
    {
        return DB::transaction(function () use ($voluntary, $data, $image) {
            if ($voluntary->update([
                'category'        => $data['category'],
                'celphone'            => $data['celphone'],
                'sexo'     => $data['sexo'],
                'facebook'         => $data['facebook'],
                'escolaridad'        => $data['escolaridad'],
                'active'          => 1,
                'status'          => $data['status'],
                'carrera'         => $data['carrera'],
                'habilidad'           => $data['habilidades'],
                'porque'       => $data['porque'],
                
            ])) {
               

                event(new VoluntaryUpdated($voluntary));

                return $voluntary;
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
    public function forceDelete(Voluntary $voluntary) : Service
    {
        if (is_null($voluntary->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.access.services.delete_first'));
        }

        return DB::transaction(function () use ($voluntary) {
            // Delete associated relationships

            if ($voluntary->forceDelete()) {
                event(new ProductPermanentlyDeleted($voluntary));

                return $voluntary;
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
    public function restore(Voluntary $voluntary) : Voluntary
    {
        if (is_null($voluntary->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.access.services.cant_restore'));
        }

        if ($voluntary->restore()) {
            event(new ProductRestored($voluntary));

            return $voluntary;
        }

        throw new GeneralException(__('exceptions.backend.access.services.restore_error'));
    }
}
