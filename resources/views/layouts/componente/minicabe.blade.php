<section class="leto">
  <div class="row">
    <span class="col-md-7">
       <ul class="baseul">
         <li>¿Desea Contactarnos? </li>
         <li class="phone"><i class="fa fa-fw fa-phone-square"></i><a href="tel:8095418233"> 809-541-8233</a></li>
         <li class="phone"><i class="fa fa-fw fa-phone-square"></i><a href="tel:8095407007"> 809-540-7007</a></li>
         <li class="mail"><i class="fa fa-envelope"></i><a href="{{ route('contactos') }}"> info@accapla.com</a></li>
      </ul>
    </span>
       <div class="col-md-3" style="display: flex; justify-content: center; height: 54px; ">
       <i class="fa fa-clock-o cloro" id="analogico"  aria-hidden="true" alt="digital" style="color: white; font-size: 2.5em; text-shadow: 1px 2px 3px black; cursor: pointer; "></i>
<section class="relogtop" >
 <article id="digital" class="widgetreg cloro" alt="analogico" style="display:none">
  <div class="reloj">
    <p id="horas" class="minu"></p>
    <p class="minu">:</p>
    <p id="minutos" class="minu"></p>
    <p class="minu">:</p>
    <div class="caja-segundos">
      <p id="ampm" class="ampm"></p>
      <p id="segundos" class="segundos" ></p>
    </div>
   <p id="diaSemana" class="diaSemana"></p>
     </div>
       <div class="fecha" style="display:none;">
          <div class="caja relogs">
             <p id="dia" class="dia"></p>
             <p id="mes" class="mes"></p>
             <p id="year" class="year"></p>
          </div>
        </div>
 </article>
</section>
       </div>
    <span class="col-md-2 derecha">
       <a target="_blank" href="https://www.facebook.com/accapla/" title="Facebook"><i class="fab fa-facebook-f"></i></a>
       <a target="_blank" href="https://www.instagram.com/caplard/" title="Instagram"><i class="fab fa-instagram"></i></a>
       <a target="_blank" href="#" title="signal"><i class="fa fa-fw fa-signal"></i></a>
    </span>

</div>
</section>
<script src="{{ asset('js/relog.js') }}"></script>
