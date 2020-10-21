<style type="text/css">




thead > tr > th{
  background-color: #5568d2 !important;
}

.dashboard{
  display: flex;
  height: 100vh;
  text-align: center;
}


.dashboard-menu-side{
  width: 280px;
  height: 100vh;
  color: var(--main-color);
  background-color: #343a40;
  position: absolute;
  top: 0;
  left: 0;
  transform: translate3d(-30% , 0, 0);
  padding: 0 2px;
  box-shadow: 1px 0px 30px #2f3033;
  z-index: 20;
  transition: visibility 0.2s ease, opacity 0.2s ease, transform 0.2s ease;
  background: linear-gradient(90deg, #5a5a5ab0 0%, rgba(24, 24, 24, 0.88) 48%, #343a40 99%);
}




[dir="rtl"] .dashboard-menu-side{
  right: 0;
  transform: translate3d(30% , 0, 0);
}

.dashboard-menu-side , .dashboard-menu-side .simplebar-content-wrapper{
  visibility: hidden;
  opacity: 0;
}

.dashboard-menu-side .simplebar-content-wrapper{
  transition: visibility 0.2s, opacity 0.2s ease;
}

.opendMenu, .opendMenu .simplebar-content-wrapper, [dir="rtl"] .opendMenu, [dir="rtl"]  .opendMenu .simplebar-content-wrapper{
  transform: translate3d(0 , 0, 0);
  visibility: visible;
  opacity: 1;
  transition: visibility 0.2s ease, opacity 0.2s ease, transform 0.2s ease;
}






.dashboard-menu-side-close{
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  border-radius: 50%;
  padding-top: 2px;
  font-size: 26px;
}
[dir='rtl'] .dashboard-menu-side-close{
  left: 5px;
  right: auto;
}

.dashboard-menu-side-close:hover{
  background-color: rgb(43, 43, 43);
  color: #FFF;
  box-shadow: 0 0 5px #31de6d;
}
.dashboard-menu-side-character-img{
  height: 175px;
  padding: 0 15px;
  display: flex;
  align-items: center;
  direction: ltr;
}

.dashboard-main-profile-img{
  justify-content: center;
  border-radius: 50%;
  height: 150px;
  flex: 1;
  width: 140px;
  display: flex;
  padding-right: 22px;
}
.dashboard-menu-vertical-btns{
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-right: auto;
  margin-top: 66px;
}

.dashboard-menu-vertical-btns > div{
  color: #ffffff;
  display: flex;
  justify-content: center;
  align-items: center;
  border: 1px solid #DDD;
  height: 35px;
  width: 50px;
  margin: 5px 0;
  border: 3px solid #ffffff2e;
  border-radius: 10px;
}
.dashboard-menu-vertical-btns > div:nth-of-type(1){
  position: absolute;
  top: 6px;
  right: 10px;
  border: 1px solid var(--light-border-color);
  color: #FFF;
  width: 50px;
  height: 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  cursor: pointer;
  border-radius: 50%;
  font-size: 22px;
  background-color: rgba(255,255,255,.15);
}

.dashboard-menu-side-character-img img{
  object-fit: cover;
  height: 150px;
  width: 150px;
  border-radius: 50%;
  box-shadow: 0px 0px 13px #3a3a3a5e;
  border: 4px solid #fafafa33;
}

.dashboard-menu-side-tabs-container{
  border: 2px solid #fafafa33;
  border-bottom: 0;
  overflow: hidden;
  padding: 5px;
  margin: 5px;
  border-radius: 5px;
}

.dashboard-menu-side-tabs{
  height: calc( 100vh - 175px );
  background-color: #ffffff;
  position: relative;
  padding: 0 5px 15px;
  border-bottom: navajowhite;
  box-shadow: 0 0 13px #0000005e inset;
  border-bottom: none;
  border-radius: 3px;
}

.dashboard-content-side{
  flex: 1;
}
.dashboard-content-side-header{
  display: flex;
  padding: 12px 10px 10px 10px;
  border-bottom: 1px solid rgba(221, 221, 221, 0.326);
  background-color: var(--main-color);
  z-index: 19;
  position: relative;
  box-shadow: 0px 0px 5px grey;
  height: 74px;
}
.dashboard-menu-side-toggle-tab{
  border: 1px solid var(--light-border-color);
  color: #FFF;
  width: 50px;
  height: 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  cursor: pointer;
  border-radius: 50%;
  font-size: 22px;
  margin-right: auto;  
  background-color: rgba(255,255,255,.15);
}
[dir="rtl"] .dashboard-menu-side-toggle-tab{
  margin-left: auto;
  margin-right: 0;
}

.dashboard-menu-side-toggle-tab:hover , .go-home-icon:hover{
  background-color: rgb(43, 43, 43);
  color: #FFF;
  box-shadow: 0 0 5px #31de6d;
}
.dashboard-tab{
  display: flex;
  padding: 5px 0;
  cursor: pointer;
  text-transform: capitalize;
  text-shadow: 0 0 1px var(--gray);
  border-bottom: 1px solid #DDD;
  background-color: #ffffff;
  border-bottom: 0;
  color: #343a40;
  box-shadow: 0 0 5px grey;
  border-radius: 3px;
  margin: 5px 0;
}

.messages, .notifications{
  display: flex;
  flex-direction: column;
  justify-content: center;
  cursor: pointer;
}


.messages > div:nth-of-type(2), .notifications > div:nth-of-type(2){
  font-size: 24px;
  width: 60px;
  cursor: pointer;
}
.messages > div:nth-of-type(2):hover, .notifications > div:nth-of-type(2):hover{
  color: grey;
}

.messagesAndNotifications{
  display: flex;
  margin: 0 0 0 20px;
  color: #FFF;
  display: none;
}



.messagesAndNotifications > div{
  position: relative;
  border: 1px solid var(--light-border-color);
  border-radius: 60px;
  background-color: rgba(255,255,255,.15);
  width: 50px;
  align-items: center;
  margin: 0 10px;
}

.notificationsCounter, .messagesCounter{
  position: absolute;
  top: -2px;
  left: -10px;
  background-color: #ff000073;
  padding: 0 5px;
  min-width: 25px;
  height: 25px;
  border-radius: 25px;
}


.dashboard-tab:not(.dashboard-tab-sub):hover, .active-dashboard-tab{
  background-color: rgb(58, 58, 58);
  color: #FFF;
  border-bottom: 0;
  background: linear-gradient(90deg, #5a5a5ab0 0%, rgba(24, 24, 24, 0.88) 48%, #343a40 99%);
  box-shadow: 0 0 5px grey;
  border-radius: 3px;
}

.dashboard-tab-icon{
  width: 40px;
  border-right: 1px solid var(--dark);
  font-size: 20px;
}
[dir="rtl"] .dashboard-tab-icon{
  border-left: 1px solid #c7c7c7;
  border-right: none;
}
.dashboard-tab-label{
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: left;
  padding-left: 10px;
}

[dir="rtl"] .dashboard-tab-label{
  text-align: right;
  padding-right: 10px;
  padding-left: 0
}

.dashboard-tab-sub{
  background-color: #FFF;
  box-shadow: none !important;
  border-top: 1px solid #DDD;
  display: none;

}
.dashboard-tab-sub:hover, .active-sub-dashboard-tab{
  background-color: #cccccc !important;
  color: #000;
}
.active-dashboard-group-tab {
  margin-bottom: 10px;
  border-radius: 3px;
  overflow: hidden;
  box-shadow: 0px 0px 5px #00000082;
}
.active-dashboard-group-tab {
  background-color: #3f51b53d;
}

.active-dashboard-group-tab > div{
  background-color: transparent;
}
.active-dashboard-group-tab > div:nth-of-type(1){
  background-color: #27272787;
  color: #FFF;
}

.active-dashboard-group-tab .dashboard-tab-sub{
  border-radius: 0;
  transform: translate3d(0 , 0, 0) !important;
  font-size: 13px !important;
  padding: 8px 0;
}
.active-dashboard-group-tab .dashboard-tab-sub .dashboard-tab-icon{
  font-size: 13px !important;
}
.active-dashboard-group-tab > div:nth-of-type(1){
  border-bottom-left-radius: 0 !important;
  border-bottom-right-radius: 0 !important;
}


.active-dashboard-group-tab .dashboard-tab-sub{
  display: flex;
}

.active-dashboard-group-tab .active-dashboard-tab{
  margin: 0 !important;
}

.active-dashboard-group-tab .dashboard-tab-sub{
  margin: 0;
}


.dashboard-tab-group > div:nth-of-type(1) .dashboard-tab-label{
  display: flex;
  flex-direction: row;
}

.active-dashboard-group-tab > div{
  margin: 0;
}

.dashboard-tab-group  > div:nth-of-type(1) .dashboard-tab-label > div{
  display: flex;
  flex-direction: column;
  justify-content: center
}

.dashboard-tab-group  > div:nth-of-type(1) .dashboard-tab-label > div:nth-of-type(1){
  flex: 1;
} 
.dashboard-tab-group  > div:nth-of-type(1) .dashboard-tab-label > div:nth-of-type(2){
  width: 40px;
  text-align: center;
}

.currentUser{
  position: relative;
  width: calc( 100% - 190px );
  max-width: 200px;
  margin-left: 10px;
  border: 1px solid var(--light-border-color);
  border-radius: 51px;
  background-color: rgba(255,255,255,.15);
  transition: border-radius 0.2s ease;
}



.currentUserTab{
  height: 50px;
  display: flex;
  justify-content: center;
  color: #FFF;
  font-size: 25px;
  cursor: pointer;
}

.currentUserTab > div{
  display: flex;
  justify-content: center;
  line-height: 50px;
}

.currentUserTab > div:nth-of-type(2){
  flex: 1;
}


.currentUserTab > div > div:nth-of-type(1){
  padding-left: 5px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.currentUserTab > div > div:nth-of-type(2){
  padding: 0 5px 0 15px;
}

.currentUserOperations{
  width: 100%;
  visibility: hidden;
  border-radius: 6px;
  box-shadow: 0px 0px 10px #80808087;
  position: relative;
  z-index: 20;
}

.currentUserOperations > div{
  background-color: #fff;
  transition: all 0.3s ease;
  opacity: 0;
}
.currentUserOperations > div:nth-of-type(1){
  transform: translateY(10px);
}

.currentUserOperations > div:nth-of-type(2){
  transform: translateY(20px);
}

.currentUserOperations > div:hover{
  background-color: #EEE;
}

.changePassword{
  border-bottom: 1px solid #DDD;
  border-radius: 5px 5px 0 0;
}

.logoutForm{
  border-radius: 0 0 5px 5px;
}

.currentUser:hover{
  border-bottom: none;
  border-radius: 10px 10px 0 0;
}

.currentUser:hover .currentUserOperations{
  visibility: visible;
  transition: all 0.3s ease;
}

.table .thead-dark th{
  background-color: #343a40 !important;
}

.currentUser:hover .currentUserOperations > div{
  transform: translateY(0);
  opacity: 1;
  box-shadow: 0px 0px 5px #13131357;
}
.currentUser:hover .currentUserOperations > div:nth-of-type(1){
  border-bottom: none;
  border-radius: 0;
  height: 46px;
}


.currentUser button{
  width: 100%;
  height: 100%;
  background-color: transparent;
  border: none;
  padding: 10px;
  color: grey;
  outline: none;
  display: flex;
}
.currentUser button > div:nth-of-type(1){
  flex: 1;
}

.currentUser button:hover{
  color: #000
}

.currentUserTabImg img{
  height: 40px;
  border-radius: 40px;
  width: 40px;
  object-fit: cover;
  margin: 4px;
}

.mdl-tooltip{
  font-size: 14px;
  background-color: #f14668a1;
  
}
.tt{
  outline: none !important;
}









#notificationsWrapper, #messagesWrapper{
  position: absolute;
  top: 64px;
  left: -10px;
  width: 270px;
  visibility: hidden;
  opacity: 0;
  transition: visibility 0.2s ease, opacity 0.2s ease;
}

.notifications-content-wrapper, .messages-content-wrapper{
  background-color: #FFF;
  box-shadow: 1px 1px 5px grey;
  color: grey;
  border-radius: 3px;
  max-height: 280px;
}

#notificationsWrapper .simplebar-content-wrapper, #messagesWrapper .simplebar-content-wrapper{
  visibility: hidden;
  transition: visibility 0.2s ease,
}

#notificationsWrapper.notificationOpend, #notificationsWrapper.notificationOpend .simplebar-content-wrapper,   #messagesWrapper.messageOpend, #messagesWrapper.messageOpend .simplebar-content-wrapper{
  visibility: visible;
  opacity: 1;
}



