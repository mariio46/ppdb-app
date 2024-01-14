<?php

namespace App\Providers\Global;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CheckRoleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ----- Admin -----
        Blade::directive('issuperadmin', function ($expression) {
            return "<?php if(session()->get('roles.name') == 'Admin') : ?>";
        });
        Blade::directive('endissuperadmin', function ($expression) {
            return '<?php endif; ?>';
        });
        // ----- /Admin -----
        // ----- Admin Cabdin -----
        Blade::directive('iscabdin', function ($expression) {
            return "<?php if(session()->get('roles.name') == 'Admin Cabang Dinas') : ?>";
        });
        Blade::directive('endiscabdin', function ($expression) {
            return '<?php endif; ?>';
        });
        // ----- /Admin Cabdin -----

    }
}
