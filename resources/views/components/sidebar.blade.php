<aside class="col-md-4 blog-sidebar">

    @if ($sidebar_tip)
        <div class="p-3 mb-3 bg-light rounded">
            <p class="mb-0">
                <strong class="d-block">Tip</strong>
                {{ $sidebar_tip->description }}
            </p>
        </div>
    @endif

    <div class="tweets d-none d-md-block">
        <a class="twitter-timeline" href="https://twitter.com/BrandweerSSM" data-widget-id="421660290472628224">Tweets van @BrandweerSSM</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
</aside><!-- /.blog-sidebar -->