#notificationsWrapper::before, #messagesWrapper::before{
  content: '';
  display: inline-block;
  border: 10px solid #FFF;
  position: absolute;
  left: 24px;
  top: -20px;
  border-right-color: transparent;
  border-left-color: transparent;
  border-top-color: transparent;
}




#notificationsWrapper .scroll-content > .header-notification-row,  #messagesWrapper .scroll-content > .header-message-row{
  border-bottom: 1px solid #DDD;
  width: 100%;
  height: 40px;
  line-height: 40px;
  display: flex;
}
#notificationsWrapper .scroll-content > .header-notification-row > div, #messagesWrapper .scroll-content > .header-message-row > div{
  padding: 0 5px;
}
#notificationsWrapper .scroll-content > .header-notification-row > div:nth-of-type(1), #messagesWrapper .scroll-content > .header-message-row > div:nth-of-type(1){
  width: 40px;
  border-right: 1px solid #DDD;
}

#notificationsWrapper .scroll-content > .header-notification-row > div:nth-of-type(2), #messagesWrapper .scroll-content > .header-message-row > div:nth-of-type(2){
  flex: 1;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  position: relative;
}

#notificationsWrapper .scroll-content > .header-notification-row > div:nth-of-type(2) > div:nth-of-type(2), #messagesWrapper .scroll-content > .header-message-row > div:nth-of-type(2) > div:nth-of-type(2){
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  position: relative;
  width: 100%;
}

