<?php

namespace App\Providers;

use App\Contracts\Repositories\IAdjustmentDetailsRepository;
use App\Contracts\Repositories\IAdjustmentRepository;
use App\Contracts\Repositories\IAdjustmentTypeRepository;
use App\Contracts\Repositories\IAssignHouseBlockRepository;
use App\Contracts\Repositories\IEngineerRequestDetailRepository;
use App\Contracts\Repositories\IEngineerRequestRepository;
use App\Contracts\Repositories\IBoqHouseItemRepository;
use App\Contracts\Repositories\IBoqHouseRepository;
use App\Contracts\Repositories\IBoqItemRepository;
use App\Contracts\Repositories\IBoqRepository;
use App\Contracts\Repositories\IGinDetailRepository;
use App\Contracts\Repositories\IGinHouseRepository;
use App\Contracts\Repositories\IGinRepository;
use App\Contracts\Repositories\IGrnDetailRepository;
use App\Contracts\Repositories\IGrnRepository;
use App\Contracts\Repositories\IGrenDetailRepository;
use App\Contracts\Repositories\IGrenRepository;
use App\Contracts\Repositories\IHouseRepository;
use App\Contracts\Repositories\IHouseTypeRepository;
use App\Contracts\Repositories\IItemCategoryRepository;
use App\Contracts\Repositories\IItemRepository;
use App\Contracts\Repositories\IRequestPermissionRepository;
use App\Contracts\Repositories\IRequestRepository;
use App\Contracts\Repositories\IStockRepository;
use App\Contracts\Repositories\IStockTransactionRepository;
use App\Contracts\Services\IAdjustmentService;
use App\Contracts\Services\IAdjustmentTypeService;
use App\Contracts\Services\IBoqService;
use App\Contracts\Services\IEngineerRequestService;
use App\Contracts\Services\IGinService;
use App\Contracts\Services\IGoodsTransferNoteService;
use App\Contracts\Services\IGoodsReceivedNoteService;
use App\Contracts\Services\IGrenService;
use App\Contracts\Services\IGrnService;
use App\Contracts\Services\IInvoiceService;
use App\Contracts\Services\IItemService;
use App\Contracts\Services\IPoService;
use App\Contracts\Services\IRequestService;
use App\Contracts\Services\IStockService;
use App\Contracts\Services\IStockTransactionService;
use App\Grids\BoqGrid;
use App\Grids\BoqGridInterface;
use App\Grids\EngineerRequestsGrid;
use App\Grids\EngineerRequestsGridInterface;
use App\Grids\GoodsTransferNoteGrid;
use App\Grids\GoodsTransferNoteGridInterface;
use App\Grids\HousesBlocksGrid;
use App\Grids\ItemGridInterface;
use App\Grids\PoGrid;
use App\Grids\PoGridInterface;
use App\Helpers\Breadcrumbs\Breadcrumbs;
use App\Models\RequestPermission;
use App\Repositories\Eloquent\AdjustmentDetailsRepository;
use App\Repositories\Eloquent\AdjustmentRepository;
use App\Repositories\Eloquent\AdjustmentTypeRepository;
use App\Repositories\Eloquent\AssignHouseBlockRepository;
use App\Repositories\Eloquent\BoqHouseItemRepositoryEloquent;
use App\Repositories\Eloquent\BoqHouseRepositoryEloquent;
use App\Repositories\Eloquent\BoqItemRepositoryEloquent;
use App\Repositories\Eloquent\BoqRepositoryEloquent;
use App\Repositories\Eloquent\EngineerRequestDetailRepository;
use App\Repositories\Eloquent\EngineerRequestRepository;
use App\Repositories\Eloquent\GinDetailRepository;
use App\Repositories\Eloquent\GinHouseRepository;
use App\Repositories\Eloquent\GinRepository;
use App\Repositories\Eloquent\GrenDetailRepositoryEloquent;
use App\Repositories\Eloquent\GrenRepositoryEloquent;
use App\Repositories\Eloquent\GrnDetailRepository;
use App\Repositories\Eloquent\GrnRepository;
use App\Repositories\Eloquent\HouseRepository;
use App\Repositories\Eloquent\HouseTypeRepository;
use App\Repositories\Eloquent\ItemCategoryRepository;
use App\Repositories\Eloquent\ItemRepository;
use App\Repositories\Eloquent\RequestPermissionRepository;
use App\Repositories\Eloquent\RequestRepository;
use App\Repositories\Eloquent\StockRepository;
use App\Repositories\Eloquent\StockTransactionRepository;
use App\Services\AdjustmentService;
use App\Services\AdjustmentTypeService;
use App\Services\BoqService;
use App\Services\EngineerRequestService;
use App\Services\GinService;
use App\Services\GoodsTransferNoteService;
use App\Services\GrnService;
use App\Services\InvoiceService;
use App\Services\ItemService;
use App\Services\GrenService;
use App\Services\PoService;
use App\Services\RequestService;
use App\Services\StockService;
use App\Services\StockTransactionService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->register(RepositoryServiceProvider::class);

        // loading dynamic breadcrumbs
	    Request::macro('breadcrumbs', function(){
	    	return new Breadcrumbs($this);
	    });

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Contracts\Services\IUserService::class, \App\Services\UserService::class);

        $this->app->bind(\App\Contracts\Repositories\IPermissionGroupRepository::class, \App\Repositories\Eloquent\PermissionGroupRepository::class);
        $this->app->bind(\App\Contracts\Services\IPermissionGroupService::class, \App\Services\PermissionGroupService::class);
        $this->app->bind(\App\Contracts\Repositories\IRoleRepository::class, \App\Repositories\Eloquent\RoleRepository::class);
        $this->app->bind(\App\Contracts\Services\IRoleService::class, \App\Services\RoleService::class);

        $this->app->bind(IRequestPermissionRepository::class, RequestPermissionRepository::class);
    }
}
