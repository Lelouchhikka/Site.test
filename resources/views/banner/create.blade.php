<form enctype="multipart/form-data" method="post" action="{{route('banner.store')}}">
    @csrf

    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="input-group mb-3">
                <input type="text" id="name" name="name" class="form-control" placeholder="Имя" aria-label="name">
            </div>
            <div>
                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 ">
                                                <span>
                                                    <i class="fas fa-plus"></i>
                                                    Upload a photo
                                                </span>
                    <input id="image" name="image" type="file" class="sr-only">
                    @error('image')
                    <div>{{$message}}</div>
                    @enderror
                </label>
                <button id="btn-example-file-reset" class="text-red-500 ml-5" type="button"><i class="fas fa-times"></i> Clear image</button>

                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <div id="image_preview"></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="px-4 py-3 bg-white text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Добавить
            </button>
        </div>

    </div>
</form>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!--reset input-->
<script language="javascript" type="text/javascript">
    $(document).ready(function() {
        $('#btn-example-file-reset').on('click', function() {
            $('#image').val('');
            $("#image_preview").html("");
        });
    });
</script>
<!--image preview-->
<script language="javascript" type="text/javascript">
    $(function () {
        $("#image").change(function () {
            $("#image_preview").html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            if (regex.test($(this).val().toLowerCase())) {
                if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                    $("#image_preview").show();
                    $("#image_preview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
                }
                else {
                    if (typeof (FileReader) != "undefined") {
                        $("#image_preview").show();
                        $("#image_preview").append("<img />");
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("#image_preview img").attr("src", e.target.result);
                        }
                        reader.readAsDataURL($(this)[0].files[0]);
                    } else {
                        alert("This browser does not support FileReader.");
                    }
                }
            } else {
                alert("Please upload a valid image file.");
            }
        });
    });

</script>