.header-notifications-label, .header-messages-label{
  text-align: left;
  text-transform: capitalize;
  font-weight: 600;
  padding: 5px;
  color: #FFF;
  background-color: var(--main-color);
  box-shadow: 1px 1px 3px grey;
  position: relative;
  z-index: 1;
}
.header-notification-row:hover, .header-message-row:hover{
  color: #b80707bd;
}
.notSeen{
  background-color: #EEE;
}

.notificationAndMessageloadingAnimation{
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  margin: auto;
  background-color: #fff;
  opacity: 0;
  visibility: hidden;
  transition: visibility 0.2s ease, opacity 0.2s ease;
}
.notificationAndMessageloadingAnimation .lds-ellipsis div{
  top: 14px;
}
.notificationAndMessageloadingAnimation-active{
  visibility: visible;
  opacity: 0.6;
}


.messagesWrapperLoading, .notificationsWrapperLoading{
  background-color: #FFF;
  box-shadow: 1px 1px 5px grey;
  width: 100%;
}


/* settings */
.settings_container .simplebar-content{
  display: flex;
  flex-wrap: wrap;
  justify-content: center
}

.settings-box{
  width: 48%;
  border: 1px solid #DDD;
  padding: 0 15px 15px 15px;
  margin: 1%;
}

.settings-box-label{
  border-bottom: 1px dashed #DDD;
  text-align: left;
  padding: 10px 0;
  color: var(--main-color);
  font-weight: 600;
  margin-bottom: 10px;
}

