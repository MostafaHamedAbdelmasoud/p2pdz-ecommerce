@extends('dashboards.layouts.master-dashboard')


@section('header')
@parent
<title>ADMINs Dashboard</title>



@endsection


@section('content')
@parent


<dashboard csrf="{{csrf_token()}}" username="{{ auth()->user()->name }}" user_type="{{ auth()->user()->user_type }}"
  user_img_card="{{ (auth()->user()->getMedia('avatar')->first()) ? auth()->user()->getMedia('avatar')->first()->getUrl('card') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
  user_img_thumb="{{ (auth()->user()->getMedia('avatar')->first()) ? auth()->user()->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/50/000000/admin-settings-male.png' }}">


  <dashboard_element id="statics_tab" label="{{ trans('dashboard.statics') }}" icon='far fa-chart-bar' :selected="true">
    @include('dashboards.admin.layouts.statics')
  </dashboard_element>


  <dashboard_element id="users_tab" label="{{ trans('dashboard.users') }}" icon='fas fa-user-friends'>
    @include('dashboards.admin.layouts.users')
  </dashboard_element>



  <dashboard_element id="contact_tab" label="{{ trans('dashboard.contact') }}" icon='fas fa-microphone-alt' :group="true">
    

    <dashboard_element id="conversations_tab" label="{{ trans('dashboard.conversations') }}" icon='fas fa-comments'>
      @include('dashboards.admin.layouts.conversations')
    </dashboard_element>


    <dashboard_element id="notifications_tab" label="{{ trans('dashboard.notifications') }}" icon='fas fa-bell'>
      @include('dashboards.admin.layouts.notifications')
    </dashboard_element>
    
    <dashboard_element id="support_tab" label="{{ trans('dashboard.support') }}" icon='fas fa-headset'>
      @include('dashboards.admin.layouts.support')
    </dashboard_element>
  
  
  
  
  
    <dashboard_element id="questions_tab" label="{{ trans('dashboard.questions') }}" icon='fas fa-question-circle'>
      @include('dashboards.admin.layouts.questions')
    </dashboard_element>


  </dashboard_element>


  



 



  <dashboard_element id="currencies_tab" label="{{ trans('dashboard.currencies') }}" icon='far fa-money-bill-alt'>
    @include('dashboards.admin.layouts.currencies')
  </dashboard_element>



  <dashboard_element id="credits_tab" label="{{ trans('dashboard.credits') }}" icon='fas fa-sim-card'>
    @include('dashboards.admin.layouts.credits')
  </dashboard_element>


  
  <dashboard_element id="packages_tab" label="{{ trans('dashboard.packages') }}" icon='fas fa-cubes'
    :group="true">

    
    <dashboard_element id="current_packages_tab" label="{{ trans('dashboard.current_packages') }}"
      icon='fas fa-cube'>
      @include('dashboards.admin.layouts.current_packages')
    </dashboard_element>

    
    <dashboard_element id="packages_orders_tab" label="{{ trans('dashboard.packages_orders') }}"
      icon='fas fa-cash-register'>
      @include('dashboards.admin.layouts.packages_orders')
    </dashboard_element>



  </dashboard_element>






  <dashboard_element id="services_tab" label="{{ trans('dashboard.services') }}" icon='fas fa-layer-group'
    :group="true">


    <dashboard_element id="current_services_tab" label="{{ trans('dashboard.current_services') }}"
      icon='fas fa-star'>
      @include('dashboards.admin.layouts.current_services')
    </dashboard_element>

    <dashboard_element id="new_services_tab" label="{{ trans('dashboard.new_services') }}" icon='far fa-star'>
      @include('dashboards.admin.layouts.new_services')
    </dashboard_element>
    
    <dashboard_element id="edit_service_tab" label="{{ trans('dashboard.new_services') }}" icon='far fa-star' no_tab='true'>
      @include('dashboards.admin.layouts.edit_service')
    </dashboard_element>

  </dashboard_element>












  







  <dashboard_element id="settings_tab" label="{{ trans('dashboard.settings') }}" icon='fas fa-cogs' :group='true'>


    
    
    <dashboard_element id="general_settings_tab" label="{{ trans('dashboard.general_settings') }}" icon='fas fa-cog'>
      @include('dashboards.admin.layouts.general_settings')
    </dashboard_element>

    
    <dashboard_element id="seo_tab" label="{{ trans('dashboard.meta_tags') }}" icon='fas fa-code'>
      @include('dashboards.admin.layouts.meta_tags')
    </dashboard_element>


    <dashboard_element id="ads_tab" label="{{ trans('dashboard.advertisement') }}" icon='fas fa-ad'>
      @include('dashboards.admin.layouts.ads')
    </dashboard_element>



    
  </dashboard_element>




</dashboard>






<link rel="stylesheet" href="{{ asset($asset_path.'css/dashboards/admin/main.css') }}">
@endsection


