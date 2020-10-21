const mix = require('laravel-mix');



mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   
   // all pages (views) - not dashboards
   .sass('resources/sass/pages/all-pages.scss', 'public/css/pages/')
   .js('resources/js/pages/all-pages.js', 'public/js/pages/')
   .js('resources/js/chat.js', 'public/js/')
   
   // add_Service
   .sass('resources/sass/pages/add_service.scss', 'public/css/pages/')
   .js('resources/js/pages/add_service.js', 'public/js/pages/')
   
   // issue
   .js('resources/js/pages/issue.js', 'public/js/pages/')

   // homepage
   .sass('resources/sass/pages/home.scss', 'public/css/pages/')
   .js('resources/js/pages/home.js', 'public/js/pages/')
   
   // service
   .sass('resources/sass/pages/service.scss', 'public/css/pages/')
   .js('resources/js/pages/service.js', 'public/js/pages/')
   
   // make order
   .sass('resources/sass/pages/make-order.scss', 'public/css/pages/')
   .js('resources/js/pages/make-order.js', 'public/js/pages/')
   
   //  order
   .sass('resources/sass/pages/order.scss', 'public/css/pages/')
   .js('resources/js/pages/order.js', 'public/js/pages/')
   
   // questions
   .sass('resources/sass/pages/questions.scss', 'public/css/pages/')
   .js('resources/js/pages/questions.js', 'public/js/pages/')
   
   
   // all-services
   .sass('resources/sass/pages/all-services.scss', 'public/css/pages/')
   .js('resources/js/pages/all-services.js', 'public/js/pages/')
   
   
   // all dashboards
   .sass('resources/sass/dashboards/all-dashboards.scss', 'public/css/dashboards/')
   .js('resources/js/dashboards/all-dashboards.js', 'public/js/dashboards/')

   // all dashboard ( faSelectorWidget )
   .sass('resources/sass/dashboards/faSelectorStyle.scss', 'public/css/dashboards/')
   .js('resources/js/dashboards/faSelectorWidget.js', 'public/js/dashboards/')



   // admin dashboard
   .sass('resources/sass/dashboards/admin/main.scss', 'public/css/dashboards/admin/')
   .js('resources/js/dashboards/admin/main.js', 'public/js/dashboards/admin/')

   // user dashboard
   .sass('resources/sass/dashboards/user/main.scss', 'public/css/dashboards/user/')
   .js('resources/js/dashboards/user/main.js', 'public/js/dashboards/user/')





   // admin dashboard operations
   .js('resources/js/dashboards/admin/operations/sub-conversation.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/statics.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/users.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/conversations.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/notifications.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/support.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/questions.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/currencies.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/credits.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/current_packages.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/packages_orders.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/current_services.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/new_services.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/general_settings.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/ads.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/complaints.js', 'public/js/dashboards/admin/operations/')
   
   .js('resources/js/dashboards/admin/operations/meta_tags.js', 'public/js/dashboards/admin/operations/')
   .js('resources/js/dashboards/admin/operations/messages.js', 'public/js/dashboards/admin/operations/')
   ;

   mix.options({processCssUrls:true});
   mix.browserSync('http://127.0.0.1:8000/');