[dir='rtl'] .settings-box-label{
  text-align: right;
}

@media screen and (max-width: 800px){

  .settings-box{
    width: calc(100% - 20px );
    padding: 10px;
    margin: 10px;
  }

}




.element_content_container{
  height: calc( 100vh - 110px );
  padding: 20px;
  position: relative;
}


.element_content_container_label{
  text-align: left;
  border-bottom: 1px solid #DDD;
  color: #dc3545;
  background-color: #EEE;
  padding: 10px;
  text-transform: capitalize;
  font-weight: bold;
  margin: 0 !important;
  font-size: 20px;
}

[dir="rtl"] .element_content_container_label{
  text-align: right;
}


.dash-btn{
  background-color: var(--main-color) !important;
}


.go-home-icon{
  border: 1px solid var(--light-border-color);
  color: #FFF;
  width: 50px;
  height: 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  cursor: pointer;
  border-radius: 50%;
  font-size: 22px;
  margin: 0 15px;
  background-color: rgba(255,255,255,.15);
}

.go-home-icon a{
  color: #FFF;
}


</style>

<template>


  <div id="vue-dashboard" class="dashboard" @click="openNotifications = false; openMessages = false;">


    <div class="dashboard-menu-side" :class="{ opendMenu: isOpend }">

    
      
      <div class="dashboard-menu-side-character-img">
        
        <div class="dashboard-main-profile-img">
          <img :src="this.$props.user_img_card" />
        </div>
        

        <div class="dashboard-menu-vertical-btns">
         
         
          <div>
            <div id="tt1" class="dashboard-menu-side-close tt" @click="isOpend = false">
              <i class="fas fa-times"></i>
            </div>
            <div class="mdl-tooltip mdl-tooltip--left" data-mdl-for="tt1">Close Menu</div>
          </div>



          <div>8</div>

          <div>9</div>

        </div>


      </div>
      

      <div class="dashboard-menu-side-tabs-container">

        <div class="dashboard-menu-side-tabs">




          <!-- menu tabs -->
          <div v-for="tab in tabs" :key="tab.id">
            

            <!-- none group tab -->
            <div v-if="!tab.group" :class="{'active-dashboard-tab': tab.isActive, 'd-none' : tab.no_tab }" @click="openTab(tabs, tab)"  class="dashboard-tab" :id="tab.elementId">
              <div class="dashboard-tab-icon"><i :class="tab.icon"></i></div>
              <div class="dashboard-tab-label">{{ tab.label }}</div>
            </div>
            <!-- /.dashboard-tab -->

            <!-- group tab -->
            <div v-if="tab.group"  class="dashboard-tab-group" :class="{'active-dashboard-group-tab': tab.isGroupOpen }">
              
              <div class="dashboard-tab" @click.stop="openSubMenu(tab)" :class="{'active-dashboard-tab': tab.isActive }">
                <div class="dashboard-tab-icon"><i :class="tab.icon"></i></div>
                <div class="dashboard-tab-label">
                  <div>{{ tab.label }}</div>
                  <div>
                    <i v-if="tab.isGroupOpen" class="fas fa-chevron-up"></i>
                    <i v-if="!tab.isGroupOpen" class="fas fa-chevron-down"></i>
                  </div>
                </div>
              </div>
              <!-- /.dashboard-tab -->

              <div v-for="subtab in tab.$children" 
              :key="subtab.id" class="dashboard-tab dashboard-tab-sub" @click="openSubTab(tab, subtab)"
              :class="{'active-sub-dashboard-tab': subtab.isActive , 'd-none' : subtab.no_tab}" 
              :id="subtab.elementId">
                

                <div  class="dashboard-tab-icon"><i :class="subtab.icon"></i></div>
                <div class="dashboard-tab-label">{{ subtab.label }}</div>
              </div>
              <!-- /.dashboard-tab-sub -->

            </div>
            <!-- /.dashboard-tab-group -->



          </div>
          <!-- /menu tabs -->

        </div>
        <!-- /.dashboard-menu-side-tabs -->

      </div>
     <!-- /.dashboard-menu-side-tabs-container -->



    </div>
    <!-- /.dashboard-menu-side -->







    <div class="dashboard-content-side" @click="isOpend = false">

      
      
      <div class="dashboard-content-side-header">
        
        <div class="dashboard-menu-side-toggle-tab tt" @click.stop="isOpend =true" id="tt2">
          <i class="fas fa-bars"></i>
        </div>
        <div class="mdl-tooltip mdl-tooltip--right" data-mdl-for="tt2">Open Menu</div>




        <div class="messagesAndNotifications">



          <div class="notifications" @click.stop="viewNotifications()">
            <div><div v-if="this.$props.user_type==0" class="notificationsCounter">0</div></div>
            <div id="tt3" class="tt"><i class="far fa-bell"></i></div>
            <div class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="tt3">View Notifications</div>


            <div id="notificationsWrapper" :class="{ notificationOpend : openNotifications }" @click.stop>
             <div class="header-notifications-label">Notifications</div>

             <div class="notificationsWrapperLoading">
               <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
             </div>

             <div class="notifications-content-wrapper" data-scrollbar></div>
            </div>


          </div>
          <!-- /.notifications -->
          

          <div class="messages" @click.stop="viewMessages()">

            <div><div v-if="this.$props.user_type==0" class="messagesCounter">0</div></div>


            <div id="tt4" class="tt"><i class="far fa-envelope"></i></div>
            <div class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="tt4">View Messages</div>
            


            <div id="messagesWrapper" :class="{ messageOpend : openMessages }" @click.stop>
             <div class="header-messages-label">Messages</div>
             
             <div class="messagesWrapperLoading">
               <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
             </div>
             
             <div class="messages-content-wrapper" data-scrollbar></div>
            </div>


          </div>
          <!-- /.messages -->

        </div>
        <!-- /.msgsAndNotifications -->
        

        <div class="go-home-icon">
          <a href="/"><i class="fas fa-home"></i></a>
        </div>


        <div class="currentUser">

          <div class='currentUserTab'>
            <div class="currentUserTabImg">
              <img :src="this.$props.user_img_thumb" />
            </div>
            <div><div>{{ username }}</div><div><i class="far fa-user"></i></div></div>
          </div>

          <div class="currentUserOperations">
            
            <div class="changePassword">
              <button @click="changePassword()"><div>{{ change_password }}</div><div><i class="material-icons">vpn_key</i></div></button>
            </div>

            <div class="logoutForm">
              <form action="/users/logout" method="POST">
                <input type="hidden" name="_token" v-bind:value="csrf">
                <button type="submit"><div>{{ log_out }}</div><div><i class="fas fa-power-off"></i></div></button>
              </form>
            </div>

          </div>

        </div>
        <!-- /.currentUser -->

        
        



      </div>
      <!-- /.dashboard-content-side-header -->






      <!-- this slot tag will hold all of the elements content -->
      <slot></slot>




    </div>
    <!-- /.dashboard-content-side -->


    
  </div>
  <!-- /.dashboard -->

