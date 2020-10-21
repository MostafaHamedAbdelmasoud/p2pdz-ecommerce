@extends('dashboards.layouts.master-dashboard')

@section('header')
@parent
<title>USER Dashboard</title>



@endsection

@section('content')



<dashboard csrf="{{csrf_token()}}" username="{{ auth()->user()->name }}" user_type="{{ auth()->user()->user_type }}"
  user_img_card="{{ (auth()->user()->getMedia('avatar')->first()) ? auth()->user()->getMedia('avatar')->first()->getUrl('card') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
  user_img_thumb="{{ (auth()->user()->getMedia('avatar')->first()) ? auth()->user()->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/50/000000/admin-settings-male.png' }}">






  <dashboard_element id="statics_tab" icon='far fa-chart-bar' label="{{ trans('dashboard.statics') }}" :selected="true">
    @include('dashboards.user.layouts.statics')
  </dashboard_element>


  <dashboard_element id="purchases_tab" label="{{ trans('dashboard.purchases') }}" icon='fas fa-shopping-cart'>
    @include('dashboards.user.layouts.purchases')
  </dashboard_element>




  <dashboard_element id="my_services_tab" label="{{ trans('dashboard.my_services') }}" icon='fas fa-layer-group'
    :group="true">

    

    <dashboard_element id="add_service_tab" label="{{ trans('dashboard.add_service') }}" icon='fas fa-plus'>
      @include('dashboards.user.layouts.add_service')
    </dashboard_element>
    

    <dashboard_element id="edit_service_tab" label="{{ trans('dashboard.edit_service') }}" icon='far fa-star' no_tab="true">
      @include('dashboards.user.layouts.edit_service')
    </dashboard_element>


    <dashboard_element id="services_tab" label="{{ trans('dashboard.services') }}" icon='far fa-star'>
      @include('dashboards.user.layouts.services')
    </dashboard_element>

    <dashboard_element id="services_orders_tab" label="{{ trans('dashboard.services_orders') }}"
      icon='fas fa-shopping-basket'>
      @include('dashboards.user.layouts.services_orders')
    </dashboard_element>


  </dashboard_element>





  <dashboard_element id="support_tab" label="{{ trans('dashboard.support') }}" icon='fas fa-headset'>
    @include('dashboards.user.layouts.support')
  </dashboard_element>



  <dashboard_element id="settings_tab" label="{{ trans('dashboard.settings') }}" icon='fas fa-cogs'>
    @include('dashboards.user.layouts.settings')
  </dashboard_element>







</dashboard>









<link rel="stylesheet" href="{{ asset('css/dashboards/user/main.css') }}">
@endsection


@section('footer')
@parent

<script src="{{ asset('js/dashboards/user/main.js') }}"></script>

<script>

  $(document).ready(function(){
    

    $("#service_main_cat").on('change', function(){

      $("#service_sub_cat").css({'display': 'block'});
      $("#service_sub_cat option").removeAttr('selected');
      $("#service_sub_cat option:first-of-type").attr('selected', true);
      $(".service_sub_cat_opt").removeClass('active-sub-cat-opt');
      $(".sub_cat_opt_"+$(this).val()).addClass('active-sub-cat-opt');
      
    });


    const add_service_tab_box    = document.querySelector('#add_service_tab_box');
    const add_service_tab_box_ps = new PerfectScrollbar(add_service_tab_box, {
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