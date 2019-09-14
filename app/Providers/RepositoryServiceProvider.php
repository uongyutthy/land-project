<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Contracts\Repositories\IPostRepository::class, \App\Repositories\Eloquent\PostRepository::class);
        $this->app->bind(\App\Contracts\Repositories\ICountryRepository::class, \App\Repositories\Eloquent\CountryRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IArticleRepository::class, \App\Repositories\Eloquent\ArticleRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IProjectRepository::class, \App\Repositories\Eloquent\ProjectRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IDeliveryTermsRepository::class, \App\Repositories\Eloquent\DeliveryTermsRepository::class);
        $this->app->bind(\App\Contracts\Repositories\ISupplierRepository::class, \App\Repositories\Eloquent\SupplierRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IIssuePurposeRepository::class, \App\Repositories\Eloquent\IssuePurposeRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IBoqPurposeRepository::class, \App\Repositories\Eloquent\BoqPurposeRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IHouseTypeRepository::class, \App\Repositories\Eloquent\HouseTypeRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IHouseBlockRepository::class, \App\Repositories\Eloquent\HouseBlockRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IUOMRepository::class, \App\Repositories\Eloquent\UOMRepository::class);
		$this->app->bind(\App\Contracts\Repositories\IUserRepository::class, \App\Repositories\Eloquent\UserRepositoryEloquent::class);
		$this->app->bind(\App\Contracts\Repositories\IGroupProfileRepository::class, \App\Repositories\Eloquent\GroupProfileRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\IDepartmentRepository::class, \App\Repositories\Eloquent\DepartmentRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IStaffRepository::class, \App\Repositories\Eloquent\StaffRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IStaffPositionRepository::class, \App\Repositories\Eloquent\StaffPositionRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IItemRepository::class, \App\Repositories\Eloquent\ItemRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IUnitConversionRepository::class, \App\Repositories\Eloquent\UnitConversionRepository::class);

        $this->app->bind(\App\Contracts\Repositories\IGinRepository::class, \App\Repositories\Eloquent\GinRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IGinDetailRepository::class, \App\Repositories\Eloquent\GinDetailRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IGinHouseRepository::class, \App\Repositories\Eloquent\GinHouseRepository::class);
        $this->app->bind(\App\Contracts\Repositories\ISystemPositionRepository::class, \App\Repositories\Eloquent\SystemPositionRepository::class);

        $this->app->bind(\App\Contracts\Repositories\IPoRepository::class, \App\Repositories\Eloquent\PoRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IPoDetailRepository::class, \App\Repositories\Eloquent\PoDetailRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IPoRequestRepository::class, \App\Repositories\Eloquent\PoRequestRepository::class);

        $this->app->bind(\App\Contracts\Repositories\IInvoiceRepository::class, \App\Repositories\Eloquent\InvoiceRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IInvoiceDetailRepository::class, \App\Repositories\Eloquent\InvoiceDetailRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IInvoiceGrnRepository::class, \App\Repositories\Eloquent\InvoiceGrnRepository::class);

        $this->app->bind(\App\Contracts\Repositories\ILocationRepository::class, \App\Repositories\Eloquent\LocationRepository::class);

        $this->app->bind(\App\Contracts\Repositories\IGoodsTransferNoteRepository::class, \App\Repositories\Eloquent\GoodsTransferNoteRepository::class);

        $this->app->bind(\App\Contracts\Repositories\IGoodsReceivedNoteRepository::class, \App\Repositories\Eloquent\GoodsReceivedNoteRepository::class);
        $this->app->bind(\App\Contracts\Repositories\IStockTransactionRepository::class, \App\Repositories\Eloquent\StockTransactionRepository::class);

    }
}
