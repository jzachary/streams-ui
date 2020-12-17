{{-- <!-- Modernizer JS -->
{!! Assets::script('public::assets/js/vendor/modernizr.min.js') !!}
<!-- jQuery JS -->
{!! Assets::script('public::assets/js/vendor/jquery.js') !!}
<!-- Bootstrap JS -->
{!! Assets::script('public::assets/js/vendor/bootstrap.min.js') !!}
{!! Assets::script('public::assets/js/vendor/stellar.js') !!}
{!! Assets::script('public::assets/js/vendor/particles.js') !!}
{!! Assets::script('public::assets/js/vendor/masonry.js') !!}
{!! Assets::script('public::assets/js/vendor/stickysidebar.js') !!}
{!! Assets::script('public::assets/js/vendor/contactform.js') !!}
{!! Assets::script('public::assets/js/plugins/plugins.min.js') !!}
<!-- Main JS -->
{!! Assets::script('public::assets/js/main.js') !!} --}}

{{-- <script src="/vendor/anomaly/streams/ui/js/index.js"></script> --}}

<script src="/vendor/streams/core/js/index.js"></script>
<script src="/vendor/streams/ui/js/index.js"></script>

<script>
window.streams.core.app.bootstrap({
    providers: [
        window.streams.core.StreamsServiceProvider,
        window.streams.ui.UiServiceProvider
    ]
}).then(app => {
    return app.boot();
}).then(app => {
    return app.start();
});

</script>

<script>
// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if ( localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) ) {
    document.querySelector('html').classList.add('dark');
} else {
    document.querySelector('html').classList.remove('dark');
}
</script>
