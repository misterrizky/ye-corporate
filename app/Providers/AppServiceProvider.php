<?php

namespace App\Providers;

// use App\Models\HRM\Employee;
// use App\Observers\EmployeeObserver;

use App\Models\HRM\Employee;
use App\Models\Master\Event;
use App\Models\Corporate\LegalDoc;
use App\Models\Corporate\LegalDocType;
use App\Observers\Master\EventObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\Corporate\DocumentObserver;
use App\Observers\Corporate\DocumentTypeObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::observe(EventObserver::class);
        LegalDoc::observe(DocumentObserver::class);
        LegalDocType::observe(DocumentTypeObserver::class);
    }
}
