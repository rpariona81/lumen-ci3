<style>
    .pdfobject-container {
        width: 100%;
        height: 80vh;
        height: 60dvh;
        border: 1px solid #ccc;
    }
</style>

<!--begin::Card-->
<div class="card mb-5">
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Compact form-->
        <div class="d-flex align-items-center">
            <!--begin::Input group-->
            <div class="position-relative w-md-400px me-md-2">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                    </svg>
                </span>
                <?= form_input(
                    array(
                        'name' => 'search_key',
                        'id' => 'search_key',
                        'placeholder' => 'Buscar...',
                        'class' => 'form-control form-control-solid ps-10'
                    )
                );
                ?>
                <!--<input type="text" class="form-control" name="search_key" id="search_key" placeholder="Search by product name" />-->
            </div>
            <div class="d-flex align-items-center">
                <button type="button" id="searchBtn" class="btn btn-primary me-5">Buscar</button>
                <button type="button" id="resetBtn" class="btn btn-warning">Reset</button>
            </div>
        </div>
    </div>


</div>

<div class="row mb-5">
    <div class="g-5 gx-xxl-8">
        <div class="card card-xxl-stretch">
            <div id="ajaxContent"></div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/plugins/pdfobject/jquery-3.7.1.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pdfobject/pdfobject.min.js') ?>"></script>



<script>
    $(function() {

        /*--first time load--*/
        ajaxlist(page_url = false);
        //var $test=document.getElementById("search_key").val('');

        /*-- Search keyword--*/
        $(document).on('click', "#searchBtn", function(event) {
            event.preventDefault();
            ajaxlist(page_url = false);
        });

        /*-- Reset Search--*/
        $(document).on('click', "#resetBtn", function(event) {
            $("#search_key").val('');
            event.preventDefault();
            ajaxlist(page_url = false);
        });

        /*-- Page click --*/
        $(document).on('click', ".pagination li a", function(event) {
            event.preventDefault();
            var page_url = $(this).attr('href');
            ajaxlist(page_url);
        });

        /*-- create function ajaxlist --*/
        function ajaxlist(page_url = false) {
            var search_key = $("#search_key").val();
            // alert(search_key);
            // console.log(search_key);
            var dataString = 'search_key=' + search_key;
            var base_url = '<?php echo site_url('/user/catalog') ?>';

            if (page_url == false) {
                var page_url = base_url;
            }
            console.log(page_url);
            $.ajax({
                type: "POST",
                url: page_url,
                data: dataString,
                success: function(response) {
                    console.log(response);
                    $("#ajaxContent").html(response);
                }
            });
        }
    });
</script>


