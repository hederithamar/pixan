<?php

namespace App\Repositories\Backend\Auth;

use App\Models\Auth\User;
use App\Models\Auth\Product;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Auth\Product\ProductCreated;
use App\Events\Backend\Auth\Product\ProductUpdated;
use App\Events\Backend\Auth\Product\ProductRestored;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Events\Backend\Auth\Product\ProductPermanentlyDeleted;
use Auth;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Product::class;
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
     * @return Product
     */
    public function create(array $data, $image = false) : Product
    {
        return DB::transaction(function () use ($data, $image) {
            $product = parent::create([
                'category'        => $data['category'],
                'sub_category'    => $data['sub_category'],
                'genero'          => $data['genero'],
                'name'            => $data['name'],
                'description'     => $data['description'],
                'stock'           => $data['stock'],
                'number_product'  => $data['number_product'],
                'active'          => 1,
                'status'          => $data['status'],
                'fecha'           => $data['fecha']." ".$data['hora'],
                'direccion'       => $data['direccion'],
                'lat'             => $data['lat'],
                'lng'             => $data['lng'],
                'user_id'         => Auth::user()->id,
                'image_type'      => 'storage',
                'image_location'  => $image->store('/products', 'public'),
            ]);

            if ($image) {
                $product->image_location = 'storage';
                $product->image_location = $image->store('/products', 'public');
            } else {
                // No image being passed
                $product->avatar_location = null;
            }

            if ($product) {
                
                event(new ProductCreated($product));

                return $product;
            }

            throw new GeneralException(__('exceptions.backend.access.products.create_error'));
        });
    }

    /**
     * @param Product  $product
     * @param array $data
     *
     * @return Product
     */
    public function update(Product $product, array $data) : Product
    {
        return DB::transaction(function () use ($product, $data) {
            if ($product->update([
                'category'        => $data['category'],
                'sub_category'    => $data['sub_category'],
                'name'            => $data['name'],
                'description'     => $data['description'],
                'stock'           => $data['stock'],
                'number_product'  => $data['number_product'],
                'active'          => 1,
                'status'          => $data['status'],
                'direccion'       => $data['direccion'],
                'lat'             => $data['lat'],
                'lng'             => $data['lng'],
                
            ])) {
               

                event(new ProductUpdated($product));

                return $product;
            }

            throw new GeneralException(__('exceptions.backend.access.products.update_error'));
        });
    }

    /**
     * @param Product $product
     *
     * @return Product
     * @throws GeneralException
     */
    public function forceDelete(Product $product) : Product
    {
        if (is_null($product->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.access.products.delete_first'));
        }

        return DB::transaction(function () use ($product) {
            // Delete associated relationships

            if ($product->forceDelete()) {
                event(new ProductPermanentlyDeleted($product));

                return $product;
            }

            throw new GeneralException(__('exceptions.backend.access.products.delete_error'));
        });
    }

    /**
     * @param Product $product
     *
     * @return Product
     * @throws GeneralException
     */
    public function restore(Product $product) : Product
    {
        if (is_null($product->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.access.products.cant_restore'));
        }

        if ($product->restore()) {
            event(new ProductRestored($product));

            return $product;
        }

        throw new GeneralException(__('exceptions.backend.access.products.restore_error'));
    }
}
