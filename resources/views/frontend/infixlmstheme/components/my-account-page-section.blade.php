<div class="main_content_iner main_content_padding">
    <div class="dashboard_lg_card">
        <div class="container-fluid no-gutters">
            <div class="row">
                <div class="col-xl-12">
                    <!-- account_profile_wrapper  -->
                    <div class="account_profile_wrapper p-4">
                        <div class="account_profile_thumb text-center mb_30">
                            <div class="thumb mb-15">
                                <img class="w-100 h-100" src="{{getInstructorImage($account->image)}}" alt="">
                            </div>

                            <h4>{{$account->name}}</h4>
                        </div>
                        <div class="account_profile_form">
                            <div class="account_title">
                                <h3 class="font_22 f_w_700 ">Ajustes de la cuenta</h3>
                                <p class="mb_25 font_1 f_w_500 theme_text2">Cambia tu contraseña o datos de tu perfil aquí.
                                    .</p>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="primary_label2">Correo electrónico</label>
                                    <div class="">
                                        <input name="email" placeholder="Email"
                                               value="{{$account->email}}"
                                               onfocus="this.placeholder = ''"
                                               readonly
                                               onblur="this.placeholder = 'Email'"
                                               class="primary_input4" type="email">

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class=" mb_30 ">
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('MyUpdatePassword')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                                            <span class="primary_label2">Contraseña actual <span
                                                                    class="text-danger">*</span></span>
                                        <input type="password" placeholder="Contraseña actual"
                                               class="primary_input4  {{ @$errors->has('existing_password') ? ' is-invalid' : '' }}"
                                               name="old_password" {{$errors->has('old_password') ? 'autofocus' : ''}}>


                                    </div>
                                    <div class="col-lg-12 mt_20">
                                                   <span
                                                       class="primary_label2">Nueva contraseña <span
                                                           class="text-danger">*</span></span>
                                        <input type="password" placeholder="Nueva contraseña"
                                               class="primary_input4  {{ @$errors->has('new_password') ? ' is-invalid' : '' }}"
                                               name="new_password" {{$errors->has('new_password') ? 'autofocus' : ''}}>
                                    </div>


                                    <div class="col-lg-12 mt_20">


                                            <span class="primary_label2">Escribe nuevamente tu nueva contraseña <span
                                                    class="text-danger">*</span></span>
                                        <input type="password" placeholder="Contraseña"
                                               class="primary_input4  {{ @$errors->has('confirm_password') ? ' is-invalid' : '' }}"
                                               name="confirm_password" {{$errors->has('confirm_password') ? 'autofocus' : ''}}>
                                    </div>


                                    <div class="col-12">

                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                                class="theme_btn w-100 mt-3 text-center">Cambiar contraseña</button>
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
