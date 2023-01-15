<script type="text/javascript">window.$crisp = [];
    window.CRISP_WEBSITE_ID = "f4e233b9-d700-4450-b765-64c458ad96d4";
    (function () {
        d = document;
        s = d.createElement("script");
        s.src = "https://client.crisp.chat/l.js";
        s.async = 1;
        d.getElementsByTagName("head")[0].appendChild(s);
        @if(auth()->check())
        $crisp.push(["set", "user:email", "{{ auth()->user()->email }}"]);
        $crisp.push(["set", "user:name", "{{ auth()->user()->name }}"]);
        @endif
    })();</script>
