<div>
    <table id="" class="table  branchList">
        <tbody>
        @if(!empty($categories))
            @foreach($categories->where('parent_id',0) as $key=>$category)
                @include('org::category._single_category',['$category'=>$category,'level'=>1])
            @endforeach
        @endif
        </tbody>
    </table>

    @push('js')

        <script>
            $(document).on("click", ".changeOrgStatus", function () {
                $.LoadingOverlay("show");
            });

            Livewire.hook('element.updated', (el,component) => {
                if(component.name=='show-category') {
                    $.LoadingOverlay("hide");
                }
            })
        </script>
    @endpush
</div>
