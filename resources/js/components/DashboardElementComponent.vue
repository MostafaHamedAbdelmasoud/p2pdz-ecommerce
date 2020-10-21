<style type="text/css">

.dashboard-element, .dashboard-element .simplebar-content{
  visibility: hidden;
  opacity: 0;
  will-change: opacity, visibility;
}
.activeDashboardElement{
  position: absolute;
  top: 74px;
  left: 0;
  width: 100%;
  z-index: 1;
}

.activeDashboardElement .activeDashboardElement{
  top: 0;
}

.activeDashboardElement, .activeDashboardElement .simplebar-content{
  visibility: visible;
  opacity: 1;
  transition: visibility 0.1s, opacity 0.3s ease;
}


</style>

<template>

  <div :class="{ activeDashboardElement: isActive }" class="dashboard-element">
    <slot></slot>
  </div>

</template>

<script>
    

    export default {
        
        props: {
          'id'       : { required : true },
          'label'       : { required : true },
          'icon'        : { required : true }, 
          'selected'    : { default : false },
          'group'       : { default : false },
          'groupOpen'   : { default : false },
          'no_tab'      : { default : false },
        },

        data: function(){

          return {
            isActive    : false,
            isGroupOpen : false,
            elementId   : false,
          }

        },
        methods: {

        }
        ,
        
        computed:{
          
        },

        mounted() {
          this.isActive     = this.selected;
          this.isGroupOpen  = this.groupOpen;
          this.elementId = this.id.toLowerCase().replace(/ /g, '_');
        }

    }
</script>
