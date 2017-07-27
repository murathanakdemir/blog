<?php

namespace App\Providers;

use App\Ayar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        setlocale(LC_TIME,"tr_TR");
        Carbon::setLocale("tr");
        config()->set("ayarlar",Ayar::pluck("value","name")->all());
        $this->app['form']->component('bsText', 'components.text', ['name', 'label_name','value' => null]);
        $this->app['form']->component('bsSubmit', 'components.submit', ['name', 'url' => URL::previous()]);
        $this->app['form']->component('bsCheckbox', 'components.checkbox', ['name', 'label_name', 'elemanlar' =>[]]);
        $this->app['form']->component('bsPassword', 'components.password', ['name', 'label_name']);
        $this->app['form']->component('bsFile', 'components.file', ['name', 'label_name']);
        $this->app['form']->component('bsSelect', 'components.select', ['name', 'label_name','value','liste' => [],'placeholder']);
        $this->app['form']->component('bsTextarea', 'components.textarea', ['name', 'label_name','value' => null, 'attributes']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
