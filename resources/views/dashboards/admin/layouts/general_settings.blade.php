<h3 class="element_content_container_label"># {{ trans('dashboard.settings') }}</h3>



<div id="settings_tab_box" class="settings_container element_content_container" style="display: flex;flex-wrap: wrap">


    <div class="settings-box">

        <h3 class="settings-box-label">{{ trans('dashboard.change_profile_picture') }}</h3>

        <div>

            <form id="change-profile-picture-form">

                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profile-picture-input"
                            aria-describedby="profile-picture-input">
                        <label class="custom-file-label profile-picture-label"
                            for="profile-picture-input">{{ trans('dashboard.profile_picture') }}</label>
                    </div>
                </div>

                <div class="progress" style="display:none">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width:0%"></div>
                </div>

                <button onclick="event.preventDefault();App.SettingsController().changeProfilePicture()"
                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    {{ trans('dashboard.save') }} &nbsp;<i class="far fa-save"></i>
                </button>

            </form>

        </div>

    </div><!-- /.settings-box -->

    @php( $settings = \App\Setting::find(1) )


    <div class="settings-box">


        <h3 class="settings-box-label">عن الموقع</h3>

        <div>
            <textarea style="text-align: center;direction: ltr !important;margin-bottom: 10px" type="text"
                class="form-control" id="about-text">{{$settings->about}}</textarea>


            <button onclick="event.preventDefault();App.SettingsController().changeAbout()"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                {{ trans('dashboard.save') }} &nbsp;<i class="far fa-save"></i>
            </button>

        </div>

    </div><!-- /.settings-box -->



    <div class="settings-box">


        <h3 class="settings-box-label">بيانات التواصل </h3>

        <div>

            <div class="mb-3">
                <div class="custom-file">
                    <label for="fb-url">Email</label>
                    <input style="text-align: left;direction: ltr !important;" type="text" class="form-control"
                        id="email-text" value="{{$settings->email}}">
                </div>
            </div>

            <div class="mb-3">
                <div class="custom-file">
                    <label for="fb-url">Phone</label>
                    <input style="text-align: left;direction: ltr !important;" type="text" class="form-control"
                        id="phone-text" value="{{$settings->phone}}">
                </div>
            </div>

            <button onclick="event.preventDefault();App.SettingsController().changeContact()"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                {{ trans('dashboard.save') }} &nbsp;<i class="far fa-save"></i>
            </button>

        </div>

    </div><!-- /.settings-box -->





    <div class="settings-box">




        <h3 class="settings-box-label"> التواصل الإجتماعى</h3>

        <div>

            <div class="mb-3">
                <div class="custom-file">
                    <label for="fb-url">Facebook</label>
                    <input style="text-align: left;direction: ltr !important;" type="text" class="form-control"
                        id="fb-url" value="{{$settings->facebook}}">
                </div>
            </div>

            <div class="mb-3">
                <div class="custom-file">
                    <label for="fb-url">Twitter</label>
                    <input style="text-align: left;direction: ltr !important;" type="text" class="form-control"
                        id="tw-url" value="{{$settings->twitter}}">
                </div>
            </div>

            <div class="mb-3">
                <div class="custom-file">
                    <label for="fb-url">YouTube</label>
                    <input style="text-align: left;direction: ltr !important;" type="text" class="form-control"
                        id="yt-url" value="{{$settings->youtube}}">
                </div>
            </div>

            <div class="mb-3">
                <div class="custom-file">
                    <label for="fb-url">Instagram</label>
                    <input style="text-align: left;direction: ltr !important;" type="text" class="form-control"
                        id="ins-url" value="{{$settings->instagram}}">
                </div>
            </div>

            <button onclick="event.preventDefault();App.SettingsController().changeSocial()"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                {{ trans('dashboard.save') }} &nbsp;<i class="far fa-save"></i>
            </button>

        </div>

    </div><!-- /.settings-box -->







</div>