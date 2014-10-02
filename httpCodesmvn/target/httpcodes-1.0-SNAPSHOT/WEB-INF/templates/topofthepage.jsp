          <%@ taglib prefix="spring" uri="http://www.springframework.org/tags"%>
          <head>
             <link href='<c:url value="../../resources/static/css/style.css"/>' rel="stylesheet">
             <title> fc572 </title>
          </head>

          <body id="backgroundColor">
            <div id="wrapper">
                <div id="marginTop" onclick="window.location.href='/'">

                <ul id="ulMenuHeader">
                    <li class="liMenuHeader"> <a href="<spring:url value="testpagelinkback"/>"> This links to a test page </a> </li>
                    <li class="liMenuHeader"> <a href="<spring:url value="comment/"/>"> This links to a test comment page</a> </li>
                    <li class="liMenuHeader"> <a href="<spring:url value="httpCodes/"/>">This links to a page where HTTP codes can be requested </a> </li>
                    <li class="liMenuHeader"> <a href="<spring:url value="/blog/pageOneBlog"/>"> Blog </a> </li>
                </ul>
            </div>

                <div id="rightColumn" class="box">
                    <p>
                        <a class="twitter-timeline" href="https://twitter.com/fc572" data-widget-id="390491452628668416">Tweets by @fc572</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
                        </script>
                    </p>
                </div>