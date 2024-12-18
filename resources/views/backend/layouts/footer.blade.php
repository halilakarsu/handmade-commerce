<!-- footer start-->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2025 © letyazilim.com Tüm Hakları Saklıdır.</p>
            </div>
            <div class="col-md-6">
                <p class="pull-right mb-0">halilakarsu tarafindan hazirlanmıştır.<i class="fa fa-heart"></i></p>
            </div>
        </div>
    </div>
</footer>
<!-- footer end-->
</div>

</div>

<!-- latest jquery-->
<!-- jquery vendor -->
@if(session()->has('success'))
    <script>alertify.success('{{session('success')}}')</script>
@endif
@if(session()->has('error'))
    <script>alertify.success('{{session('success')}}')</script>
@endif
@foreach($errors->all() as $error)
<script>
    alertify.error('{{$error}}');
</script>

@endforeach
<script src="/backend/assets/js/scripts.js"></script>

<!-- Bootstrap js-->
<script src="/backend/assets/js/popper.min.js"></script>
<script src="/backend/assets/js/bootstrap.js"></script>

<!-- feather icon js-->
<script src="/backend/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="/backend/assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- Sidebar jquery-->
<script src="/backend/assets/js/sidebar-menu.js"></script>

<!--chartist js-->
<script src="/backend/assets/js/chart/chartist/chartist.js"></script>


<!-- lazyload js-->
<script src="/backend/assets/js/lazysizes.min.js"></script>

<!--copycode js-->
<script src="/backend/assets/js/prism/prism.min.js"></script>
<script src="/backend/assets/js/clipboard/clipboard.min.js"></script>
<script src="/backend/assets/js/custom-card/custom-card.js"></script>

<!--counter js-->
<script src="/backend/assets/js/counter/jquery.waypoints.min.js"></script>
<script src="/backend/assets/js/counter/jquery.counterup.min.js"></script>
<script src="/backend/assets/js/counter/counter-custom.js"></script>

<!--Customizer admin-->
<script src="/backend/assets/js/admin-customizer.js"></script>

<!--map js-->
<script src="/backend/assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/backend/assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>

<!--apex chart js-->
<script src="/backend/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="/backend/assets/js/chart/apex-chart/stock-prices.js"></script>

<!--chartjs js-->
<script src="/backend/assets/js/chart/flot-chart/excanvas.js"></script>
<script src="/backend/assets/js/chart/flot-chart/jquery.flot.js"></script>
<script src="/backend/assets/js/chart/flot-chart/jquery.flot.time.js"></script>
<script src="/backend/assets/js/chart/flot-chart/jquery.flot.categories.js"></script>
<script src="/backend/assets/js/chart/flot-chart/jquery.flot.stack.js"></script>
<script src="/backend/assets/js/chart/flot-chart/jquery.flot.pie.js"></script>
<!--dashboard custom js-->
<script src="/backend/assets/js/dashboard/default.js"></script>
<script src="/backend/assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="/backend/assets/js/datatables/custom-basic.js"></script>
<!--right sidebar js-->
<script src="/backend/assets/js/chat-menu.js"></script>

<!--height equal js-->
<script src="/backend/assets/js/equal-height.js"></script>

<!-- lazyload js-->
<script src="/backend/assets/js/lazysizes.min.js"></script>

<!--script admin-->
<script src="/backend/assets/js/admin-script.js"></script>
@yield('js')
</body>
</html>
