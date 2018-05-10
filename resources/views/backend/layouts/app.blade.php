<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/backend.css')) }}

    @stack('after-styles')
</head>

<body class="{{ config('backend.body_classes') }}">
    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main">
            @include('includes.partials.logged-in-as')
            {!! Breadcrumbs::render() !!}

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div><!--content-header-->

                    @include('includes.partials.messages')
                    @yield('content')
                </div><!--animated-->
            </div><!--container-fluid-->
        </main><!--main-->

        @include('backend.includes.aside')
    </div><!--app-body-->

    @include('backend.includes.footer')

    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/backend.js')) !!}
            {{ style('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css') }}
            {{ script('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}
            {{ style("plugins/select2/css/select2.min.css") }}
            {{ style("plugins/select2/css/select2-bootstrap.min.css") }}
            {{ script('plugins/select2/js/select2.full.min.js') }}
            {{ style("plugins/magnific-popup/css/magnific-popup.css") }}
            {{ script('plugins/magnific-popup/js/jquery.magnific-popup.js') }}
            
            {{ script("plugins/fastclick/fastclick.js") }}
            {{ script("plugins/knob/jquery.knob.js") }}
            {{ script("plugins/sparkline/jquery.sparkline.min.js") }}
            {{ script('plugins/iCheck/icheck.min.js') }}
            {{ style("plugins/iCheck/all.css") }}

            {{ script('plugins/moment/js/moment.js') }}
            {{ script('plugins/datetimepicker/js/transition.js') }}
            {{ script('plugins/datetimepicker/js/collapse.js') }}
            {{ script('plugins/datetimepicker/js/bootstrap-datetimepicker.min.js') }}
            {{ style("plugins/datetimepicker/css/datetimepicker.css") }}
            
            {!!script('https://maps.googleapis.com/maps/api/js?key=AIzaSyDnO6j5gCeCun3j9SX--TnMMBn_34zbsHY&libraries=places')!!}


            <script>
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "positionClass": "toast-bottom-right",
                  "preventDuplicates": true,
                  "showDuration": "1000",
                  "hideDuration": "5000",
                  "timeOut": "10000",
                  "extendedTimeOut": "7000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
            </script>



            <script>
                $('#fecha').datetimepicker({
                        format: 'YYYY-MM-DD',
                        widgetPositioning: {
                            horizontal: 'auto',
                            vertical: 'auto'
                        }
                    });

                $('#hora').datetimepicker({
                        format: 'HH:ss',
                        widgetPositioning: {
                            horizontal: 'auto',
                            vertical: 'auto'
                        }
                    });


                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
                //Squared color scheme for iCheck
                $('input[type="checkbox"].square-red, input[type="radio"].square-red').iCheck({
                    checkboxClass: 'icheckbox_square-red',
                    radioClass: 'iradio_square-red'
                });
                
                $('select').select2();

                $(".knob").knob({
                  
                    draw: function () {

                        // "tron" case
                        if (this.$.data('skin') == 'tron') {

                            var a = this.angle(this.cv)  // Angle
                            , sa = this.startAngle          // Previous start angle
                            , sat = this.startAngle         // Start angle
                            , ea                            // Previous end angle
                            , eat = sat + a                 // End angle
                            , r = true;

                            this.g.lineWidth = this.lineWidth;

                            this.o.cursor
                            && (sat = eat - 0.3)
                            && (eat = eat + 0.3);

                            if (this.o.displayPrevious) {
                                ea = this.startAngle + this.angle(this.value);
                                this.o.cursor
                                && (sa = ea - 0.3)
                                && (ea = ea + 0.3);
                                this.g.beginPath();
                                this.g.strokeStyle = this.previousColor;
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                                this.g.stroke();
                            }

                            this.g.beginPath();
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                            this.g.stroke();

                            this.g.lineWidth = 2;
                            this.g.beginPath();
                            this.g.strokeStyle = this.o.fgColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                            this.g.stroke();

                            return false;
                        }
                    }
                });
            </script>
    @stack('after-scripts')
</body>
</html>
