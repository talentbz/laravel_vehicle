$(document).ready(function () {

    // delete vehicle
    $('.confirm_delete').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).data('id');
        $('.delete_button').click(function(){
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: vehicle_destroy,
                method: 'post',
                data: {id:id},
                success: function (res){
                    toastr["success"]("データが削除されました!");
                    $('#myModal').modal('hide');
                }
            })
        })
    })
    /*  ==========================================
        SHOW UPLOADED IMAGE
    * ========================================== */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function () {
        $('#upload').on('change', function () {
            readURL(input);
        });
    });

    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */
    var input = document.getElementById( 'upload' );
    var infoArea = document.getElementById( 'upload-label' );

    input.addEventListener( 'change', showFileName );
    function showFileName( event ) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
    }
    
    //manufacture select2 category and sub category
    $('.select-category').on("select2:select", function (e) { 
        
        var select_val = $(e.currentTarget).val();
            for(cat=0; cat<manufactures.length; cat++){
                if(manufactures[cat].category_name == select_val){
                    $("#subcategory").empty();
                    var sub_category = manufactures[cat].children
                    for(sub=0; sub<sub_category.length; sub++){
                        $('#subcategory').append('<option value="'+sub_category[sub]+'">'+sub_category[sub]+'</option>');
                    }
                }
            }
    })
    
    //select2 placeholder
    $('select').select2({
        placeholder: {
          id: '-1', // the value of the option
          text: 'Select an option'
        }
    });

    //single checkbox
    $("input:checkbox").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
        // the name of the box is retrieved using the .attr() method
        // as it is assumed and expected to be immutable
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        // the checked state of the group/box on the other hand will change
        // and the current value is retrieved using .prop() method
        $(group).prop("checked", false);
        $box.prop("checked", true);
        } else {
        $box.prop("checked", false);
        }
    });
     //show and hide expirarin data
      $('.expiration').hide();
      $('.expiration select').removeAttr('name');
      $('.expiration-hide').click(function(){
          $('.expiration').hide();
          $('.expiration select').removeAttr('name');
      })
      $('.expiration-show').click(function(){
        $('.expiration').show();
        $('.end_year').attr('name', 'end_year');
        $('.end_month').attr('name', 'end_month');
    })
     //edit data
     $('form#myForm').submit(function(e){
        e.preventDefault();
        e.stopPropagation();
        var formData = new FormData(this);
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: edit_url,
            method: 'post',
            data: formData,
            success: function (res) {
                toastr["success"]("保存完了");
                $('.back').show();
            },
            error: function (res){
                console.log(res)
            },
            cache: false,
            contentType: false,
            processData: false
        })
    })

    // image upload
    $("#input-711").fileinput({
        theme: 'fa',
        initialPreview: car_paths,
        //uploadAsync: false,
        initialPreviewAsData: true,
        deleteUrl: remove_photo,
        initialPreviewConfig: id_array,
        //minImageWidth:640,
        //maxImageHeight: 480,
        //maxImageWidth: 640,
        //maxImageHeight: 480,
        uploadExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        deleteExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        
        uploadUrl: add_photo_url,
        overwriteInitial: false,
        maxFileCount: 50,
        maxFilesNum: 50,
        showBrowse: false,
        browseOnZoneClick: true,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_').replace(' ', '_');
        },
    });

    // slick slider
    $('.slider-thumbnails').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider',
        focusOnSelect: true
    });       
    $('.slider').slick({
        infinite: false,
        asNavFor: '.slider-thumbnails',
    });

})