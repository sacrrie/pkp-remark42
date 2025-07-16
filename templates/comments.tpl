{*
 * templates/comments.tpl
 * Injects the Remark42 comment widget (standard version).
 *}
<div id="remark42"></div>

<script>
    var remark_config = {
        host: "{$remarkUrl|escape:'javascript'}",
        site_id: "{$remarkSiteId|escape:'javascript'}",
        url: window.location.origin + window.location.pathname,
        components: ['embed'], // Loads the core comment widget
        // You can add other configurations like theme here if you want
        // theme: 'dark',
    };

    (function(c) {
        for(var i = 0; i < c.length; i++){
            var d = document, s = d.createElement('script');
            s.src = remark_config.host + '/web/' + c[i] + '.js';
            s.defer = true;
            (d.head || d.body).appendChild(s);
        }
    })(remark_config.components || ['embed']);
</script>
