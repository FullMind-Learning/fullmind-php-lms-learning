<div class="main_content_iner main_content_padding">

    <div class="dashboard_lg_card">
        <div class="container-fluid no-gutters">
            <div class="row">
                <div class="col-12">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="section__title3 mb_40">
                                    <h3 class="mb-0">Certificados</h3>
                                    <h4></h4>
                                </div>
                            </div>
                        </div>
                        @if(count($certificate_records)==0)
                            <div class="col-12">
                                <div class="section__title3 margin_50">
                                    <p class="text-center">No hay certificados disponibles</p>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="table-responsive">
                                        <table class="table custom_table3 mb-0">
                                            <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Curso</th>
                                                <th scope="col">Número de certificado</th>
                                                @if(isModuleActive('MyClass'))
                                                    <th scope="col">{{__('class.Transcript')}}</th>
                                                @endif
                                                @if(isModuleActive('Invoice'))
                                                    <th scope="col">{{__('invoice.Printed Certificate')}}</th>
                                                @endif
                                                <th scope="col" style="text-align: center">Acción</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($certificate_records))
                                                @foreach ($certificate_records as $key=>$certificate)
                                                    <tr>
                                                        <td scope="row">{{@$key+1}}</td>

                                                        <td>{{ date(Settings('active_date_format'), strtotime($certificate->created_at)) }}</td>

                                                        <td>
                                                            {{@$certificate->course->title}}

                                                        </td>
                                                        <td>
                                                            {{@$certificate->certificate_id}}

                                                        </td>
                                                        @if(isModuleActive('MyClass') && routeIsExist('get-transcript'))
                                                            <td>
                                                                <a href="{{ route('get-transcript', [$certificate->course_id, auth()->user()->id]) }}"
                                                                   class="link_value theme_btn small_btn4"
                                                                   target="__blank">Ver</a>
                                                                <a href="{{ route('get-transcript', [$certificate->course_id, auth()->user()->id, 'download']) }}"
                                                                   class="link_value theme_btn small_btn4">{{ __('common.Download') }}</a>
                                                            </td>
                                                        @endif
                                                        @if(isModuleActive('Invoice'))
                                                            <td>

                                                                @if(!$certificate->orderCertificate)
                                                                    <a href="{{ route('prc.order.now', [$certificate->certificate_id]) }}"
                                                                       class="link_value theme_btn small_btn4"
                                                                       target="__blank">{{ __('invoice.Order Now') }}</a>
                                                                @else
                                                                    @if($certificate->nonPaid())
                                                                        <a href="{{ route('prc.order.now', [$certificate->certificate_id]) }}"
                                                                           class="link_value theme_btn small_btn4"
                                                                           target="__blank">{{ __('invoice.Pay Now') }}</a>
                                                                    @else
                                                                        <strong>{{strtoupper($certificate->orderCertificate ? $certificate->orderCertificate->status : '')}}</strong>
                                                                    @endif
                                                                @endif

                                                            </td>

                                                        @endif
                                                        <td>
                                                            <a href="{{route('certificateDownload',$certificate->certificate_id)}}"
                                                               class="link_value theme_btn small_btn4">Dewcargar</a>
                                                            <a href="{{route('certificateCheck',$certificate->certificate_id)}}"
                                                               class="link_value theme_btn small_btn4">Ver</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                        <div class="mt-4">
                                            {{ $certificate_records->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
