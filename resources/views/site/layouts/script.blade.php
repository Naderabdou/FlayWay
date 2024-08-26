<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>


<!-- jquery -->
<script src="{{ asset('site/js/jquery.js') }}"></script>
<script src="{{ asset('site/js/custom.js') }}"></script>

<!-- end menu responsive ===
            ======== -->
<script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>
<!-- aos -->

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


<script src="{{ asset('jquery.validate.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (app()->getLocale() == 'ar')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/localization/messages_ar.min.js"></script>
@else
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/localization/messages_en.min.js"></script>
@endif

@if (session()->has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: "{{ session()->get('success') }}"
        })
    </script>
@endif

@if (session()->has('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: "{{ session()->get('error') }}"
        })
    </script>
@endif

<script>
    AOS.init();
</script>
<script>
    @php
        $messages = [
            'phoneMessage' => __('الهاتف يجب ان يحتوي علي ارقام فقط'),
            'emailmessage' => __('الرجاء ادخال الايميل من نطاق (gmail, yahoo, hotmail, outlook)'),
            'phoneMinLengthMessage' => __('يجب ان لا يقل الهاتف عن 10 ارقام'),
            'phoneMaxLengthMessage' => __('يجب ان لا يزيد الهاتف عن 15 رقم'),
            'stringMessage' => __('يجب ان يحتوي علي حروف فقط'),
            'noSpecialChars' => __('لا يمكن استخدام الرموز الخاصة'),
        ];
    @endphp

    @foreach ($messages as $key => $message)
        window.{{ $key }} = "{{ $message }}";
    @endforeach
</script>

<script>
    $(document).ready(function() {
        $.validator.addMethod("noSpecialChars", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9\u0600-\u06FF ]*$/.test(value);
        }, window.noSpecialChars);
        $.validator.addMethod("domain", function(value, element) {
            // Allow emails from gmail.com, yahoo.com, hotmail.com, and outlook.com
            return this.optional(element) ||
                /^[\w.-]+@(gmail\.com|yahoo\.com|hotmail\.com|outlook\.com)$/.test(value);
        }, window.emailmessage);

        $.validator.addMethod("phone_type", function(value, element) {
            return this.optional(element) || /^[0-9+]+$/.test(value);
        }, window.phoneMessage);
        $.validator.addMethod('string', function(value, element) {
            return this.optional(element) || /^[\u0600-\u06FFa-zA-Z\s]+$/i.test(value);
        }, window.stringMessage);



        $.validator.addMethod("fullname", function(value, element) {
            var words = value.split(' ');
            return this.optional(element) || /^[\u0600-\u06FFa-zA-Z-' ]+$/.test(value) && words
                .length >= 4;
        }, window.fullname);


        $("#contact_form").validate({


            rules: {
                // Define validation rules for your form fields here
                name: {
                    required: true,
                    minlength: 2,
                    noSpecialChars: true,
                    string: true
                },

                email: {
                    required: true,
                    minlength: 3,
                    domain: true
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 15,
                },
                message: {
                    required: true,
                    minlength: 3,

                },


                // Add more fields as needed
            },

            messages: {

                phone: {
                    minlength: window.phoneMinLengthMessage,
                    maxlength: window.phoneMaxLengthMessage,
                }



            },



            errorElement: "span",
            errorLabelContainer: ".errorTxt",


            submitHandler: function(form) {
                $('.ctm-btn').prop('disabled', true);
                // Hide the button
                $('.ctm-btn').hide();


                // Add a spinner
                $('.ctm-btn').parent().append(
                    `<div class="spinner-border"  style="width: 3rem; height: 3rem;"   role="status">
                <span class="sr-only">Loading...</span>
                </div>
                    `
                );


                var formData = new FormData(form);
                let url = form.action;
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {

                        form.reset();
                        Swal.fire({
                            icon: 'success',
                            title: `<h5> ${data.success}</h5> `,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('.ctm-btn').prop('disabled', false);


                        // Show the button
                        $('.ctm-btn').show();

                        // Remove the spinner
                        $('.ctm-btn').next('.spinner-border').remove();

                    },
                    error: function(data) {
                        $('.ctm-btn').prop('disabled', false);

                        // Show the button
                        $('.ctm-btn').show();

                        // Remove the spinner
                        $('.ctm-btn').next('.spinner-border').remove();
                        $('.error-message').text('');
                        var errors = data.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            var errorMessage = messages.join(', ');
                            $('#' + field + '_error').text(
                                errorMessage);
                        });
                    },
                });

            },
        });




        $(".form_service").validate({


            rules: {
                // Define validation rules for your form fields here
                name: {
                    required: true,
                    minlength: 2,
                    noSpecialChars: true,
                    string: true
                },

                email: {
                    required: true,
                    minlength: 3,
                    domain: true
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 15,
                },
                message: {
                    required: true,
                    minlength: 3,

                },
                best_contact_method: {
                    required: true,
                },
                service_name: {
                    required: true,
                },
                whatsapp: {
                    required: true,
                    minlength: 10,
                    maxlength: 15,
                },


                // Add more fields as needed
            },

            messages: {

                phone: {
                    minlength: window.phoneMinLengthMessage,
                    maxlength: window.phoneMaxLengthMessage,
                }



            },



            errorElement: "span",
            errorLabelContainer: ".errorTxt",


            submitHandler: function(form) {
                $('.ctm-btn-services').prop('disabled', true);
                // Hide the button
                $('.ctm-btn-services').hide();


                // Add a spinner
                $('.ctm-btn-services').parent().append(
                        `<div class="spinner-border"  style="width: 3rem; height: 3rem;"   role="status">
                    <span class="sr-only">Loading...</span>
                    </div>
                    `
                );


                var formData = new FormData(form);
                let url = form.action;
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {

                        form.reset();
                        Swal.fire({
                            icon: 'success',
                            title: `<h5> ${data.success}</h5> `,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('.ctm-btn-services').prop('disabled', false);


                        // Show the button
                        $('.ctm-btn-services').show();

                        // Remove the spinner
                        $('.ctm-btn-services').next('.spinner-border').remove();

                    },
                    error: function(data) {
                        $('.ctm-btn-services').prop('disabled', false);

                        // Show the button
                        $('.ctm-btn-services').show();

                        // Remove the spinner
                        $('.ctm-btn-services').next('.spinner-border').remove();
                        $('.error-message').text('');
                        var errors = data.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            var errorMessage = messages.join(', ');
                            $('#' + field + '_error').text(
                                errorMessage);
                        });
                    },
                });

            },
        });

    });
</script>
<script>
    $(document).ready(function() {
$("#whatsappMain").click(function() {
    $("#whatsappOptions").toggle();
});
});
</script>
@stack('js')
