<footer>
  <div class="box-around">
    <div class="inside-box">
      <div class="row-1">
      </div>
    </div>
  </div>

<div class="under">
  <ul class="navigation-themes">
    <li><p>Themes:</p></li>
    <li><button onclick="cambiarOriginal()">Original</button></li>
    <li><button onclick="cambiarLightCoral()">Light Coral</button></li>
    <li><button onclick="cambiarLightSlateGrey()">Light Slate Grey</button></li>
  </ul>

  <div class="copyright">
    <p style="font-size: 11px; text-align: center; color: #ffffff; text-decoration: none;">Clock Buenos Aires Company ©2017</p>
  </div>
</div>

  <script type="text/javascript">
  var place =0;
       function cambiarLightCoral() {
           var colorList = ["#F08080"];
           document.getElementById('body').style.backgroundColor = colorList[place];
           place++;
           if (place ===colorList.length) place=0;
         }

       var place=0;
       function cambiarLightSlateGrey() {
         var colorList = ["#778899"];
         document.getElementById('body').style.backgroundColor = colorList[place];
         place++;
           if (place ==colorList.length) place=0;
       }

       var place=0;
       function cambiarOriginal() {
         var colorList = ["white"];
         document.getElementById('body').style.backgroundColor = colorList[place];
         place++;
           if (place ==colorList.length) place=0;
       }
  		</script>
    </footer>
