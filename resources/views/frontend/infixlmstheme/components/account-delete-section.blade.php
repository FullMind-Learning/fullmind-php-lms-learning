<div class="main_content_iner main_content_padding">
    <div class="dashboard_lg_card">
        <div class="container-fluid no-gutters">
            <div class="row">
                <div class="col-xl-12">
                    <div class="account_profile_wrapper p-4 align-items-center">
                        <div class="account_profile_thumb text-center mb_30">
                            <div class=" mb-15">
                                <img class="w-100 h-100"
                                     src="{{asset('public/frontend/infixlmstheme/img/account/delete_account.png')}}"
                                     alt="">
                            </div>
                        </div>
                        <div class="account_profile_form">
                            <div class="account_title">
                                <h3 class="font_22 f_w_700 ">Eliminar cuenta</h3>
                                <p class="mb_25 font_1 f_w_500 theme_text2">Si eliminas tu cuenta, tus datos desaparecerán para siempre
                                </p>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="primary_label2">Email</label>
                                    <div class="">
                                        <input name="email" placeholder="email"
                                               value="{{$account->email}}"
                                               onfocus="this.placeholder = ''"
                                               readonly
                                               onblur="this.placeholder = '{{__('student.Email Address')}}'"
                                               class="primary_input4" type="email">

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class=" mb_30 ">
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('MyAccountDelete')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 mb_20">
                                                                            <span class="primary_label2">Contraseña <span
                                                                                    class="text-danger">*</span></span>
                                        <input type="password" placeholder="Contraseña"
                                               class="primary_input4  {{ @$errors->has('existing_password') ? ' is-invalid' : '' }}"
                                               name="old_password" {{$errors->has('old_password') ? 'autofocus' : ''}}>


                                    </div>


                                    <div class="col-12 ">
                                        <button type="submit"
                                                class="theme_btn mt-3 text-center">Eliminar cuenta</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
