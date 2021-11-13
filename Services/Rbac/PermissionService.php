<?php

namespace Modules\Admin\Services\Rbac;


use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Models\Rbac\Permission;
use Modules\Admin\Repositories\Eloquent\Rbac\PermissionRepository;
use Modules\Admin\Supports\Constant;
use Throwable;


class PermissionService
{
    /**
     * @var PermissionRepository
     */
    private $permissionRepository;

    /**
     * PermissionService constructor.
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->permissionRepository->itemsPerPage = 10;
    }

    /**
     * @return Collection|Model[]
     */
    public function getAllPermissions()
    {
        return $this->permissionRepository->all();
    }

    /**
     * @param array $filters
     * @param array $eagerRelations
     * @return mixed
     * @throws Exception
     */
    public function permissionPaginate(array $filters = [], array $eagerRelations = [])
    {
        return $this->permissionRepository->paginateWith($filters, $eagerRelations, true);
    }

    /**
     * @param int $id
     * @param bool $purge
     * @return mixed
     * @throws Exception
     */
    public function getPermissionById(int $id, bool $purge = false)
    {
        return $this->permissionRepository->show($id, $purge);
    }

    /**
     * @param array $inputs
     * @return array
     * @throws Exception
     * @throws Throwable
     */
    public function storePermission(array $inputs): array
    {
        \DB::beginTransaction();
        try {
            $newPermission = $this->permissionRepository->create($inputs);
            if ($newPermission instanceof Permission) {
                \DB::commit();
                return ['status' => true, 'message' => __('New Permission Created'),
                    'level' => Constant::MSG_TOASTR_SUCCESS, 'title' => 'Notification!'];
            } else {
                \DB::rollBack();
                return ['status' => false, 'message' => __('New Permission Creation Failed'),
                    'level' => Constant::MSG_TOASTR_ERROR, 'title' => 'Alert!'];
            }
        } catch (Exception $exception) {
            $this->permissionRepository->handleException($exception);
            \DB::rollBack();
            return ['status' => false, 'message' => $exception->getMessage(),
                'level' => Constant::MSG_TOASTR_WARNING, 'title' => 'Error!'];
        }
    }

    /**
     * @param array $inputs
     * @param $id
     * @return array
     * @throws Throwable
     */
    public function updatePermission(array $inputs, $id): array
    {
        \DB::beginTransaction();
        try {
            $permission = $this->permissionRepository->show($id);
            if ($permission instanceof Permission) {
                if ($this->permissionRepository->update($inputs, $id)) {
                    \DB::commit();
                    return ['status' => true, 'message' => __('Permission Info Updated'),
                        'level' => Constant::MSG_TOASTR_SUCCESS, 'title' => 'Notification!'];
                } else {
                    \DB::rollBack();
                    return ['status' => false, 'message' => __('Permission Info Update Failed'),
                        'level' => Constant::MSG_TOASTR_ERROR, 'title' => 'Alert!'];
                }
            } else {
                return ['status' => false, 'message' => __('Permission Model Not Found'),
                    'level' => Constant::MSG_TOASTR_WARNING, 'title' => 'Alert!'];
            }
        } catch (Exception $exception) {
            $this->permissionRepository->handleException($exception);
            \DB::rollBack();
            return ['status' => false, 'message' => $exception->getMessage(),
                'level' => Constant::MSG_TOASTR_WARNING, 'title' => 'Error!'];
        }
    }

    /**
     * @param $id
     * @return array
     * @throws Throwable
     */
    public function destroyPermission($id): array
    {
        \DB::beginTransaction();
        try {
            if ($this->permissionRepository->delete($id)) {
                \DB::commit();
                return ['status' => true, 'message' => __('Permission is Trashed'),
                    'level' => Constant::MSG_TOASTR_SUCCESS, 'title' => 'Notification!'];

            } else {
                \DB::rollBack();
                return ['status' => false, 'message' => __('Permission is Delete Failed'),
                    'level' => Constant::MSG_TOASTR_ERROR, 'title' => 'Alert!'];
            }
        } catch (Exception $exception) {
            $this->permissionRepository->handleException($exception);
            \DB::rollBack();
            return ['status' => false, 'message' => $exception->getMessage(),
                'level' => Constant::MSG_TOASTR_WARNING, 'title' => 'Error!'];
        }
    }
}
