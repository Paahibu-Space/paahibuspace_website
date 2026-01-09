<script>
    $(document).ready(function (){
       "use strict";
        $(document).on('keyup','input[name="title"]',function (){
            @if($type === 'new')

                // alert(convertToSlug($('input[name="title"]').val()))

            $('input[name="slug"]').val(convertToSlug($('input[name="title"]').val()));
            if($('input[name="slug"]').val() == ''){
                return;
            }
            @else
            var slug =  $('input[name="slug"]').val();

            if(slug == ''){
                alert()
                $('input[name="slug"]').val(convertToSlug($('input[name="title"]').val()));
            }
            @endif
            $.ajax({
                type: 'post',
                url : "{{$url}}",
                data: {
                    _token: "{{csrf_token()}}",
                    type: '{{$type}}',
                    slug : $('input[name="slug"]').val(),
                    lang : $('#language').val()
                },
                success: function (data){
                    // Only update if server returns a valid string slug
                    if (typeof data === 'string' && data !== '[object Object]') {
                        $('input[name="slug"]').val(data);
                    } else if (data && typeof data === 'object' && data.slug) {
                        $('input[name="slug"]').val(data.slug);
                    }
                    // Otherwise keep the client-generated slug
                }
            });
        });

        $(document).on('keyup','input[name="slug"]',function (){
            $('input[name="slug"]').val(convertToSlug($(this).val()));
            if($('input[name="slug"]').val() == ''){
                return;
            }
            $.ajax({
                type: 'post',
                url : "{{$url}}",
                data: {
                    _token: "{{csrf_token()}}",
                    type: '{{$type}}',
                    slug : $('input[name="slug"]').val(),
                    lang : $('#language').val()
                },
                success: function (data){
                    // Only update if server returns a valid string slug
                    if (typeof data === 'string' && data !== '[object Object]') {
                        $('input[name="slug"]').val(data);
                    } else if (data && typeof data === 'object' && data.slug) {
                        $('input[name="slug"]').val(data.slug);
                    }
                    // Otherwise keep the client-generated slug
                }
            });
        });

        function convertToSlug(Text) {
            return Text
                .toLowerCase()
                .replace(/ /g, '-')
                .replace(/[^\w-]+/g, '');
        }

    });

</script>