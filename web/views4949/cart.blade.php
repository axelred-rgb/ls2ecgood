@extends('layout')
@section('content')

<!-- Event snippet for Ajout au panier * Le client a cliqué sur une offre conversion page -->
    <script>
        gtag('event', 'conversion', {'send_to': 'AW-332951563/Y2V4CNKbsOEDEIvg4Z4B'});
    </script>
    <script src="https://cdn.cinetpay.com/seamless/main.js" type="text/javascript"></script>

<style>
    .sdk {
        display: block;
        position: absolute;
        background-position: center;
        text-align: center;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<script>

</script>

    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white">@tt("Checkout")</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page content -->

    <section class="py-50">
        <div class="container">
            <div class="row">


                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">@tt("Product Summary")</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>@tt("Target")</th>
                                        <th>@tt("Plan")</th>
                                        <th>@tt("Unit price")</th>
                                        <th hidden>@tt("Period")</th>
                                        <th>@tt("Code promo")</th>
                                        <th>@tt("Price")</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @if($subscription->getTarget()=="i")
                                            <td>@tt("Individuals")</td>
                                        @else
                                            <td>@tt("Enterprise")</td>
                                        @endif
                                        <td>{{$subscription->getName()}}</td>
                                        <td>
                                            @if(App::$user->getId())
                                                {{$subscription->getM_price('check')}}€  - {{$subscription->getMonth()}} @tt("Month")
                                            @else
                                                {{--												<label style="font-size: 16px; font-weight: bold" for="">@tt('Europe-Amerique-Asie')</label>--}}

                                                {{$subscription->getM_price('check')}}€ - {{$subscription->getMonth()}} @tt("Month")

                                                {{--												<hr>--}}
                                                {{--												<label style="font-size: 16px; font-weight: bold" for="">@tt('Afrique')</label>--}}
                                                {{--												<label for="">{{$subscription->getY_a_price()}}  € / @tt("Years")</label><br>--}}
                                                {{--												<label for="">{{$subscription->getM_a_price()}}  € / @tt("Months")</label>--}}
                                            @endif
                                        </td>
                                        @if($subscription->getTarget()=="i")

                                            <td hidden>
                                                <?php $a = '12'.tt("mounths")?>
                                                <label for="">@tt("Nombre de mois")</label>
                                                <input type="number" min="1" id="qte" value="{{$subscription->getMonth()}}" style="border-color:#0b8e36" class="form-control">
                                            </td>
                                        @else
                                            <td><?php $a = '5'.tt("days")?> {{$a}}</td>
                                        @endif
                                        <td>
                                            <div class="form-group">
                                                <input type="text" id="codepromo" style="border-color:#0b8e36" class="form-control">
                                                <div id="errorcode"></div>
                                                @if(!App::$user->getId())
                                                    <button onclick="location.href='{{route('login')}}';" type="button" class="btn btn-info w-p100 mt-15">@tt("Login to apply promo code")</button>
                                                @else
                                                    <button onclick="checkCode(this)" class="btn btn-primary mt-2">@tt('Appliquer le code promo')</button>
                                                @endif
                                            </div>

                                        </td>
                                        <td id="price">
                                            0 €
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="4" class="text-end">@tt("Total HT")</th>
                                        <th id="pricetotal">
                                            0 €
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-end">@tt("TVA") (20%)</th>
                                        <th id="pricetva">
                                            0 €
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-end">@tt("Total TTC")</th>
                                        <th id="pricetotalttc">
                                            0 €
                                        </th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                            @if(App::$user->getId())
                                <?php $c_subscription = User_subscription::where("this.user_id", App::$user->getId())->andwhere('this.subscription_id',$subscription->getId())->count() ?>

                                @if($c_subscription == 0)

                                    <div class="row">
                                    <div class="col-12" style="max-height: 220px; overflow-y: scroll; border:3px solid #0b8e36">
                                        <div class="WordSection1">
                                            <div style="border:solid windowtext 1.0pt; padding:1.0pt 4.0pt 1.0pt 4.0pt">
                                                <p style="text-align:center">&nbsp;</p>

                                                <p style="text-align:center"><span style="background-color:#f2f2f2"><span style="font-size:11pt"><span style="background-color:#f2f2f2"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">CONDITIONS GENERALES DE VENTE ET D&rsquo;UTILISATION DE LA PLATEFORME DE FORMATION</span></span></strong></span></span></span></span></p>

                                                <p style="text-align:center">&nbsp;</p>
                                            </div>

                                            <p>&nbsp;</p>
                                        </div>

                                        <p>&nbsp;</p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108106093">ARTICLE 1. MENTIONS LEGALES</a></strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">La soci&eacute;t&eacute; LS2EC TRAINING est une soci&eacute;t&eacute; par actions simplifi&eacute;e &agrave; associ&eacute; unique immatricul&eacute;e au RCS de PONTOISE sous le num&eacute;ro 900&nbsp;286 477 et ayant son si&egrave;ge social sis 15 rue de Vienne &ndash; 95380 LOUVRES.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">La soci&eacute;t&eacute; LS2EC TRAINING a pour&nbsp;:</span></span></span></span></p>

                                        <ul>
                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Courrier &eacute;lectronique&nbsp;: cm.biyihamang@ls2ec.com,</span></span></span></span></li>
                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">et num&eacute;ro de t&eacute;l&eacute;phone&nbsp;: 06.51.95.76.24. </span></span></span></span></li>
                                        </ul>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Vous pouvez contacter la soci&eacute;t&eacute; LS2EC TRAINING aux horaires suivants&nbsp;: du lundi au vendredi de 9h00 &agrave; 12h00 et de 14h00 &agrave; 16h00.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">La soci&eacute;t&eacute; LS2EC TRAINING a pour activit&eacute; la formation via le site ls2ec.com/fr (ci-apr&egrave;s d&eacute;nomm&eacute; &laquo;&nbsp;le Site&nbsp;&raquo;).</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le site est la propri&eacute;t&eacute; et est &eacute;dit&eacute; par LS2EC TRAINING. Le Directeur de la publication est Monsieur Claude Marcel BIYIHA MANG.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">L&rsquo;h&eacute;bergeur du site internet est Planethoster dont l&rsquo;adresse est &nbsp;4416 Rue Louis-B.-Mayer, Laval, QC H7P 0G1, Canada et qui a pour <a href="https://www.google.com/search?rlz=1C1VDKB_frFR937FR937&amp;tbs=lf:1,lf_ui:14&amp;tbm=lcl&amp;sxsrf=ALiCzsYfMvyXFQLxZl6YA4Ti1xfnN7M_yw:1660846629807&amp;q=hebergeur+planethoster+adresse&amp;rflfq=1&amp;num=10&amp;sa=X&amp;ved=2ahUKEwiBhpXr_9D5AhUT-4UKHTezDQ0QjGp6BAgDEEg&amp;biw=1536&amp;bih=746&amp;dpr=1.25" style="color:#0563c1; text-decoration:underline">+1 855-774-4678</a></span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108106094">ARTICLE 2. PRINCIPES GENERAUX</a></strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">2.1</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Les pr&eacute;sentes conditions g&eacute;n&eacute;rales de vente (ci-apr&egrave;s les &laquo; Conditions G&eacute;n&eacute;rales de Vente &raquo;) ont pour objet de d&eacute;finir les modalit&eacute;s de vente en ligne conclues entre la soci&eacute;t&eacute; LS2EC TRAINING (&laquo;&nbsp;LS2EC TRAINING&nbsp;&raquo;) et tout consommateur effectuant un achat via le site afin de suivre une formation (&laquo;&nbsp;Le Client&nbsp;&raquo;). </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les pr&eacute;sentes conditions g&eacute;n&eacute;rales ont notamment pour objet de d&eacute;finir les droits et obligations des parties dans le cadre de la concession d&rsquo;un droit d&rsquo;utilisation annuel d&rsquo;un ou plusieurs modules de formation en ligne (e-learning) sur le Site.</span></span>&nbsp;</span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">2.2</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Les pr&eacute;sentes conditions g&eacute;n&eacute;rales sont r&eacute;dig&eacute;es en fran&ccedil;ais dans leur version originale qui seule fait foi et pr&eacute;vaut sur toute autre version.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le Client d&eacute;clare avoir pris connaissance des pr&eacute;sentes Conditions G&eacute;n&eacute;rales de Vente avant de passer commande et les avoir accept&eacute;es avant la passation de sa commande.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Lors de l&#39;ouverture d&#39;un Compte Client, le fait de cliquer sur le bouton &laquo; <em>J&#39;accepte les conditions g&eacute;n&eacute;rales de vente</em> &raquo; manifeste le consentement du Client &agrave; l&#39;application des pr&eacute;sentes conditions g&eacute;n&eacute;rales de vente. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Une version imprim&eacute;e des Conditions G&eacute;n&eacute;rales de Vente ainsi que toute information adress&eacute;e par voie &eacute;lectronique seront admises dans toute proc&eacute;dure judiciaire concernant l&#39;application des pr&eacute;sentes Conditions G&eacute;n&eacute;rales de Vente de la m&ecirc;me mani&egrave;re et dans les m&ecirc;mes conditions que n&#39;importe quel autre document &eacute;crit et conserv&eacute; en format papier.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les pr&eacute;sentes Conditions G&eacute;n&eacute;rales de Vente s&#39;appliquent &agrave; l&#39;exclusion de toutes autres conditions. Elles sont accessibles par le Client sur le Site &agrave; tout moment et elles sont syst&eacute;matiquement soumises au Client avant toute commande et au moment de l&#39;enregistrement de la commande.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Ces Conditions G&eacute;n&eacute;rales de Vente pouvant faire l&#39;objet de modifications ult&eacute;rieures, la version applicable &agrave; la commande du Client est celle en vigueur &agrave; la date de la passation de la commande.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">La passation de la commande par le Client vaut acceptation sans restriction ni r&eacute;serve des pr&eacute;sentes Conditions G&eacute;n&eacute;rales de Vente.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">2.3</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Le fait de ne pas exercer, &agrave; un moment quelconque, une pr&eacute;rogative reconnue par les pr&eacute;sentes Conditions G&eacute;n&eacute;rales de Vente, ou de ne pas exiger l&#39;application d&#39;une stipulation quelconque de la convention issue desdites Conditions G&eacute;n&eacute;rales de Vente ne pourra en aucun cas &ecirc;tre interpr&eacute;t&eacute;, ni comme une modification du contrat, ni comme une renonciation expresse ou tacite au droit d&#39;exercer ladite pr&eacute;rogative dans l&#39;avenir, ou au droit d&#39;exiger l&#39;ex&eacute;cution scrupuleuse des engagements souscrits aux pr&eacute;sentes.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">2.4</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Dans l&#39;hypoth&egrave;se o&ugrave; l&#39;un quelconque des termes des Conditions G&eacute;n&eacute;rales de Vente serait consid&eacute;r&eacute; comme ill&eacute;gal ou inopposable par une d&eacute;cision de justice, les autres dispositions resteront en vigueur.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">2.5</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Sauf d&eacute;rogation formelle et expresse de LS2EC TRAINING, ces conditions pr&eacute;valent sur tout autre document du Client, et notamment sur toutes conditions g&eacute;n&eacute;rales d&#39;achat.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les CGV peuvent, le cas &eacute;ch&eacute;ant, &ecirc;tre compl&eacute;t&eacute;es par des conditions particuli&egrave;res rattach&eacute;es &agrave; une offre sp&eacute;cifique commercialis&eacute;e par LS2EC TRAINING.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108106095">ARTICLE 3. MAJORITE LEGALE ET CAPACITE</a></strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le Client d&eacute;clare &ecirc;tre juridiquement capable de conclure le pr&eacute;sent Contrat, dont les Conditions G&eacute;n&eacute;rales de Vente sont pr&eacute;sent&eacute;es ci-apr&egrave;s, c&#39;est-&agrave;-dire avoir la majorit&eacute; l&eacute;gale et ne pas &ecirc;tre sous tutelle ou curatelle.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108106096">ARTICLE 4.</a> OFFRE ET CHOIX DU FORMATEUR</strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">4.1</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Les Formations propos&eacute;es par LS2EC TRAINING sont consultables en ligne sur son site internet&nbsp;: https://ls2ec.com/.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">4.2</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Les formations en ligne se pr&eacute;sentent sous de modules &laquo; e-learning&nbsp;&raquo; et permettent de former le Participant &agrave; partir de plateformes et de ressources p&eacute;dagogiques digitales consultables sur un espace p&eacute;dagogique d&eacute;di&eacute;.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">4.3</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> LS2EC TRAINING est libre d&rsquo;utiliser les m&eacute;thodes et outils p&eacute;dagogiques de<strong> </strong>son choix. Il est rappel&eacute; que la forme et le contenu des outils<strong> </strong>p&eacute;dagogiques sont d&eacute;termin&eacute;s par LS2EC TRAINING.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108106098"></a><a name="_Toc108191973">ARTICLE 5. MODALITES D&rsquo;INSCRIPTION</a> ET COMPTE CLIENT</strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">5.1</span></span></span></strong> <span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">Afin de passer commande en ligne sur le Site, il est n&eacute;cessaire de cr&eacute;er un Compte Client.</span></span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">Pour la cr&eacute;ation de son compte, il sera demand&eacute; au Client d&#39;indiquer&nbsp;:<span style=" "> nom, pr&eacute;nom, adresse &eacute;lectronique, num&eacute;ro de t&eacute;l&eacute;phone, &laquo;&nbsp;nom d&rsquo;usage&nbsp;&raquo;, &laquo;&nbsp;username&nbsp;&raquo; et pays d&rsquo;origine.</span></span></span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">L&rsquo;inscription du Client doit &ecirc;tre effectu&eacute;e exclusivement &agrave; partir d&rsquo;un formulaire d&rsquo;inscription sp&eacute;cifique disponible en ligne sur le site Internet </span></span><a href="https://ls2ec.com/fr" style="color:#0563c1; text-decoration:underline"><span style="font-size:10.0pt">https://ls2ec.com/fr</span></a><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le Client s&rsquo;engage &agrave; fournir &agrave; LS2EC TRAINING des donn&eacute;es exactes, &agrave; jour, compl&egrave;tes et &agrave; en pr&eacute;server l&#39;exactitude. </span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le Client s&#39;engage &agrave; ne pas cr&eacute;er de compte sous une fausse identit&eacute;. Il appartient au Client de mettre &agrave; jour les donn&eacute;es le concernant.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">5.2</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> &Agrave; l&#39;issue de la cr&eacute;ation de son Compte Client, un e-mail de confirmation est envoy&eacute; au Client sur l&#39;adresse qu&#39;il aura pr&eacute;alablement renseign&eacute;e.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le Client est invit&eacute; &agrave; cliquer sur un lien pour activer son compte.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">5.3</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> L&#39;acc&egrave;s au Compte Client est prot&eacute;g&eacute; par un mot de passe personnel et confidentiel. Le Client s&#39;engage &agrave; le conserver secret et &agrave; ne le communiquer &agrave; des tiers &agrave; quelque titre que ce soit. Le Client est responsable de son mot de passe. </span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Si le Client s&#39;aper&ccedil;oit que son compte fait l&#39;objet d&#39;une utilisation frauduleuse, le Client s&#39;engage &agrave; le signaler imm&eacute;diatement &agrave; LS2EC TRAINING.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">5.4</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> La commande n&rsquo;est effective qu&rsquo;apr&egrave;s validation du paiement en ligne.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">Il est pr&eacute;cis&eacute; que&nbsp;TOUTE COMMANDE EFFECTU&Eacute;E SUR LE SITE EST UNE COMMANDE AVEC OBLIGATION DE PAIEMENT.</span></span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">Toute commande vaut acceptation de la description des Produits et des prix en vigueur au jour de la commande.</span></span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">5.5</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> La commande ne sera d&eacute;finitivement enregistr&eacute;e qu&#39;&agrave; la derni&egrave;re validation de l&#39;&eacute;cran r&eacute;capitulatif de la commande.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Cette action est assimil&eacute;e &agrave; la signature manuscrite vis&eacute;e &agrave; l&#39;article 1367 du code civil et &agrave; la conclusion d&#39;un contrat sous forme &eacute;lectronique au sens des articles 1127-1 et 1127-2 du code civil fran&ccedil;ais. </span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">&Agrave; compter de cette action :</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">&mdash; le Client confirme sa commande et d&eacute;clare accepter celle-ci, ainsi que l&#39;int&eacute;gralit&eacute; des pr&eacute;sentes Conditions G&eacute;n&eacute;rales de Vente pleinement et sans r&eacute;serve ; et</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">&mdash; la commande est consid&eacute;r&eacute;e comme irr&eacute;vocable et ne peut &ecirc;tre remise en cause que dans les cas limitativement pr&eacute;vus dans les pr&eacute;sentes.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">D&egrave;s l&#39;enregistrement de sa commande par le Client, un accus&eacute; de r&eacute;ception d&eacute;taill&eacute; de celle-ci lui est envoy&eacute; &agrave; son adresse e-mail qu&#39;il aura pr&eacute;alablement renseign&eacute;e. </span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Cet accus&eacute; de r&eacute;ception pr&eacute;cise le montant exact factur&eacute;, l&#39;indication des produits command&eacute;s et leur quantit&eacute;, les modalit&eacute;s de livraison de la commande et renvoie aux pr&eacute;sentes Conditions G&eacute;n&eacute;rales de Vente.</span></span></span></span></p>

                                        <p>&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">Cet accus&eacute; de r&eacute;ception vaut acceptation de la commande par LS2EC TRAINING et validera la transaction. Le Client accepte que les syst&egrave;mes d&#39;enregistrement de la commande valent preuve de l&#39;achat et de sa date. En conservant cet email, le Client d&eacute;tient une preuve de sa commande que LS2EC TRAINING lui recommande de conserver.</span></span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-size:10.0pt"><span style=" "><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">5.6.</span></span></span></span></strong><span style="font-size:10.0pt"><span style=" "><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black"> Le Client peut de plein droit, et &agrave; tout moment, se d&eacute;sinscrire du Site internet en cliquant sur l&rsquo;onglet &laquo;&nbsp;d&eacute;sinscription&nbsp;&raquo; et en suivant la proc&eacute;dure pr&eacute;vue &agrave; cet effet. </span></span></span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:10.0pt"><span style=" "><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">Cette d&eacute;sinscription est effective d&egrave;s la notification re&ccedil;ue. </span></span></span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:10.0pt"><span style=" "><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">La d&eacute;sinscription du Site internet ne pourra donner lieu &agrave; aucun remboursement.</span></span></span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">5.7</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Les inscriptions et ventes des Modules de formation sont strictement personnelles. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le Client s&rsquo;interdit de transf&eacute;rer son inscription, de c&eacute;der ou de mettre &agrave; disposition des Modules de formation, &agrave; quelque titre que ce soit, au profit d&rsquo;un tiers.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong>ARTICLE 6&nbsp;: SECURITE DES IDENTIFIANTS DE CONNEXION </strong></span></span></h1>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">6.1</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> L&rsquo;identifiant de connexion et le mot de passe sont confidentiels et r&eacute;serv&eacute;s &agrave; un usage personnel, &agrave; l&rsquo;exclusion de tout usage qui en serait fait par des tiers. </span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le Client s&rsquo;engage &agrave; pr&eacute;server la confidentialit&eacute; de son identifiant de connexion et de son mot de passe et en aucun cas &agrave; ne les transmettre &agrave; des tiers.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">6.2</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> En cas d&#39;utilisation non autoris&eacute;e des donn&eacute;es de connexion par un tiers et, plus g&eacute;n&eacute;ralement, de toute atteinte &agrave; la confidentialit&eacute; et &agrave; la s&eacute;curit&eacute; des moyens d&#39;identification et de toute utilisation non autoris&eacute;e des identifiants ou des moyens de paiement, le Client est responsable de toute cons&eacute;quence dommageable li&eacute;e &agrave; cette utilisation, et s&rsquo;engage &agrave; informer imm&eacute;diatement LS2EC TRAINING. </span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style=" "><span style="font-family:&quot;Verdana&quot;,sans-serif">6.3</span></span></span></strong><span style="font-size:10.0pt"><span style=" "><span style="font-family:&quot;Verdana&quot;,sans-serif"> En cas d&rsquo;oubli du mot de passe, le Client dispose d&rsquo;un lien d&eacute;di&eacute; &laquo;&nbsp;<em>mot de passe oubli&eacute;&nbsp;?</em>&nbsp;&raquo;. </span></span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style=" "><span style="font-family:&quot;Verdana&quot;,sans-serif">Le Client devra renseigner son adresse mail et soumettre une demande.</span></span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong>ARTICLE 7&nbsp;: ACCESSIBILITE DU SITE INTERNET ET DES MODULES DE FORMATION</strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">7.1</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> LS2EC TRAINING s&rsquo;engage &agrave; permettre l&rsquo;acc&egrave;s au site Formation 7 jours sur 7 et 24 heures sur 24 sous r&eacute;serve des p&eacute;riodes de maintenance, des pannes &eacute;ventuelles, des contraintes techniques li&eacute;es aux sp&eacute;cificit&eacute;s d&rsquo;Internet et des conditions des pr&eacute;sentes. </span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">En cas de d&eacute;couverte d&rsquo;un dysfonctionnement technique, le Client s&rsquo;engage &agrave; informer LS2EC TRAINING dans un d&eacute;lai de 24 heures &agrave; compter de ladite d&eacute;couverte. </span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">7.2</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Les Modules de formation peuvent seulement faire l&rsquo;objet d&rsquo;un visionnage en mode streaming. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">L&rsquo;acc&egrave;s n&eacute;cessite une connexion internet aux frais du Client qui en fait son affaire.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Dans l&rsquo;hypoth&egrave;se o&ugrave; le Client rencontrerait des probl&egrave;mes techniques pour le visionnage des Modules de formation, le Client pourra prendre contact avec LS2EC TRAINING aux coordonn&eacute;es pr&eacute;cis&eacute;es &agrave; l&rsquo;article 1 des pr&eacute;sentes. </span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">LS2EC TRAINING ne pourra &ecirc;tre tenu responsable d&rsquo;un quelconque dommage, de quelque nature que ce soit, notamment une perte d&rsquo;exploitation, une perte de donn&eacute;es ou une perte financi&egrave;re, r&eacute;sultant des difficult&eacute;s de connexion ou d&rsquo;utilisation du site Internet, m&ecirc;me en cas d&rsquo;impossibilit&eacute; d&rsquo;acc&eacute;der aux Modules de formation et supports &eacute;crits de formation.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">En outre, aucune assistance technique procur&eacute;e par LS2EC TRAINING dans l&rsquo;utilisation des Modules de formation et du site Internet ne peut cr&eacute;er de garantie suppl&eacute;mentaire par rapport aux pr&eacute;sentes conditions g&eacute;n&eacute;rales de vente.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">7.3</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> LS2EC TRAINING peut &agrave; tout moment modifier les contenus des Modules de formation et des supports &eacute;crits de formation dans le cadre d&rsquo;une d&eacute;marche de r&eacute;actualisation et d&rsquo;am&eacute;lioration &agrave; des fins p&eacute;dagogiques.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">7.4</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Le Client est seul responsable de l&rsquo;utilisation et de l&rsquo;interpr&eacute;tation des Modules de formation.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108191974">ARTICLE 8&nbsp;: </a>COMPORTEMENT PROHIBES</strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le site internet LS2EC TRAINING propose des formations en ligne.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Toute utilisation du site internet &agrave; d&rsquo;autres fins est prohib&eacute;e.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les comportements suivants sont strictement prohib&eacute;s et peuvent donner lieu &agrave; toute action afin de r&eacute;parer les &eacute;ventuels dommages caus&eacute;s, y compris la r&eacute;siliation de toute convention :</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <ul>
                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">tous comportements de nature &agrave; interrompre, suspendre, ralentir ou emp&ecirc;cher l&rsquo;acc&egrave;s au Site,</span></span></span></span></li>
                                        </ul>

                                        <p style="margin-left:48px; text-align:justify">&nbsp;</p>

                                        <ul>
                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">toutes intrusions ou tentatives d&rsquo;intrusions dans les syst&egrave;mes de LS2EC TRAINING,</span></span></span></span></li>
                                        </ul>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <ul>
                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">tous d&eacute;tournements des ressources syst&egrave;me du Site,</span></span></span></span></li>
                                        </ul>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <ul>
                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">toutes actions de nature &agrave; imposer une charge disproportionn&eacute;e sur les infrastructures de LS2EC TRAINING,</span></span></span></span></li>
                                        </ul>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <ul>
                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">toutes atteintes aux mesures de s&eacute;curit&eacute; et d&rsquo;authentification,</span></span></span></span></li>
                                        </ul>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <ul>
                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">tous actes de nature &agrave; porter atteinte aux droits et int&eacute;r&ecirc;ts financiers, commerciaux ou moraux et &agrave; ceux des usagers du Site.</span></span></span></span></li>
                                        </ul>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong>ARTICLE 9. <a name="_Toc108106100"></a><a name="_Toc108191976"></a>MODALITES FINANCIERES ET DE PRISE EN CHARGE PAR DES ORGANISMES TIERS</strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.1 Modalit&eacute;s financi&egrave;res</span></span></strong></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.1.1</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Les prix sont indiqu&eacute;s en euros hors taxes, auxquels est appliqu&eacute; le taux de TVA en vigueur. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les commandes sur le site sont des commandes avec obligation de paiement.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les prix pratiqu&eacute;s sont fonction de l&rsquo;abonnement choisi par le Client. LS2EC TRAINING se r&eacute;serve le droit de modifier son prix &agrave; tout moment. Toutefois, la facturation sera effectu&eacute;e sur la base des tarifs en vigueur au moment de l&rsquo;enregistrement de la commande.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.1.2</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Le prix des Formations en ligne n&rsquo;inclut pas le co&ucirc;t de la connexion &agrave; Internet qui demeure &agrave; la charge du Client.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong>9.2. Paiement</strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.2.1</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Constitue un paiement au sens du pr&eacute;sent article la mise effective des fonds &agrave; la disposition de la soci&eacute;t&eacute; LS2EC TRAINING.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.2.2</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Le prix est payable comptant, en totalit&eacute; au jour de l&#39;achat imm&eacute;diat ou de la passation de la commande par le Client.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.2.3</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Les factures sont payables en euros &agrave; l&rsquo;&eacute;tablissement de la soci&eacute;t&eacute; LS2EC TRAINING tel que vis&eacute; &agrave; l&rsquo;article 1.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.2.4</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Le paiement s&#39;effectue en ligne &agrave; la commande par carte bancaire ou par <em>Compte Paypal.</em></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="background-color:white"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">Dans tous ces cas, la commande sera trait&eacute;e &agrave; r&eacute;ception du paiement et sous r&eacute;serve de son encaissement.</span></span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="background-color:white"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">Les paiements effectu&eacute;s par le Client ne seront consid&eacute;r&eacute;s comme d&eacute;finitifs qu&#39;apr&egrave;s encaissement effectif des sommes dues par la soci&eacute;t&eacute; LS2ZC TRAINING.</span></span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="background-color:white"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"><span style="color:black">En cas de refus de la banque, la commande sera automatiquement annul&eacute;e.</span></span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Afin d&#39;optimiser la s&eacute;curit&eacute; des transactions sur Internet, le Site utilise un syst&egrave;me de paiement en ligne SSL (Secure Socket Layer) de telle sorte que tous les moyens sont mis en &oelig;uvre pour assurer la confidentialit&eacute; et la s&eacute;curit&eacute; des donn&eacute;es transmises, dans le cadre d&#39;un paiement en ligne.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le syst&egrave;me de paiement en ligne contr&ocirc;le automatiquement la validit&eacute; des droits d&#39;acc&egrave;s lors du paiement par carte bancaire et crypte tous les &eacute;changes afin d&#39;en garantir la confidentialit&eacute;.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Pour b&eacute;n&eacute;ficier du mode de paiement s&eacute;curis&eacute; SSL, le Client doit imp&eacute;rativement utiliser des navigateurs compatibles avec le syst&egrave;me SSL.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.3 D&eacute;faut de paiement</span></span></strong></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.3.1</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> En cas de retard de paiement, des p&eacute;nalit&eacute;s &eacute;gales &agrave; trois (3) fois le taux de l&#39;int&eacute;r&ecirc;t l&eacute;gal en vigueur &agrave; la date de la commande, ainsi qu&rsquo;une indemnit&eacute; forfaitaire pour frais de recouvrement d&rsquo;un montant de quarante (40) Euros seront exigibles de plein droit sans mise en demeure pr&eacute;alable. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.3.2</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> LS2EC TRAINING se r&eacute;serve le droit de refuser toute nouvelle commande et de suspendre l&rsquo;ex&eacute;cution de ses propres obligations et ce, jusqu&rsquo;&agrave; apurement du compte, sans engager sa responsabilit&eacute; ou que le Client puisse pr&eacute;tendre b&eacute;n&eacute;ficier d&rsquo;un avoir ou d&rsquo;un &eacute;ventuel remboursement. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.3.3</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> En outre tout r&egrave;glement ult&eacute;rieur quelle qu&#39;en soit la cause sera imput&eacute; imm&eacute;diatement et par priorit&eacute; &agrave; l&#39;extinction de la plus ancienne des dettes.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.4 Modalit&eacute;s de prise en charge par des organismes tiers </span></span></strong></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.4.1</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> En cas de prise en charge, totale et/ou partielle d&rsquo;une Formation par un organisme tiers, il appartient au Client ou le cas &eacute;ch&eacute;ant &agrave; la personne physique b&eacute;n&eacute;ficiaire de la Formation (i) d&rsquo;entreprendre une demande de prise en charge avant le d&eacute;but de la Formation et de s&rsquo;assurer de la bonne fin de cette demande ; (ii) de l&rsquo;indiquer explicitement &agrave; LS2EC TRAINING ; (iii) de s&rsquo;assurer de la bonne fin du paiement par l&rsquo;organisme qu&rsquo;il aura d&eacute;sign&eacute;.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">En cas de subrogation de paiement par un organisme tiers, LS2EC TRAINING proc&egrave;dera &agrave; l&rsquo;envoi de la facture aux organismes concern&eacute;s. En cas de prise en charge partielle de l&rsquo;organisme tiers, le reliquat sera factur&eacute; directement au Client.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">9.4.2</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Dans le cas o&ugrave; (i) l&rsquo;organisme tiers ne confirment pas la prise en charge financi&egrave;re de la Formation et/ou (ii) que LS2EC TRAINING n&rsquo;a pas re&ccedil;u la prise en charge desdits organismes au premier jour de la Formation, le co&ucirc;t de la Formation sera support&eacute; par le Client, lequel sera redevable de l&rsquo;int&eacute;gralit&eacute; du prix de la Formation.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong>ARTICLE 10. DROIT DE RETRACTATION</strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">10.1</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Conform&eacute;ment &agrave; l&#39;article L. 221-18 du Code de la consommation, et sous r&eacute;serve des dispositions de l&rsquo;article L 221-28 du Code de la consommation, le consommateur qui conclut un contrat par le biais d&#39;un moyen de communication &agrave; distance dispose d&#39;un d&eacute;lai de r&eacute;tractation de quatorze (14) jours &agrave; compter de la conclusion du contrat, pour les contrats de prestation de services.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Pour exercer son droit de r&eacute;tractation, le Client dispose de quatorze (14) jours pour informer LS2EC TRAINING de son intention de se r&eacute;tracter en remplissant <span style=" ">et en envoyant le formulaire de r&eacute;tractation tenu &agrave; sa disposition sur le Site internet en version imprimable ou </span>&nbsp;toute autre d&eacute;claration d&eacute;nu&eacute;e d&#39;ambigu&iuml;t&eacute;, exprimant sa volont&eacute; de se r&eacute;tracter. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style=" "><span style="font-family:&quot;Verdana&quot;,sans-serif">Lorsque le droit de r&eacute;tractation est transmis &eacute;lectroniquement en ligne &agrave; partir du Site, LS2EC TRAINING adressera sans d&eacute;lai au Client un accus&eacute; de r&eacute;ception de la r&eacute;tractation.</span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">La soci&eacute;t&eacute; LS2EC TRAINING s&#39;engage &agrave; rembourser au Client le prix de sa commande dans les 14 jours de la r&eacute;ception de la r&eacute;tractation.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">10.2</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Conform&eacute;ment &agrave; l&rsquo;article L 221-28 du Code de la consommation, le droit de r&eacute;tractation ne peut &ecirc;tre exerc&eacute; pour les contrats de fourniture de services pleinement ex&eacute;cut&eacute;s avant la fin du d&eacute;lai de r&eacute;tractation et, si le contrat soumet le consommateur &agrave; une obligation de payer, dont l&#39;ex&eacute;cution a commenc&eacute; avec son accord pr&eacute;alable et expr&egrave;s et avec la reconnaissance par lui de la perte de son droit de r&eacute;tractation, lorsque la prestation aura &eacute;t&eacute; pleinement ex&eacute;cut&eacute;e par le professionnel.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">La souscription par un consommateur d&#39;une formation e-learning est un contrat portant sur la fourniture de contenu num&eacute;rique ind&eacute;pendamment de tout support mat&eacute;riel au sens de l&#39;article L. 221-4 du Code de la consommation. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Si la formation est commenc&eacute;e, m&ecirc;me partiellement, le contrat sera consid&eacute;r&eacute; comme enti&egrave;rement ex&eacute;cut&eacute;. Le droit de r&eacute;tractation ne pourra plus &ecirc;tre exerc&eacute;.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108191977">ARTICLE 11. ANNULATION</a></strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">En dehors des cas pr&eacute;vus &agrave; l&rsquo;article 10 des pr&eacute;sentes, aucune annulation de la commande n&rsquo;est possible, quel qu&rsquo;en soit le motif, notamment en cas d&rsquo;incapacit&eacute; pour le Client d&rsquo;obtenir les outils et logiciels informatiques n&eacute;cessaires au visionnage du ou des Module(s) de formation.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong>ARTICLE 12. DUREE</strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les abonnements sont souscrits pour la dur&eacute;e choisie par le Client. </span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Sauf r&eacute;siliation du contrat par le Client dans les conditions ci-apr&egrave;s &eacute;nonc&eacute;es, le contrat est reconduit tacitement pour une dur&eacute;e identique &agrave; celle souscrite initialement. </span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">En cas de reconduction tacite, le tarif en vigueur pour l&rsquo;abonnement concern&eacute; sera pleinement applicable. </span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le Client pourra &agrave; tout moment r&eacute;silier le contrat sous r&eacute;serve de respecter un pr&eacute;avis d&rsquo;une semaine avant le terme pour les contrats mensuels, de 15 jours pour les contrats trimestriels et d&rsquo;un mois pour les contrats d&rsquo;une dur&eacute;e d&rsquo;un an.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">La prise en compte de la r&eacute;siliation sera effective au terme de la p&eacute;riode d&rsquo;abonnement en cours, sous r&eacute;serve du respect des d&eacute;lais de pr&eacute;avis susvis&eacute;s.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">En cas de non respect de ces d&eacute;lais de pr&eacute;avis, l&rsquo;abonnement est enti&egrave;rement renouvel&eacute;. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">La r&eacute;siliation n&rsquo;entra&icirc;ne aucun remboursement du prix de l&rsquo;abonnement. L&rsquo;ensemble des sommes vers&eacute;es au titre de l&rsquo;abonnement resteront d&eacute;finitivement acquises &agrave; LS2EC TRAINING. </span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108191975">ARTICLE 13. REMISE DES DOCUMENTS DE FIN DE FORMATION</a></strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">A l&rsquo;issue de la Formation,<strong> </strong>LS2EC TRAINING fera<strong> </strong>parvenir au Client, par E-mail les documents relatifs &agrave; son suivi et une attestation de fin de formation, sur demande&nbsp;; ainsi que les factures aff&eacute;rentes<strong>.</strong></span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108191978">ARTICLE 14. PROPRIETE INTELLECTUELLE</a></strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">14.1 </span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le Site internet conc&egrave;de &agrave; titre gratuit, personnel et non exclusif un unique droit d&rsquo;acc&egrave;s et d&rsquo;utilisation pour un usage priv&eacute; et non commercial. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">L&rsquo;Architecture du site, les marques, logos, interfaces, textes, images, slogans, noms de domaine, bases de donn&eacute;es, logiciels, contenus, et tous les autres &eacute;l&eacute;ments composant le site internet, sans que cette liste ne soit exhaustive sont la propri&eacute;t&eacute; exclusive de la soci&eacute;t&eacute; LS2EC TRAINING.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les pr&eacute;sentes conditions g&eacute;n&eacute;rales n&rsquo;emportent aucune cession de droits de propri&eacute;t&eacute; intellectuelle attach&eacute;s au Site.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Toute copie, modification, reproduction, diffusion, utilisation, transmission, commercialisation ou cr&eacute;ation d&#39;&oelig;uvres d&eacute;riv&eacute;es sur la base des El&eacute;ments Prot&eacute;g&eacute;s sans l&#39;accord &eacute;crit pr&eacute;alable de LS2EC TRANING sont strictement interdites et peuvent &ecirc;tre sanctionn&eacute;es au titre de la contrefa&ccedil;on.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">14.2</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> LS2EC TRAINING peut &ecirc;tre amen&eacute; &agrave; fournir au Participant de la Formation une documentation sur support papier et/ou num&eacute;rique, retra&ccedil;ant l&rsquo;essentiel de la Formation suivie. Cette documentation peut lui &ecirc;tre adress&eacute;e par courrier &eacute;lectronique &agrave; l&rsquo;adresse indiqu&eacute;e par le Client et/ou lors de la Formation et/ou au sein d&rsquo;un espace en ligne d&eacute;di&eacute;.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Cette documentation ne peut, de quelque mani&egrave;re que ce soit, faire l&rsquo;objet, m&ecirc;me partiellement, de reproduction, repr&eacute;sentation, pr&ecirc;t, &eacute;change ou cession, d&rsquo;extraction totale ou partielle de donn&eacute;es et/ou de transfert sur un autre support, de modification, adaptation, arrangement ou transformation sans l&rsquo;accord pr&eacute;alable et expr&egrave;s de LS2EC TRAINING.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Seul un droit d&rsquo;utilisation personnel, &agrave; l&rsquo;exclusion de tout transfert de droit de propri&eacute;t&eacute; de quelque sorte que ce soit, est consenti au Participant. A cet &eacute;gard, le Participant de la Formation et plus largement le Client s&rsquo;interdisent d&rsquo;exploiter notamment &agrave; des fins commerciales, directement et/ou indirectement, la documentation mise &agrave; disposition.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">14.3</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> LS2EC TRAINING est titulaire de la marque &laquo;&nbsp;LS2EC TRAINING&nbsp;&raquo;, marque de motif enregistr&eacute;e sous le num&eacute;ro 4776627 pour les produits et services des classes 41 et 42.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Toute utilisation de quelque mani&egrave;re que ce soit par le Client de la marque LS2EC TRAINING ou de toute autre marque appartenant &agrave; LS2EC TRAINING est strictement interdite.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le non-respect de cette interdiction constitue une contrefa&ccedil;on pouvant engager la responsabilit&eacute; civile et p&eacute;nale du contrefacteur.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">14.4</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Aucune des dispositions des pr&eacute;sentes Conditions G&eacute;n&eacute;rales ne pourra &ecirc;tre interpr&eacute;t&eacute;e comme conf&eacute;rant au Client une licence sur un quelconque droit de propri&eacute;t&eacute; intellectuelle.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108191979">ARTICLE 15. RENSEIGNEMENT, RECLAMATION</a></strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Toute pr&eacute;cision relative aux CGV, demande d&#39;information et/ou r&eacute;clamation doit &ecirc;tre faite par courrier aux coordonn&eacute;es de LS2EC TRAINING qui s&rsquo;efforcera de r&eacute;pondre &agrave; toute question dans les meilleurs d&eacute;lais.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108106113">ARTICLE 16. FORCE MAJEURE</a></strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">LS2EC TRAINING d&eacute;gage sa responsabilit&eacute; pour tout manquement &agrave; ses obligations contractuelles dans l&#39;hypoth&egrave;se d&#39;une force majeure ou fortuite, y compris, mais sans y &ecirc;tre limit&eacute;es, catastrophes, incendies, gr&egrave;ve interne ou externe, d&eacute;faillance ou pannes internes ou externes, et d&#39;une mani&egrave;re g&eacute;n&eacute;rale tout &eacute;v&eacute;nement ne permettant pas la bonne ex&eacute;cution du Contrat.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108106115"></a><a name="_Toc108191980">ARTICLE 17. RESPONSABILITE</a></strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">17.1</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> LS2EC TRAINING affirme que les Formations propos&eacute;es dans son catalogue de Formations, sont conformes &agrave; la description qui en est faite.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">17.2</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> En cas d&rsquo;erreur manifeste de la part du Client, entre les caract&eacute;ristiques de la Formation et/ou les conditions de la vente, LS2EC TRAINING ne saurait voir sa responsabilit&eacute; engag&eacute;e.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">17.3</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> La responsabilit&eacute; de LS2EC TRAINING ne peut &ecirc;tre engag&eacute;e qu&rsquo;en cas de faute ou de n&eacute;gligence prouv&eacute;e, et est limit&eacute;e aux pr&eacute;judices directs subis par le Client.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">En tout &eacute;tat de cause, au cas o&ugrave; la responsabilit&eacute; de LS2EC TRAINING serait retenue, le montant total de toute somme mises &agrave; la charge de LS2EC TRAINING ne pourra exc&eacute;der le montant total du prix pay&eacute; par le Client.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">17.4</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> LS2EC TRAINING ne saurait &ecirc;tre tenu<strong> </strong>responsable d&rsquo;une quelconque erreur et/ou oubli, de quelle<strong> </strong>que nature qu&rsquo;il soit, constat&eacute; dans la documentation et<strong> </strong>remis au Participant lors de la Formation. Cette derni&egrave;re doit<strong> </strong>&ecirc;tre consid&eacute;r&eacute;e comme un support p&eacute;dagogique qui ne<strong> </strong>saurait &ecirc;tre consid&eacute;r&eacute; comme un manuel pratique ou un<strong> </strong>document officiel explicitant la r&eacute;glementation applicable. Le<strong> </strong>Client reconnait et accepte que cette documentation<strong> </strong>n&rsquo;engage en aucun cas, sur son exhaustivit&eacute;, LS2EC TRAINING, qui n&rsquo;est nullement tenu d&rsquo;assurer une<strong> </strong>quelconque mise &agrave; jour a post&eacute;riori de la Formation.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108191981">ARTICLE 18. DONNEES PERSONNELLES</a></strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">18.1.</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> La soci&eacute;t&eacute; LS2EC TRAINING (soci&eacute;t&eacute; par actions simplifi&eacute;e &agrave; associ&eacute; unique immatricul&eacute;e au RCS de PONTOISE sous le num&eacute;ro 900&nbsp;286 477 et ayant son si&egrave;ge social sis 15 rue de Vienne &ndash; 95380 LOUVRES) est amen&eacute;e &agrave; traiter (collecter, consulter, utiliser, modifier, stocker, transmettre et effacer) des Donn&eacute;es &agrave; Caract&egrave;re Personnel (ci-apr&egrave;s les &laquo; Donn&eacute;es &raquo;) dans le cadre de ses activit&eacute;s. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">LS2EC TRAINING n&rsquo;enregistre sur ses serveurs aucune des informations bancaires des utilisateurs. L&rsquo;ensemble des donn&eacute;es relatives aux informations de paiement est g&eacute;r&eacute; par la plateforme de paiement en ligne.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les donn&eacute;es trait&eacute;es sont pour la plupart collect&eacute;es directement aupr&egrave;s des personnes concern&eacute;es, lorsqu&rsquo;elles, sollicite la souscription d&rsquo;un abonnement.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Dans le cadre de ses activit&eacute;s, la soci&eacute;t&eacute; LS2EC TRAINING collecte les donn&eacute;es suivantes&nbsp;: <span style=" ">e-mail, nom, pr&eacute;nom, num&eacute;ro de t&eacute;l&eacute;phone, &laquo;&nbsp;nom d&rsquo;usage&nbsp;&raquo; et pays d&rsquo;origine.</span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Ces donn&eacute;es sont collect&eacute;es aux fins de l&rsquo;ex&eacute;cution du contrat (commande, formation, facturation, recouvrement), de la gestion de la relation client (suivi de la relation client), &agrave; des fins de prospection commerciale, et pour la gestion des r&eacute;clamations.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les donn&eacute;es &agrave; caract&egrave;re personnel du Client sont conserv&eacute;es pendant la dur&eacute;e strictement n&eacute;cessaire &agrave; l&rsquo;accomplissement des finalit&eacute;s du traitement&nbsp;; notamment&nbsp;: </span></span></span></span></p>

                                        <ul>
                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les donn&eacute;es des Participants aux formations pendant toute la dur&eacute;e de la relation contractuelle, et jusqu&rsquo;&agrave; dix (10) ans apr&egrave;s sa rupture afin de respecter notamment les obligations comptables et fiscales de LS2EC TRAINING,</span></span></span></span></li>
                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les donn&eacute;es des prospects personnes physiques peuvent &ecirc;tre conserv&eacute;es jusqu&rsquo;&agrave; trois (3) ans apr&egrave;s le dernier contact &eacute;manant du prospect. </span></span></span></span></li>
                                        </ul>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Ces donn&eacute;es sont collect&eacute;es et trait&eacute;es au sein de l&rsquo;Union europ&eacute;enne.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Ces donn&eacute;es peuvent &ecirc;tre communiqu&eacute;es aux partenaires et aux sous-traitants de la soci&eacute;t&eacute; LS2EC TRAINING.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Toute personne physique dispose des droits d&rsquo;acc&egrave;s, de rectification, d&rsquo;effacement, de portabilit&eacute; des donn&eacute;es ainsi que de limitation et d&rsquo;opposition au traitement et d&#39;organisation du sort de ses donn&eacute;es apr&egrave;s son d&eacute;c&egrave;s. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">En cas d&rsquo;exercice du droit d&rsquo;opposition et du droit d&rsquo;oubli, toute communication aupr&egrave;s du Client (&agrave; l&rsquo;exclusion de la gestion de son compte) cessera.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Ces droits peuvent &ecirc;tre exerc&eacute;es en &eacute;crivant &agrave; Monsieur Claude Marcel BIYIHA MANG &agrave; l&rsquo;adresse &eacute;lectronique suivante&nbsp;: <span style=" ">cm.biyihamang@ls2ec.com</span>.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">En cas d&rsquo;exercice de vos droits, vous devez justifier de votre identit&eacute; par tous moyens.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les personnes disposent &eacute;galement du droit d&rsquo;introduire une r&eacute;clamation aupr&egrave;s de la CNIL (3 Place de Fontenoy - TSA 80715 - 75334 PARIS CEDEX 07, http://www.cnil.fr/). </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">De plus, les personnes qui le souhaitent, ont la possibilit&eacute; d&rsquo;organiser le sort de leurs donn&eacute;es apr&egrave;s leur d&eacute;c&egrave;s. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">18.2.</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif"> Si le Client transmet et/ou int&egrave;gre des donn&eacute;es &agrave; caract&egrave;re personnel (&laquo; Donn&eacute;es &raquo;) n&eacute;cessaires &agrave; la fourniture d&rsquo;une prestation ou &agrave; l&rsquo;utilisation d&rsquo;un service, objet d&rsquo;une Proposition (ci-apr&egrave;s le &laquo; Service &raquo;), le Client aura la qualit&eacute; de Responsable de traitement et LS2EC TRAINING la qualit&eacute; de sous- traitant.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">En sa qualit&eacute; de sous-traitant, LS2EC TRAINING s&rsquo;engage &agrave; traiter les Donn&eacute;es conform&eacute;ment aux instructions document&eacute;es du Client et uniquement pour la seule finalit&eacute; de fournir le Service. Si LS2EC TRAINING consid&egrave;re qu&rsquo;une instruction constitue une violation aux dispositions applicables et notamment du R&egrave;glement Europ&eacute;en 2016/679 du 27 avril 2016 et de la loi n&deg;78-17 modifi&eacute;e du 6 janvier 1978, dite &laquo; Loi Informatique et libert&eacute;s &raquo; (ci-apr&egrave;s les &laquo; Dispositions applicables &raquo;), elle en informe imm&eacute;diatement le Client. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">LS2EC TRAINING s&rsquo;engage &agrave; veiller &agrave; ce que les personnes autoris&eacute;es &agrave; traiter les Donn&eacute;es re&ccedil;oivent la formation n&eacute;cessaire en mati&egrave;re de protection des donn&eacute;es &agrave; caract&egrave;re personnel et s&rsquo;engagent &agrave; respecter la confidentialit&eacute; ou soient soumises &agrave; une obligation l&eacute;gale appropri&eacute;e de confidentialit&eacute;. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">LS2EC TRAINING s&rsquo;engage &agrave; prendre en compte, s&rsquo;agissant de ses outils, produits, applications ou services, les principes de protection des donn&eacute;es d&egrave;s la conception et de protection des donn&eacute;es par d&eacute;faut. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">LS2EC TRAINING s&rsquo;engage &agrave; mettre en place les mesures techniques et organisationnelles ad&eacute;quates afin de prot&eacute;ger l&rsquo;int&eacute;grit&eacute; et la confidentialit&eacute; des Donn&eacute;es stock&eacute;es au sein du Service. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">LS2EC TRAINING s&rsquo;engage &agrave; pr&eacute;senter des garanties suffisantes pour assurer la mise en &oelig;uvre des mesures de s&eacute;curit&eacute; et de confidentialit&eacute; au regard de la nature des Donn&eacute;es et des risques pr&eacute;sent&eacute;s par le traitement.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">LS2EC TRAINING met &agrave; la disposition du Client la documentation n&eacute;cessaire pour d&eacute;montrer le respect de toutes ses obligations. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">LS2EC TRAINING s&rsquo;engage &agrave; assister, de mani&egrave;re raisonnable, le Client &agrave; garantir le respect des obligations pr&eacute;vues aux articles 32 &agrave; 36, compte tenu de la nature du traitement et des informations &agrave; la disposition de LS2EC TRAINING. Dans l&rsquo;hypoth&egrave;se o&ugrave; le Client devrait remettre des Donn&eacute;es &agrave; un tiers et /ou &agrave; une autorit&eacute; administrative ou judiciaire, LS2EC TRAINING coop&eacute;rera avec lui aux fins de transmission des informations requises en conformit&eacute; avec les pr&eacute;sentes et les normes applicables. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">LS2EC TRAINING notifie au Client toute violation de Donn&eacute;es dans les meilleurs d&eacute;lais apr&egrave;s en avoir pris connaissance. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">LS2EC TRAINING informe le Client que le Service et les Donn&eacute;es sont h&eacute;berg&eacute;s au sein de l&rsquo;Espace &eacute;conomique europ&eacute;en, sauf autre indication dans la documentation du Produit. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">En cas de sous-traitance, LS2EC TRAINING s&rsquo;engage &agrave; signer un contrat &eacute;crit avec le sous-traitant imposant &agrave; ce dernier le respect des Dispositions applicables et de l&rsquo;ensemble des obligations vis&eacute;es au pr&eacute;sent article, &eacute;tant pr&eacute;cis&eacute; qu&rsquo;en cas de non-respect par un sous-traitant de ses obligations en mati&egrave;re de protection des donn&eacute;es personnelles, LS2EC TRAINING demeurera pleinement responsable &agrave; l&rsquo;&eacute;gard du Client. Le Client autorise le recours &agrave; des sous-traitants dans ces conditions.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Toute personne dont les Donn&eacute;es ont &eacute;t&eacute; collect&eacute;es par le Client b&eacute;n&eacute;ficie des droits d&rsquo;acc&egrave;s, de rectification, d&rsquo;effacement, de portabilit&eacute; des Donn&eacute;es ainsi que de limitation et d&rsquo;opposition au traitement et d&#39;organisation du sort de ses Donn&eacute;es apr&egrave;s son d&eacute;c&egrave;s en s&rsquo;adressant directement au Client. </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Le Client garantit &agrave; LS2EC TRAINING qu&rsquo;il a proc&eacute;d&eacute; &agrave; l&rsquo;ensemble des obligations qui lui incombent au terme des Dispositions applicables et qu&rsquo;il a inform&eacute; les personnes physiques de l&rsquo;usage qui est fait des Donn&eacute;es. A ce titre, le Client garantit LS2EC TRAINING contre tout recours, plainte ou r&eacute;clamation &eacute;manant d&rsquo;une personne physique dont les Donn&eacute;es seraient trait&eacute;es via le Service. Il est pr&eacute;cis&eacute; qu&rsquo;en cas d&rsquo;exercice de ses droits par une personne concern&eacute;e ; LS2EC TRAINING peut assister le Client, aux tarifs en vigueur &agrave; la demande, pour que ce dernier puisse s&rsquo;acquitter de son obligation de donner suite aux demandes d&rsquo;exercice des droits. Le Client s&rsquo;engage &agrave; documenter par &eacute;crit toute instruction concernant le traitement des donn&eacute;es par LS2EC TRAINING, veiller, au pr&eacute;alable et pendant toute la dur&eacute;e du Service, au respect des obligations pr&eacute;vues par les Dispositions applicables de la part de LS2EC TRAINING, et superviser le traitement, y compris r&eacute;aliser les audits et les inspections aupr&egrave;s de LS2EC TRAINING. Les Donn&eacute;es sont conserv&eacute;es uniquement le temps n&eacute;cessaire pour la finalit&eacute; poursuivie. LS2EC TRAINING s&rsquo;engage, au choix du Client, &agrave; d&eacute;truire ou renvoyer les Donn&eacute;es au terme du Service, et justifier par &eacute;crit aupr&egrave;s du Client qu&rsquo;il n&rsquo;en conservera aucune copie.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong>ARTICLE 19. LOI APPLICABLE ET REGLEMENT DES DIFFERENDS</strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Les pr&eacute;sentes Conditions G&eacute;n&eacute;rales sont soumises au droit interne fran&ccedil;ais et notamment aux dispositions du Code de la consommation.</span></span></span></span></p>

                                        <h1><span style="font-size:10pt"><span style="font-family:Verdana,sans-serif"><strong><a name="_Toc108106116">ARTICLE 20. RECOURS AU MEDIATEUR DE LA CONSOMMATION</a></strong></span></span></h1>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Si vous &ecirc;tes un &laquo; consommateur &raquo; au sens de l&#39;article liminaire du code de la consommation vous devrez en premier lieu nous adresser votre r&eacute;clamation directement par courrier &agrave; l&#39;adresse postale suivante : <span style=" ">15 rue de Vienne &ndash; 95380 LOUVRES ou &agrave; l&#39;adresse &eacute;lectronique suivante : cm.biyihamang@ls2ec.com.</span></span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Si cette tentative &eacute;choue, vous pourrez recourir &agrave; une proc&eacute;dure de m&eacute;diation conventionnelle ou &agrave; tout autre mode alternatif de r&egrave;glement des diff&eacute;rends et notamment en ayant recours, gratuitement, dans le d&eacute;lai d&#39;un an &agrave; compter de votre r&eacute;clamation, au m&eacute;diateur de la consommation comp&eacute;tent selon les dispositions du Titre Ier du Livre VI du code de la consommation :</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">Centre de la M&eacute;diation de la Consommation de Conciliateurs de Justice (CM2C)&nbsp;: association Loi 1901 enregistr&eacute;e sous le num&eacute;ro SIRET 831&nbsp;213&nbsp;871 00013, n&deg;TVA &nbsp;FR60831213871, 14 rue Saint Jean, 75017 Paris - 01 89 47 00 14, https://www.cm2c.net/.</span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">La liste des m&eacute;diateurs de la consommation est disponible &agrave; l&#39;adresse suivante : https://www.economie.gouv.fr/mediation-conso/liste-des-mediateurs-references) </span></span></span></span></p>

                                        <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Verdana&quot;,sans-serif">En cas d&#39;&eacute;chec de cette m&eacute;diation, ou si vous ne souhaitez pas y recourir, vous demeurez libre de soumettre votre diff&eacute;rend aux tribunaux comp&eacute;tents.</span></span></span></span></p>

                                        <p style="text-align:justify">&nbsp;</p>

                                        <p style="text-align:justify">&nbsp;</p>

                                    </div>
                                    </div>
                                <hr>
                                    <div>




                                    </div>
                                    <h4 class="box-title mb-15">
                                        <input onchange="cgufunction()"  type="checkbox" id="cgu" name="cgu" value="cgu">
                                        <label class="box-title mb-15" for="cgu" style="font-size: 1.2857142857142858rem">
                                            @tt("J'accepte les") <a target="_blank" href="{{__front}}document/CGV.pdf">@tt("conditions générales de ventes")</a>
                                        </label><br>
                                    </h4><br>
                                    <div hidden id="payment_method">
                                        <h4 class="box-title mb-15">@tt("Choose payment Option")</h4>
                                        <div class="tab-content tabcontent-border" >
                                            <div class="tab-pane active" id="pay" role="tabpanel">
                                                <div class="p-30">
                                                    <div id="smart-button-container">
                                                        <div id="messageF"></div>
                                                        <div style="text-align: center;">
                                                            <div id="paypal-button-container"></div>
                                                            @if(is_null($subscription->getPaypalplan()))
                                                            <select name="" id="devise" style="width: 20%;
    height: 45px;
    border: 2px solid #0b8e36;
    border-radius: 5px;">
                                                                <option value="">@tt('Selectionnez la devise')</option>
                                                                <option value="XAF">@tt('XAF')</option>
                                                                <option value="XOF">@tt('XOF')</option>
                                                                <option value="CDF">@tt('CDF')</option>
                                                                <option value="GNF">@tt('GNF')</option>
                                                            </select>
                                                            <button id="cinetpay" style="width: 43%;
    height: 45px;
    border-radius: 5px;
    background-color: #0b8e36;
    border: 2px solid #0b8e36;
    color: #ffffff;" onclick="checkout()">@tt('Mobile money')</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <?php $a = "user_subscription.created_at";?>
                                    <?php $u_subscription = array_reverse(User_subscription::where("this.user_id", App::$user->getId())->andwhere('this.subscription_id',$subscription->getId())->__getAll())[0] ?>
                                    <?php
                                    $date1 = $u_subscription->$a;
                                    $date2 = date("Y-m-d h:i:s");

                                    $ts1 = strtotime($date1);
                                    $ts2 = strtotime($date2);

                                    $year1 = date('Y', $ts1);
                                    $year2 = date('Y', $ts2);

                                    $month1 = date('m', $ts1);
                                    $month2 = date('m', $ts2);

                                    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                                    ?>
                                    @if($diff < 12)
                                        <div class="row justify-content-center g-0">
                                            <div class="col-lg-5 col-md-5 col-12">
                                                <div class="box box-body">

                                                    <div class="content-top-agile pb-0 pt-20">
                                                        <h2 class="text-primary">@tt("Vous avez déja souscrit à cet abonnement ! ")</h2>

                                                    </div>
                                                    <div class="p-40">
                                                        <?php $_SESSION['IDSUBSCRIPTION'] = ""; ?>
                                                        <a href="{{route('myboard')}}" type="button" class="btn btn-info w-p100 mt-15">@tt("Continuer")</a>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <hr>
                                            <button onclick="checkout()">Checkout</button>

                                            <div id="payment_method">
                                            <h4 class="box-title mb-15">@tt("Choose payment Option")</h4>
                                            <div class="tab-content tabcontent-border" >
                                                <div class="tab-pane active" id="pay" role="tabpanel">
                                                    <div class="p-30">
                                                        <div id="smart-button-container">
                                                            <div id="messageF"></div>
                                                            <div style="text-align: center;">
                                                                <div id="paypal-button-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @else
                                <button onclick="location.href='{{route('login')}}';" type="button" class="btn btn-info w-p100 mt-15">@tt("Login to Pay")</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








@endsection
@section("jsimport")


        @if(is_null($subscription->getPaypalplan()))
            @if(App::$user->getRole() == 3)
                <script src="https://www.paypal.com/sdk/js?client-id=ASq4h0hB7HT_bFKcGu8HFqqPHKOLlu0qszDornLOeSuMOPp9xXbbtQuQ0csML6egXOBLExP-aZDK0kOV&currency=EUR"></script>
            @else
                <script src="https://www.paypal.com/sdk/js?client-id=AX-b9tAA43U18tmHWrPdzgbVRmMTtk4IsqLnkJufx-pSutyEUSQCjnoLTPNaG6ayGUcqcKAd_OtZcpQ1&currency=EUR"></script>
            @endif
            <script src="{{ assets   }}js/cinetpay.js"></script>
        @else
            <script src="https://www.paypal.com/sdk/js?client-id=AX-b9tAA43U18tmHWrPdzgbVRmMTtk4IsqLnkJufx-pSutyEUSQCjnoLTPNaG6ayGUcqcKAd_OtZcpQ1&currency=EUR&vault=true&intent=subscription"></script>
        @endif
    



    <script src="{{ assets   }}js/paypal.js"></script>
    <script>

        var subscription = '{{$subscription->getId()}}';
        var route = '{{route('confirmorder')}}?id='+subscription;
        var initprice = parseInt('{{$subscription->getM_price('check')}}');
        var inityear = parseInt('{{$subscription->getY_price('check')}}');
        var initpricemonth = parseInt('{{$subscription->getM_price('check')}}');
        var tva = (20*initprice)/100;
        var ttc = initprice + tva;
        var route = '{{route('confirmorder')}}?id='+subscription;
        let nbre_month  = {{$subscription->getMonth()}};


        route = '{{route('confirmordernew')}}?id='+subscription;
        route += '&month='+{{$subscription->getMonth()}};

        setAllprice({{$subscription->getM_price()}}, 0, '{{$subscription->getPaypalplan()}}');
        // $('#paypal-button-container').empty();

        function cgufunction(){
            // ////alert($(this).is(":checked"));
            if($('#cgu:checked').length > 0){
                $('#payment_method').removeAttr('hidden');
                {{--setAllprice({{$subscription->getM_price()}});--}}
            }
            else{
                $('#payment_method').attr('hidden',true);
                // $('#paypal-button-container').empty();
            }
        }


        // function calculatePrice(){
        // 	////alert($(this).val());
        // }
        {{--$("#qte").bind("input", function() {--}}
        {{--    route = '{{route('confirmorder')}}?id='+subscription;--}}
        {{--    nbre_month = $("#qte").val();--}}
        {{--    if(nbre_month == ''){--}}
        {{--        nbre_month = '0';--}}
        {{--    }--}}
        {{--    nbre_month = parseInt({{$subscription->getMonth()}});--}}
        {{--    if(nbre_month >= 12){--}}
        {{--        let nbre_year = parseInt(nbre_month / 12);--}}
        {{--        let nbre_mo = nbre_month % 12;--}}
        {{--        //////alert(nbre_mo);--}}
        {{--        initprice = (inityear * nbre_year) + (initpricemonth * nbre_mo);--}}
        {{--        setAllprice(initprice);--}}
        {{--    }--}}
        {{--    else{--}}
        {{--        initprice = initpricemonth * nbre_month;--}}
        {{--        setAllprice(initprice);--}}
        {{--    }--}}
        {{--    route += '&month='+nbre_month;--}}
        {{--    //////alert($("#qte").val());--}}
        {{--});--}}
        function checkCode(el){
            model.addLoader($(el));

            var price = initprice;
            let code = $("#codepromo").val();
            $.get(__env+"api/lazyloading.codepromo?dfilters=on&code:eq="+code, function(data, status){
                //data.listEntity;
                model.removeLoader();
                //console.log(data.listEntity[0].valeur);

                $p = price;

                if(data.listEntity.length > 0){
                    //price = price * parseInt(data.listEntity[0].valeur);

                    if(data.listEntity[0].nbremonth == 0 || data.listEntity[0].state != 0){

                        $('#errorcode').html('<span style="color:#fb0202">@tt("Code invalide")</span>');
                    }
                    else{
                        if(data.listEntity[0].nbremonth !== -1){

                            if(data.listEntity[0].code != code){

                                $('#errorcode').html('<span style="color:#fb0202">@tt("code invalide")</span>');
                            }
                            else{
                                if(data.listEntity[0].nbremonth <= nbre_month){
                                    route += '&code=' + data.listEntity[0].id;
                                    valeur = data.listEntity[0].valeur;

                                    @if(!is_null($subscription->getPaypalplan()))
                                        let codeid = data.listEntity[0].id;
                                        $.get(__env+"api/lazyloading.codepromosubscription?dfilters=on&codepromo_id:eq="+data.listEntity[0].id+"&subscription_id:eq={{$subscription->getId()}}", function(data, status){
                                            console.log(data);


                                            if(data.listEntity.length > 0){
                                                paypalplan = data.listEntity[0].paypalplan;
                                            }
                                            else{
                                                var settings = {
                                                    "url": __env+"api/create.codepromosubscription",
                                                    "method": "POST",
                                                    "timeout": 0,
                                                    "headers": {
                                                        "Content-Type": "application/json"
                                                    },
                                                    "data": JSON.stringify({
                                                        "codepromosubscription": {
                                                            "id": "",
                                                            "codepromo.id": codeid,
                                                            "subscription.id": {{$subscription->getId()}},
                                                        }
                                                    }),
                                                };

                                                $.ajax(settings).done(function (response) {
                                                    paypalplan = response.codepromosubscription.paypalplan
                                                
                                                });
                                            }
                                            
                                            //alert(paypalplan);
                                            price = setAllprice(price, parseInt(valeur) / 100,paypalplan);
                                            $('#errorcode').html('<span style="color:#0b8e36">' + valeur + ' % @tt("de réduction")</span>');


                                        });
                                    @else
                                        price = setAllprice(price, parseInt(valeur) / 100);
                                        $('#errorcode').html('<span style="color:#0b8e36">' + valeur + ' % @tt("de réduction")</span>');
                                    @endif

                                }
                                else{
                                    $('#errorcode').html('<span style="color:#fb0202">@tt("Code invalide")</span>');
                                }
                            }

                        }
                        else{
                            route += '&code=' + data.listEntity[0].id;

                            price = setAllprice(price, parseInt(data.listEntity[0].valeur) / 100);

                            $('#errorcode').html('<span style="color:#0b8e36">' + data.listEntity[0].valeur + ' % @tt("de réduction")</span>');
                        }
                    }

                }
                else{
                    $('#errorcode').html('<span style="color:#fb0202">@tt("Code invalide")</span>');
                }
            });
        }


        function setAllprice(price, reduction = 0, paypalplan){
            $p = price;
            price = price * reduction;

            price = $p - price;
            price = Math.round(price * 100) / 100;
            tva = (20*price)/100;
            tva = Math.round(tva * 100) / 100;
            ttc = price + tva;
            ttc = Math.round(ttc * 100) / 100;
            route += '&price='+price;
            route += '&tva='+tva;
            route += '&ttc='+ttc;

            $('#paypal-button-container').empty();
            $a = '';
            if(reduction !== 0){
                $a += '<span style="text-decoration:line-through">'+$p+' €</span><br>';
            }
            $a += '<span>'+price+' €</span>';
            $('#pricetotal').html('<span>'+price+' €</span>');
            $('#pricetva').html('<span>'+tva+' €</span>');
            $('#pricetotalttc').html('<span>'+ttc+' €</span>');
            $('#price').html($a);
            price = ttc;
            route += '&montant='+price;

            //return price;
            @if(is_null($subscription->getPaypalplan()))
                //alert(route);

                var index = route.indexOf("?");  // Gets the first index where a space occours
                var id = route.substr(0, index); // Gets the first part
                var text = route.substr(index + 1);
            // //alert(id);
            //     //alert(text);
                let route2 = '{{route('cinetpayconfirmorder')}}?'+text;
                //alert(route2);
                let devise = 'XAF';
                let description = '{{$subscription->getName()}}';
                let name = '{{App::$user->getFirstname()}}';
                let surname = '{{App::$user->getLastname()}}';
                let email = '{{App::$user->getEmail()}}';
                let phonenumber = '{{App::$user->getPhonenumber()}}';
                let country = '{{App::$user->getCountry()->iso}}';
                let countryname = '{{App::$user->getCountry()->getName()}}';
                //price = 100;
                $('#cinetpay').attr('onclick',`checkout('`+route2+`',`+price+`,'`+devise+`','`+description+`','`+name+`','`+surname+`','`+email+`','`+phonenumber+`','`+country+`','`+countryname+`')`);
                purchase(price, 'Euro', 'EUR', "{{$subscription->getName()}}" , '{{$a}}', '#paypal-button-container',function(){ location.href = route; });

            @else
                ////alert(paypalplan);
                paypal.Buttons({
                    createSubscription: function(data, actions) {
                        return actions.subscription.create({
                            'plan_id': paypalplan
                            // Creates the subscription
                        });
                    },
                    onApprove: function(data, actions) {
                        ////alert(data.subscriptionID);
                        console.log(data);
                        ////alert('You have successfully created subscription ' + data.subscriptionID); // Optional message given to subscriber
                        //alert(data.subscriptionID);
                        route = route+"&paypalsubscription="+data.subscriptionID;
                        location.href = route;
                    }
                }).render('#paypal-button-container'); // Renders the PayPal button
            @endif
            //purchase(price, 'Euro', 'EUR', "{{$subscription->getName()}}" , '{{$a}}', '#paypal-button-container',function(){ location.href = route; });

        }


        function reset(){
            //////alert("maff");
            $("#message").html("");
            $("#paypal-button-container").html("");
            $('#payment_method').attr('hidden','hidden');
        }
        function  aaa(subscription, date){
            ////alert(subscription);
            ////alert(date);
        }
        function payment(){
            reset();

            if($('#begindate').val() == ""){
                ////alert($('#begindate').val());
                $('#message').html(`
				<div class="////alert ////alert-danger ////alert-dismissable">
					<button type="button" class="close" data-dismiss="////alert" aria-hidden="true">×
					</button>
					${'@tt("Vous devez selectionner une date")'}
				</div>
				`);
            }
            else{
                $("#payment_method").removeAttr('hidden');
                var date  = $('#begindate').val();

            }
        }



    </script>
@endsection
