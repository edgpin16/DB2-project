<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => '',
    'title_prefix' => '',
    'title_postfix' => '| SAFL', //Título postfijo, primero va esto y después el nombre de la página en sí

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true, //Para usar un solo icono, este icono esta en public/favicons
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>S</b>istema<b>A</b>dministrativo', //Cambio el nombre del título, cerca del logo
    'logo_img' => 'vendor/adminlte/dist/img/LogoFarmacia.png', //Cambio la imagen del logo
    'logo_img_class' => 'brand-image img-circle elevation-3', //Estilos al logo
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Logo SAFL', //Texto alt del logo

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => false, //Con esto, quito el nombre del usuario que entra
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => false, //Dejo fijo el sidebar, o la parte de opciones
    'layout_fixed_navbar' => false, //Dejo fijo, la barra de navegación
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false, //Sidebar o menu en el lado derecho
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'light',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => false, //Evita que este sidebar empuje el content
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        [
            'text' => 'Dashboard',
            'route' => 'home',
            'icon' => 'fas fa-fw fa-home',
            'can' => 'home',
        ],

        ['header' => 'options'],
        [
            'text' => 'Sucursales',
            'icon' => 'fas fa-fw fa-hospital-alt',
            'can' => 'subsidiary.index',
            'submenu' => [
                [
                    'text' => 'Ver sucursales',
                    'icon' => 'fas fa-fw fa-search',
                    'route' => 'subsidiary.index',
                ],
                [
                    'text' => 'Agregar una sucursal',
                    'icon' => 'fas fa-fw fa-plus',
                    'route' => 'subsidiary.create'
                ]
            ]
        ],
        [
            'text' => 'Empleados',
            'icon' => 'fas fa-fw fa-users',
            'can' => 'selectSubsidiary',
            // 'url' => '#',
            'submenu' => [
                [
                    'text' => 'Ver empleados',
                    'icon' => 'fas fa-fw fa-search',
                    // 'route' => 'subsidiary.index',
                    'submenu' => [
                        [
                            'text' => 'Empleado administrativo',
                            // 'icon' => 'fas fa-fw fa-user-plus',
                            'icon' => 'fas fa-fw fa-user-tie',
                            'url' => '/seleccionar-sucursal/administrativo',
                            //'route' => 'selectSubsidiary',
                        ],
                        [
                            'text' => 'Empleado auxiliar de farmacia',
                            // 'icon' => 'fas fa-fw fa-user-plus',
                            'icon' => 'fas fa-fw fa-notes-medical',
                            'url' => 'seleccionar-sucursal/auxiliarFarmacia',
                            // 'route' => 'subsidiary.index',
                        ],
                        [
                            'text' => 'Empleado analista',
                            // 'icon' => 'fas fa-fw fa-user-plus',
                            'icon' => 'fas fa-fw fa-flask',
                            'url' => 'seleccionar-sucursal/analista',
                            // 'route' => 'subsidiary.index',
                        ],
                        [
                            'text' => 'Empleado farmaceutico',
                            'icon' => 'fas fa-fw fa-hospital-user',
                            'url' => 'seleccionar-sucursal/farmaceutico',
                            // 'route' => 'subsidiary.create'
                        ],
                        [
                            'text' => 'Empleado pasante',
                            'icon' => 'fas fa-fw fa-user-graduate',
                            'url' => 'seleccionar-sucursal/pasante',
                            // 'route' => 'subsidiary.create'
                        ],
                        // [
                        //     'text' => 'Empleado pasante menor de edad',
                        //     'icon' => 'fas fa-fw fa-house-user',
                        //     'url' => 'seleccionar-sucursal/pasanteMenorDeEdad',
                        //     // 'route' => 'subsidiary.create'
                        // ]
                    ]
                ],
                [
                    'text' => 'Agregar una empleado',
                    'icon' => 'fas fa-fw fa-plus',
                    // 'url' => '#'
                    'submenu' => [
                        [
                            'text' => 'Empleado administrativo',
                            // 'icon' => 'fas fa-fw fa-user-plus',
                            'icon' => 'fas fa-fw fa-user-tie',
                            'url' => '/empleado/crear/administrativo',
                            // 'route' => 'employeer.create',
                        ],
                        [
                            'text' => 'Empleado auxiliar de farmacia',
                            // 'icon' => 'fas fa-fw fa-user-plus',
                            'icon' => 'fas fa-fw fa-notes-medical',
                            'url' => '/empleado/crear/auxiliarFarmacia',
                            // 'route' => 'employeer.create',
                        ],
                        [
                            'text' => 'Empleado analista',
                            // 'icon' => 'fas fa-fw fa-user-plus',
                            'icon' => 'fas fa-fw fa-flask',
                            'url' => '/empleado/crear/analista',
                            // 'route' => 'employeer.create',
                        ],
                        [
                            'text' => 'Empleado farmaceutico',
                            'icon' => 'fas fa-fw fa-hospital-user',
                            // 'url' => '#',
                            'route' => 'employeerPharmaceutist.create'
                        ],
                        [
                            'text' => 'Empleado pasante',
                            'icon' => 'fas fa-fw fa-user-graduate',
                            // 'url' => '#',
                            'route' => 'employeerIntern.create'
                        ],
                        // [
                        //     'text' => 'Empleado pasante menor de edad',
                        //     'icon' => 'fas fa-fw fa-house-user',
                        //     'url' => '#',
                        //     // 'route' => 'subsidiary.create'
                        // ]
                    ],
                ]
            ]
        ],
        [
            'text' => 'Laboratorio',
            'icon' => 'fas fa-fw fa-microscope',
            'can' => 'laboratory.edit',
            'submenu' => [
                [
                    'text' => 'Modificar datos',
                    'icon' => 'fas fa-fw fa-database',
                    'route' => 'laboratory.edit',
                ],
            ]
        ],
    ],

        // Navbar items:
        // [
        //     'type'         => 'navbar-search',
        //     'text'         => 'search',
        //     'topnav_right' => true,
        // ],
        // [
        //     'type'         => 'fullscreen-widget',
        //     'topnav_right' => true,
        // ],

        // [
        //     'text'        => 'pages',
        //     'url'         => 'admin/pages',
        //     'icon'        => 'far fa-fw fa-file',
        //     'label'       => 4,
        //     'label_color' => 'success',
        // ],

        // Sidebar items:
        // [
        //     'type' => 'sidebar-menu-search',
        //     'text' => 'search',
        // ],
        // [
        //     'text' => 'blog',
        //     'url'  => 'admin/blog',
        //     'can'  => 'manage-blog',
        // ],

        // [
        //     'text' => 'change_password',
        //     'url'  => 'admin/settings',
        //     'icon' => 'fas fa-fw fa-lock',
        //     'route'  => 'subsidiary.index',
        // ],
        // [
        //     'text'    => 'multilevel',
        //     'icon'    => 'fas fa-fw fa-share',
        //     'submenu' => [
        //         [
        //             'text' => 'level_one',
        //             'url'  => '#',
        //         ],
        //     ],
        // ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
