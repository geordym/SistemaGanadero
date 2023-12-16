<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;



class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {

            //Aquí agregas todos los menús que necesites.
            //Puedes realizar una consulta y luego recorrerla para ir agregando cada uno.

            $adminitems =  [

                [
                    'text'  => 'Animales',
                    'url'   => '/animales',
                    'icon'  => '', //Icono de fontawesome
                    'can'   => '',  //Este campo indica si el usuario no tiene el permiso indicado, este menu no se mostrara. (Yo trabajo con laravel-permission de Spatie)
                ],
                [
                    'text'  => 'Buscar Animales',
                    'url'   => '/animales/buscar',
                    'icon'  => '', //Icono de fontawesome
                    'can'   => '',  //Este campo indica si el usuario no tiene el permiso indicado, este menu no se mostrara. (Yo trabajo con laravel-permission de Spatie)

                ],
                [
                    'text'  => 'Ganaderos',
                    'url'   => '/ganaderos',
                    'icon'  => '', //Icono de fontawesome
                    'can'   => '',  //Este campo indica si el usuario no tiene el permiso indicado, este menu no se mostrara. (Yo trabajo con laravel-permission de Spatie)

                ],
                [
                    'text'  => 'Informes',
                    'url'   => '/informes',
                    'icon'  => '', //Icono de fontawesome
                    'can'   => '',  //Este campo indica si el usuario no tiene el permiso indicado, este menu no se mostrara. (Yo trabajo con laravel-permission de Spatie)

                ],

            ];






            //Ganadero Items
            $event->menu->add([
                'text'  => 'Mis animales',
                'url'   => '/ganadero/animales',
                'icon'  => '', //Icono de fontawesome
                'can'   => '',  //Este campo indica si el usuario no tiene el permiso indicado, este menu no se mostrara. (Yo trabajo con laravel-permission de Spatie)

            ]);

            $event->menu->add([
                'text'  => 'Acceso',
                'url'   => '/change-password',
                'icon'  => '', //Icono de fontawesome
                'can'   => ''

            ]);



            $isAdmin = auth()->user()->isAdmin;
            if ($isAdmin) {
                $event->menu->add([
                    'text'  => 'Administrador',
                    'url'   => '',
                    'icon'  => '', //Icono de fontawesome
                    'can'   => '',  //Este campo indica si el usuario no tiene el permiso indicado, este menu no se mostrara. (Yo trabajo con laravel-permission de Spatie)
                    'submenu' => $adminitems, //Solo si el menú tiene submenus

                ]);
            }


        });
    }
}
