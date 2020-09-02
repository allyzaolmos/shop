@include('include.favicon')
@include('include.tempcss')
@include('include.topnav')

<div class="grey-light-bg clearfix">
    <!-- COTENT CONTAINER -->
    <div class="container white-bg plr-30 pt-30 pb-30 mt-80 mb-10 ">

        <div class="row mb-20">
            <div class="col-md-6">
                <div class="relative">

                    <div class="col-md-12" style="align-content: center;">
                        <div class="contact-form-cont" style="padding:40px;">
                            <!-- TITLE -->
                            <div class="mb-40">
                                <h2 class="bold" style="color: black">CREATE A <span style="color:rgb(57, 57, 199)"> NEW ACCOUNT</span> </h2>
                                <label>Create your own Shopping account.</label>
                            </div><br><br><br><br><br><br><br>


                            <div class="mb-40">
                                <h4 class="bold"> SIGN UP TODAY AND YOU'LL BE ABLE TO :</h4>
                                <label>Speed your way through the checkout.
                                </label><br>
                                <label>
                                    Track your orders easily.
                                </label><br>
                                <label>
                                    Keep a record of all your purchases.</label>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-6">
                <div class="relative">

                    <div class="col-md-12" style="align-content: center;">
                        <div class="contact-form-cont" style="padding:40px;">

                            <!-- CONTACT FORM -->
                            <div>
                                <form id="signup-form" autocomplete="off">

                                    <div class="row">
                                        <div class="col-md-12 mb-30">
                                            <label>* Full Name</label>
                                            <input type="text" name="name"
                                                data-msg-required="Please enter your Full Name" maxlength="100"
                                                class="form-control" id="name" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-30">
                                            <label>* Email Address</label>
                                            <input type="text" data-msg-required="Please enter your Email"
                                                maxlength="100" class="form-control" name="email" id="email" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-30">
                                            <label>* Contact No.</label>
                                            <input type="number" data-msg-required="Please enter your Contact Number"
                                                maxlength="100" class="form-control" name="contactno" id="contactno"
                                                required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-30">
                                            <label>* Password</label>
                                            <input type="password" data-msg-required="Please enter your password."
                                                maxlength="100" class="form-control" name="password" id="password"
                                                required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-30">
                                            <label>* Confirm Password</label>
                                            <input type="password" data-msg-required="The confirm your password."
                                                maxlength="100" class="form-control" name="con_password" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 text-center-xxs">
                                            <button type="button" id="btnsign" class="button medium gray"
                                                style="width: 100%;">
                                                <span class=""></span> <label class="btnsign_label">SIGN UP</label>
                                            </button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <div class="row div_success">
                <div class="col-md-12" style="align-content: center;">
                    <div class="row row-success">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <span aria-hidden="true" class="alert-icon icon_like"></span>
                                <span class="success_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>


    {{-- @section('embeddedjs') --}}
    <script type="text/javascript">
        var initializeControls = function() {
            $('.row-error').hide();
            $('.row-success').hide();
            $('.div_success').hide();
        }();

        var validateRequiredFields = function(f) {
            var stat = true;

            var pass = $('input[name="password"]').val();
            var cpassword = $('input[name="con_password"]').val();


            $('.row-error').hide();
            $('div.form-group').removeClass('has-error');
            $('div.fg-line').removeClass('has-error');
            $('input[required],textarea[required],select[required]', f).each(function() {

                if ($(this).is('select')) {
                    if ($(this).val() == 0 || $(this).val() == null) {
                        $('.error_msg').html($(this).data('msg-required'));
                        $('.row-error').fadeIn(400);
                        $(this).focus();
                        stat = false;
                        return false;
                    }
                } else {
                    if ($(this).val() == "") {
                        $('.error_msg').html($(this).data('msg-required'));
                        $('.row-error').fadeIn(400);
                        $(this).closest('.fg-line').addClass('has-error');
                        $(this).focus();
                        stat = false;
                        return false;
                    }
                    if (pass != cpassword) {
                        $('.error_msg').html('Your password and confirmation password do not match.');
                        $('.row-error').fadeIn(400);
                        $('#password').addClass('has-error');
                        $('#confpassword').addClass('has-error');
                        $('input[name="con_password"]').focus();
                        stat = false;
                        return false;
                    }


                }

            });

            return stat;
        };

        var CreateClient = (function() {
            var _data = $('#signup-form').serializeArray();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            return $.ajax({
                "dataType": "json",
                "type": "POST",
                "url": "{{ url('/users/create') }}",
                "data": _data
            });
        });

        $('#btnsign').click(function() {

            if (validateRequiredFields($('#signup-form'))) {

                $(this).toggleClass('disabled');
                $(this).find('span').toggleClass('fa fa-spinner fa-spin');
                $('.btnsign_label').html('Signing Up');

                CreateClient().done(function(response) {

                    if (response.stat == "success") {
                        $('.div_success').show();
                        $('.div_sign_up').hide();
                        $('.success_msg').html(response.msg);
                        $('.row-success').fadeIn(400);
                        setTimeout(function() {
                            window.location.href = "/login";
                        }, 1000);
                    }
                }).always(function() {
                    $(this).toggleClass('disabled');
                    $(this).find('span').toggleClass('fa fa-spinner fa-spin');
                });
            }

        });


        $('input').keypress(function(evt) {

            if (evt.keyCode == 13) {
                $('#btnsign').click();
            }

        });

    </script>
    {{-- @endsection --}}


    {{-- @include('include.tempjs') --}}
    @include('include.shopinfo')
    @include('include.footer')