@section('footer')
@parent




<script src="{{ asset($asset_path.'js/dashboards/admin/operations/sub-conversation.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/statics.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/users.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/conversations.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/notifications.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/support.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/questions.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/currencies.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/credits.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/current_packages.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/packages_orders.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/current_services.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/new_services.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/general_settings.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/meta_tags.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/ads.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/operations/complaints.js') }}"></script>


<script src="{{ asset($asset_path.'js/chat.js') }}"></script>
<script src="{{ asset($asset_path.'js/dashboards/admin/main.js') }}"></script>



<script>
  $(document).ready(function(){

    const dashboard_tabs    = document.querySelector('.dashboard-menu-side-tabs');
    const dashboard_tabs_ps = new PerfectScrollbar(dashboard_tabs, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });




    const statics_tab_box    = document.querySelector('#statics_tab_box');
    const statics_tab_box_ps = new PerfectScrollbar(statics_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    


    const users_tab_box    = document.querySelector('#users_tab_box');
    const users_tab_box_ps = new PerfectScrollbar(users_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });
    
    

    
    const conversations_tab_box    = document.querySelector('#conversations_tab_box');
    const conversations_tab_box_ps = new PerfectScrollbar(conversations_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });
  
    

    
    const notifications_tab_box    = document.querySelector('#notifications_tab_box');
    const notifications_tab_box_ps = new PerfectScrollbar(notifications_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });


    
    const support_tab_box    = document.querySelector('#support_tab_box');
    const support_tab_box_ps = new PerfectScrollbar(support_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    
    const currencies_tab_box    = document.querySelector('#currencies_tab_box');
    const currencies_tab_box_ps = new PerfectScrollbar(currencies_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });




    
    
    const credits_tab_box    = document.querySelector('#credits_tab_box');
    const credits_tab_box_ps = new PerfectScrollbar(credits_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });




    
    
    const questions_tab_box    = document.querySelector('#questions_tab_box');
    const questions_tab_box_ps = new PerfectScrollbar(questions_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });


    
    
    const meta_tab_box    = document.querySelector('#meta_tab_box');
    const meta_tab_box_ps = new PerfectScrollbar(meta_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });
    
    
    const settings_tab_box    = document.querySelector('#settings_tab_box');
    const settings_tab_box_ps = new PerfectScrollbar(settings_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });
    



    const ads_tab_box    = document.querySelector('#ads_tab_box');
    const ads_tab_box_ps = new PerfectScrollbar(ads_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });
    
    
    
    const edit_service_tab_box    = document.querySelector('#edit_service_tab_box');
    const edit_service_tab_box_ps = new PerfectScrollbar(edit_service_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });
    
    
    
    const new_services_tab_box    = document.querySelector('#new_services_tab_box');
    const new_services_tab_box_ps = new PerfectScrollbar(new_services_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });
    
    
    const current_services_tab_box    = document.querySelector('#current_services_tab_box');
    const current_services_tab_box_ps = new PerfectScrollbar(current_services_tab_box, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });




    
  });












  window.translation = {

    language : "{!! \App::getLocale() !!}",
    domain: "{!! $domain !!}",

    please_wait: "{!! trans('dashboard.please_wait') !!} ",

    log_out : "{!! trans('dashboard.log_out') !!}",
    change_password : "{!! trans('dashboard.change_password') !!}",
    old_password : "{!! trans('dashboard.old_password') !!}",
    new_password : "{!! trans('dashboard.new_password') !!}",
    new_password_confirmation : "{!! trans('dashboard.new_password_confirmation') !!}",


    add : "{!! trans('dashboard.add') !!}",
    save : "{!! trans('dashboard.save') !!}",
    cancel : "{!! trans('dashboard.cancel') !!}",
    
    operations : "{!! trans('dashboard.operations') !!}",
    are_you_sure: "{!! trans('dashboard.are_you_sure') !!} ",
    cant_revert: "{!! trans('dashboard.cant_revert') !!} ",
    yes_delete: "{!! trans('dashboard.yes_delete') !!} ",

    
    fields_required: "{!! trans('dashboard.fields_required') !!} ",
    date: "{!! trans('dashboard.date') !!} ",
    time_date: "{!! trans('dashboard.time_date') !!} ",
    choose_image_if_you_wanna_change_it: "{!! trans('dashboard.choose_image_if_you_wanna_change_it') !!} ",
    image: "{!! trans('dashboard.image') !!} ",
    profile_picture: "{!! trans('dashboard.profile_picture') !!} ",

    
    add_meta_tag: "{!! trans('dashboard.add_meta_tag') !!} ",
    edit_meta_tag: "{!! trans('dashboard.edit_meta_tag') !!} ",
    add_tag: "{!! trans('dashboard.add_tag') !!} ",
    tag_label: "{!! trans('dashboard.tag_label') !!} ",
    

  };

</script>


@endsection