</template>

<script>
    
  export default {
      
      props: ['csrf', 'username', 'user_type', 'user_img_card', 'user_img_thumb'],

      data: function(){
        return {
          tabs: [],
          isOpend: false,
          openNotifications: false,
          openMessages: false,
          loadPreviousNotifications: true,
          loadPreviousMessages: true,
          change_password: '',
          log_out: '',
        }
      },



      created: function(){
        this.tabs = this.$children;
      },



      methods: {

        openTab(tabs, selectedTab){
          tabs.forEach(function(tab){
            tab.isActive = ( tab.id == selectedTab.id );
            tab.isGroupOpen = false;
            if(tab.group){
              tab.$children.forEach(function(subTab){
                subTab.isActive = false;
              });
            }
          });
          this.isOpend = false;
        },


        openSubTab(groupTab, subTab){
          this.tabs.forEach(function(tab){
            tab.isActive = ( tab.id == groupTab.id );
            if(tab.group){
              if(tab.id != groupTab.id ){
                tab.$children.forEach(function(child){
                  child.isActive = false;
                })   
              }
            }
          });
          groupTab.$children.forEach(function(tab){
            tab.isActive = ( tab.id == subTab.id );
          });
          this.isOpend = false;
        },

        
        openSubMenu (selectedTab){
          this.tabs.forEach(function(tab){
            if(tab.id == selectedTab.id){
              if(tab.isGroupOpen){
                tab.isGroupOpen = false;
              } else {
                tab.isGroupOpen = true;
              }
            } else {
              tab.isGroupOpen = false;
            }
          });
        },

        

        changePassword: function(auth, id){

          // if changing the logged in account password ( auth = true ) by default 
          // no need to provide parameters but must provide false if admin changing user password
          auth = typeof auth !== 'undefined' ? auth : true;
          // if changing user account password by admin we need the account id
          id = typeof id !== 'undefined' ? id : false;

          Swal.fire({
              title: window.translation.change_password,
              showCancelButton: true,
              confirmButtonText: window.translation.save,
              cancelButtonText: window.translation.cancel,
              customClass: {
              confirmButton: 'button is-primary is-rounded m-3',
              cancelButton: 'button is-danger is-rounded',
              },
              buttonsStyling: false,
              showLoaderOnConfirm: true,
              html:
              `<input id="old_password" type="password" placeholder="`+window.translation.old_password+`" class="form-control change_password_field text-center">
              <input id="new_password" type="password" placeholder="`+window.translation.new_password+`" class="form-control change_password_field text-center">
              <input id="new_password_confirmation" type="password" placeholder="`+window.translation.new_password_confirmation+`" class="form-control change_password_field text-center">`,

              preConfirm: () => {

              var old_password = $("#old_password").val();
              var new_password = $("#new_password").val();
              var new_password_confirmation = $("#new_password_confirmation").val();

              if (! old_password || ! new_password || ! new_password_confirmation ) {
                  Swal.showValidationMessage('Please fill in all fields')   
              } else {
              
                  return axios.put('/users/'+id+'/password', {
                  logged_in : auth,
                  user_id   : id,
                  old_password : old_password,
                  new_password : new_password,
                  new_password_confirmation : new_password_confirmation,
                  })
                  .then(function (response) {
                  if(response.data.error==1){
                      throw new Error(response.data.message)
                  }
                  return response.data;
                  }).catch(error => {
                  Swal.showValidationMessage(
                      `${error}`
                  )
                  });

              }
              },
              allowOutsideClick: () => !Swal.isLoading()
          }).then((result) => {
            if (result.value) {
              window.Toast.fire({
                icon: 'success',
                title: result.value.message
              })
            }
          })
        },/* changePassword() */

      },


      mounted() {

        

        var self = this;
        $(window).ready(function(){
          
          self.change_password = window.translation.change_password;
          self.log_out = window.translation.log_out;

          if(self.$props.user_type==0){
            // user only functionality


          } else {
            // admin only functionality
            
          }
          
          
          /* if(window.translation.domain =="www.koooramubasher.com" || window.translation.domain == "koooramubasher.com" || window.translation.domain == '127.0.0.1:8000'){

          } else {
            $("#vue-dashboard").html('');
          } */

        });
        /* /ready() */


      },
      /* /mounted() */

      

  }
</script>
