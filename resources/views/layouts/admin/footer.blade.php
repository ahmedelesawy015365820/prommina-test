

<!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
<!-- latest jquery-->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>

<!-- feather icon js-->
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>

<!-- Sidebar jquery-->
<script src="{{ asset('assets/js/sidebar-menu.js')}}"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/js/lazysizes.min.js')}}"></script>

<!--copycode js-->
<script src="{{ asset('assets/js/prism/prism.min.js')}}"></script>
<script src="{{ asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{ asset('assets/js/custom-card/custom-card.js')}}"></script>

@yield('chart')

<!--right sidebar js-->
<script src="{{ asset('assets/js/chat-menu.js')}}"></script>

<!--height equal js-->
<script src="{{ asset('assets/js/equal-height.js')}}"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/js/lazysizes.min.js')}}"></script>

<!--script admin-->
<script src="{{ asset('assets/js/admin-script.js')}}"></script>

<script>
    $('.custom-theme').on('click', function() {
    if($('.custom-theme').hasClass('rtl')){
        document.querySelector(".ar").click();
    }else{
        document.querySelector(".en").click();
    }
    });

    $('.search-transfer').on('input',function (e)
    {
        let album_id = $(this).attr('data-album');
        let search = e.target.value;
        if (album_id) {
            setTimeout(() => {
                $.ajax({
                    url: `{{ URL::to('/admin/searchAlbum') }}?album_id=${album_id}&search=${search}` ,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        if(data.albums.length > 0){
                            $('#id_transfer_'+album_id).empty();
                            $('#id_transfer_'+album_id).append('<option selected value="">Choose...</option>');
                            $.each(data.albums, function (key, value) {
                                $('#id_transfer_'+album_id).append('<option value="' + value.id + '">' + value.name + '</option>');
                            });

                        }else{
                            $('#id_transfer_'+album_id).empty();
                        }
                    },
                });
            },500)
        }
        else {
            $('#id_transfer_'+album_id).empty();
        }
    });

</script>

@yield('js')

</body>
</html>
