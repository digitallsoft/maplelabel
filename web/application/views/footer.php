<footer>
      <div class="footer" id="footer">
            <div class="container">
                  <div class="row">
                        <div class="col-lg-3  col-md-3 col-xs-6">
                              <h3> Site Link</h3>
                              <ul>

                                    <li> <a href="#"> Privacy Policy </a> </li>
                                    <li> <a href="#"> Terms of Service </a> </li>
                                    <li> <a href="#"> Blog </a> </li>
                                    <li> <a href="#"> Tour </a> </li>
                                    <li> <a href="#"> Pricing & Signup </a> </li>
                              </ul>
                        </div>
                        <div class="col-lg-3  col-md-3  col-xs-6">
                              <h3> Support</h3>
                              <ul>

                                    <li> <a href="#"> FAQ </a> </li>
                                    <li> <a href="#"> Request a Feature </a> </li>
                                    <li> <a href="#"> Report a Bug </a> </li>
                                    <li> <a href="#"> Contact Us </a> </li>
                              </ul>
                        </div>
                        <div class="col-lg-3  col-md-3 col-xs-6">
                              <h3> New on the Blog </h3>
                              <ul>
                                    <li> <a href="#"> Using mail merge for packing slips</a> </li>
                                    <li> <a href="#"> The end of eBook delivery </a> </li>
                                    <li> <a href="#"> Alter Customer Address </a> </li>
                                    <li> <a href="#"> Powerful new email features </a> </li>
                                    <li> <a href="#"> The new list view in Scrobbld </a> </li>
                              </ul>
                        </div>
                        <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                              <h3> Community</h3>
                              <ul>
                                    <li> <a href="#"> Forums / Features </a> </li>
                                    <li> <a href="#"> Questions </a> </li>
                                    <li> <a href="#"> LScrobbld Blog </a> </li>
                                    <li> <a href="#"> Twitter </a> </li>
                                    <li> <a href="#"> Facebook </a> </li>
                              </ul>
                        </div>
                  </div>
                  <!--/.row--> 
            </div>
            <!--/.container--> 
      </div>
      <!--/.footer-->

      <div class="footer-bottom">
            <div class="container">
            <p class="pull-right"> OnLabels © 2017 All rights reserved. </p>

            </div>
      </div>
      <!--/.footer-bottom--> 
</footer>
<iframe frameborder="0" title="빈프레임" name="data-process" style="display:none;display:block\9;display:block\0/;position:absolute;top:-1px;left:-1px;z-index:-1;width:100%;height:100%;padding:1px;filter:alpha(opacity=0);opacity:0"></iframe>

<script>
function callShippingUpdate(callUrl, idname, iconidname) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	document.getElementById(idname).innerHTML =
	      this.responseText;
	if ( this.responseText.length < 5 ) document.getElementById(iconidname).style = "opacity:1.0";
    }
  };
  xhttp.open("GET", callUrl, true);
  xhttp.send();
}
</script>
