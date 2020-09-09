<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stage+</title>



<link rel="stylesheet" type="text/css" href="{{ asset('https://pfe2015-stages-laravel.herokuapp.com/media/css/dataTables.colVis.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('https://pfe2015-stages-laravel.herokuapp.com/media/css/dataTables.colvis.jqueryui.css')}}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ asset('https://pfe2015-stages-laravel.herokuapp.com/media/3/dataTables.bootstrap.css')}}">

<link rel="stylesheet" type="text/css" href="{{ asset('https://pfe2015-stages-laravel.herokuapp.com/menu/jquery.smartmenus.bootstrap.css')}}">
<link href="{{ asset('https://pfe2015-stages-laravel.herokuapp.com/css/app.css') }}" rel="stylesheet">




<!-- Latest compiled and minified CSS      
Theme CSS 
  Sandstonebootstrap.min.css 
  Sandstonebootstrap.css  
  simplexbootstrap.css
  Darklybootstrap.min.css 
  cosmobootstrap.css 
  flatlybootstrap.css
  spacelabbootstrap.css 
  Paperbootstrap.min.css 
   
  journalbootstrap.css
  yetibootstrap.css


-->
<link rel="stylesheet" href="{{ asset('http://pfe2015-stages-laravel.herokuapp.com/bootstrap/css/bootstrap.css')}}">


<!-- Optional theme -->
<!--<link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/css/bootstrap-theme.min.css')}}">-->
<link rel="stylesheet" type="text/css" href="{{ asset('https://pfe2015-stages-laravel.herokuapp.com/chosen/chosen.bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('https://pfe2015-stages-laravel.herokuapp.com/chosen/navbar-custom.css')}}">


<link rel="stylesheet" type="text/css" href="{{ asset('https://pfe2015-stages-laravel.herokuapp.com/date/css/bootstrap-datetimepicker.min.css')}}"> 
<link rel="stylesheet" type="text/css" href="{{ asset('https://pfe2015-stages-laravel.herokuapp.com/font-awesome-4.3.0/css/font-awesome.min.css')}}"> 
<link rel="stylesheet" type="text/css" href="{{ asset('https://pfe2015-stages-laravel.herokuapp.com/text/src/bootstrap3-wysihtml5.css')}}"> 
<link rel="stylesheet" type="text/css" href="{{ asset('https://pfe2015-stages-laravel.herokuapp.com/spiner.css')}}"> 
             
<!-- Latest compiled and minified JavaScript -->









<!-- Fonts -->

   

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->



        <style>
          body { background: #F0F0F0; }
          .container { background: white; }


        </style>
 
</head>
<body >
		<!-- Scripts -->

   	<script type="text/javascript" language="javascript" src="{{ asset('http://pfe2015-stages-laravel.herokuapp.com/media/js/jquery.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('http://pfe2015-stages-laravel.herokuapp.com/media/js/jquery.dataTables.min.js')}}"></script>
   

    <script type="text/javascript" language="javascript" src="{{ asset('http://pfe2015-stages-laravel.herokuapp.com/media/3/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('/media/js/dataTables.colReorder.js')}}"></script>

    <script type="text/javascript" language="javascript" src="{{ asset('http://pfe2015-stages-laravel.herokuapp.com/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('http://pfe2015-stages-laravel.herokuapp.com/chosen/chosen.jquery.min.js')}}"></script>
    

    <script type="text/javascript" language="javascript" src="{{ asset('/chosen/bootstrap-filestyle.js ')}}"></script> 
                                                          
    <script type="text/javascript" language="javascript" src="{{ asset('/menu/jquery.smartmenus.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('/menu/jquery.smartmenus.bootstrap.min.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('/date/min/moment.min.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('/date/min/locales.min.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('/date/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script type="text/javascript" language="javascript" src="{{ asset('/text/src/bootstrap3-wysihtml5.all.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('/text/src/bootstrap3-wysihtml5.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('/text/src/locales/bootstrap-wysihtml5.fr-FR.js')}}"></script>
     <script type="text/javascript" language="javascript" src="{{ asset('/media/js/dataTables.colVis.min.js')}}"></script>
 

 <!--navbar-inverse       navbar-default  -->
	<nav class="navbar  navbar-custom  navbar-static-top  navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/home') }}" style=" font-weight:bold"><i>Stage+</i></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


				
					
                    <ul class="nav navbar-nav">
					       <li class="dropdown"><a href="{{ url('/home') }}" class="btn-lg" role="button" ><i class="fa fa-home fa-lg"></i></a></li>
                               
					      	
					     <!-- 	 <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 Acceuil
                               </a>
                               <ul class="dropdown-menu" role="menu">
                                 
                                 <li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home"></span> page d'acceuil</a></li>
                                <li class="divider"></li>
					         	<li class="dropdown">
							      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							      	<span class="glyphicon glyphicon-qrcode"></span> profile </a>
						        	<ul class="dropdown-menu" role="menu">

								
								<li><a href="#" ><span class="glyphicon glyphicon-search"></span> consulter mon profil</a></li>
							     <li><a href="#" ><span class="glyphicon glyphicon-pencil"></span> modifier profil</a>
                                  <ul class="dropdown-menu">
                                   <li><a href="#" ><span class="glyphicon glyphicon-user"></span> profile</a></li>
                                   <li><a href="#" ><span class="glyphicon glyphicon-envelope"></span> email</a></li>
                                   <li><a href="#" ><span class="glyphicon glyphicon-lock"></span> mot de passe</a></li>
                                  </ul>
                                 </li>
                  
							</ul>
						</li>


                                 
                                 <li class="divider"></li>
                               </ul>
                          </li>-->
					      
                     
                     <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 Téléchargement 
                               </a>
                               <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/telecharger/consulter')}}" ><span class="glyphicon glyphicon-search"></span> Consulter téléchargement</a></li>
                                <li><a href="{{ url('/telecharger')}}" ><span class="glyphicon glyphicon-cog"></span> Gérer téléchargement</a></li> 
                                <li><a href=" {{ url('/telecharger/create')}}" ><span class="glyphicon glyphicon-plus"></span> Ajouter un téléchargement </a></li> 
  
  

                               

                               </ul>
                     </li>





                      <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 Offres d'emploies
                                
                               </a>
                               <ul class="dropdown-menu" role="menu">
                                <!-- <li><a href="#" ><span class="glyphicon glyphicon-search"></span> Consulter les offres d'emploie</a></li>-->
                                 <li><a href="{{ url('/offre_d_emploi/emploiEnAttente')}}" ><span class="glyphicon glyphicon-paperclip"></span> Offres d'emplois en attente</a></li>



                                 <li><a href="{{ url('/offre_d_emploi') }}" ><span class="glyphicon glyphicon-cog"></span> Gérer les offres d'emplois</a></li> 
                                 <li><a href="{{ url('/offre_d_emploi/create')}}" ><span class="glyphicon glyphicon-plus"></span> Ajouter un offre d'emploi</a></li> 
                                 <li><a href="{{ url('/offre_d_emploi/emploiCorbeille')}}" ><span class="glyphicon glyphicon-trash"></span> Corbeille d'offres d'emplois</a></li> 
      

  
                               </ul>
                     </li>  
                    <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Stages 
                               </a>
                               <ul class="dropdown-menu" role="menu">

                                 <li>
                                      
                                          <li><a href="{{ url('stage/stageEnAttente')}}" ><span class="glyphicon glyphicon-time"></span> Stages en attente</a></li> 
                                          <li><a href="{{ url('stage/stagesLibre')}}" ><span class="glyphicon glyphicon-paperclip"></span> Stages encore libre</a></li> 
                                          <li><a href="{{ url('stage/stageEnCours')}}" ><span class="glyphicon glyphicon-time"></span> Stages en cours</a></li> 
                                          <li><a href="{{ url('/stage') }}" ><span class="glyphicon glyphicon-cog"></span> Gérer les stages</a></li> 
                                         
                                          <li><a href="{{ url('stage/create')}}" ><span class="glyphicon glyphicon-plus"></span> Ajouter un stage</a></li> 
                                        
                                          <li><a href="{{ url('stage/imprimerStage')}}" ><span class="glyphicon glyphicon-print"></span> Imprimer liste des stages valide</a></li> 
                                         <li class="divider"></li>
                                          <li>
                                            <a href="#" ><span class="glyphicon glyphicon-pushpin"></span> Stages et encadreurs  </a>
                                             <ul class="dropdown-menu">
                                              <li><a href="{{ url('stage/avecEncadreur')}}" ><span class="glyphicon glyphicon-ok"></span> avec encadreur</a></li> 
                                              <li><a href="{{ url('stage/sansEncadreur')}}" ><span class="glyphicon glyphicon-remove"></span> sans encadreur</a></li> 
                                             </ul>
                                          </li>
                                          <li>
                                            <a href="#" ><span class="glyphicon glyphicon-tag"></span> Stages et affectations</a>
                                             <ul class="dropdown-menu">
                                              <li><a href="{{ url('stage/stageAvecAffec')}}" ><span class="glyphicon glyphicon-ok"></span> avec affectation</a></li> 
                                              <li><a href="{{ url('stage/stageSansAffec')}}" ><span class="glyphicon glyphicon-remove"></span> sans affectation</a></li>
                                             </ul>
                                          </li>
                                        
                                         
                                  </li>



                       
                               </ul>
                     </li>  


                           <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Soutenances
                               </a>
                               <ul class="dropdown-menu" role="menu">
                                    <li> 
                                      
                                          
                                          <li><a href="{{ route('soutenance.souteNonPlanifie')}}" ><i class="fa fa-refresh fa-spin"></i> Les soutenances non organisées</a></li>
                                          <li><a href="{{ url('/soutenance') }}" ><i class="fa fa-calendar "></i> Les soutenances organisées</a></li>
                                          <li><a href="{{ route('soutenance.historiqueSoute')}}" ><i class="fa fa-folder-open"></i> Historique des soutenances</a></li>
                                          <li><a href="{{ url('/stagiaire/create')}}" ><span class="glyphicon glyphicon-education"></span> Ajouter les résultats</a></li>
                                          <li><a href="{{ route('stagiaire.edit',1) }}" ><span class="glyphicon glyphicon-education"></span> Modifier les résultats</a></li>
                                          <li><a href="{{ url('/soutenance/imprimerPfe') }}" ><span class="glyphicon glyphicon-print"></span> Imprimer liste des soutenances</a></li> 
                                    </li>
                               </ul>
                           </li>  










				          <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 Administration 
                               </a>
                               <ul class="dropdown-menu" role="menu">
                               	   
                                   <li><a href="{{ route('configuration.edit',1) }}"><span class="glyphicon glyphicon-wrench"></span> Configuration</a></li>
                                   <li class="divider"></li>
                                  <!--   <li><a href="#">
                                    <span class="glyphicon glyphicon-refresh"></span> Synchroniser</a>
                                      <ul class="dropdown-menu">
                                      	<li><a href="#" ><span class="glyphicon glyphicon-cog"></span> gérer</a></li>
                                      	<li><a href="#" ><span class="glyphicon glyphicon-book"></span> synchroniser filière</a></li>
                                      	<li><a href="#" ><span class="glyphicon glyphicon-user"></span> synchroniser enseignant</a></li>
                                      	<li><a href="#" ><span class="glyphicon glyphicon-user"></span> synchroniser étudiant</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" ><span class="glyphicon glyphicon-tasks"></span> champs base de données</a>
                                          <ul class="dropdown-menu">
                                      	
                                      	    <li><a href="#" ><span class="glyphicon glyphicon-book"></span> filière</a></li>
                                      	    <li><a href="#" ><span class="glyphicon glyphicon-user"></span> enseignant</a></li>
                                      	    <li><a href="#" ><span class="glyphicon glyphicon-user"></span> étudiant</a></li>
                                          </ul>
                                        </li>
                                      </ul>
                                   
                                    </li>-->
                                    <li><a href="#" >
                                    	<i class="fa fa-users"></i> Gestion des utilisateurs</a>
                                        <ul class="dropdown-menu">
                                           <li><a href="{{ url('/etudiant') }}" ><span class="glyphicon glyphicon-user"></span> gestion des étudiants</a></li> 
                                            <li><a href="{{ url('/enseignant') }}" ><span class="glyphicon glyphicon-user"></span> gestion des enseignants</a></li> 
                                            <li><a href="{{ url('/entreprise') }}" ><i class="fa fa-university"></i> gestion des entreprises</a></li>
                  
                                            <li><a href="{{ url('/admin')}}" ><span class="glyphicon glyphicon-user"></span> gestion des Administrateurs</a></li>
                                            
                                        </ul> 

                                    </li>
                                    <li>
                                    	<a href="#" >
                                    	<span class="glyphicon glyphicon-folder-open"></span> Stage</a>
                                        <ul class="dropdown-menu">
                                           <li><a href="{{ url('/type_stage') }}" ><i class="fa fa-sitemap"></i> types de stage</a></li> 
                                           <li><a href="#" ><span class="glyphicon glyphicon-file"></span> introduction des stages</a></li>
                                           <li><a href="#" ><span class="glyphicon glyphicon-list-alt"></span> textes des lettre d'affectation</a></li>
                                            
                                        </ul> 
                                    </li>
                                    <li>
                                    	<a href="#" >
                                    	<span class="glyphicon glyphicon-folder-close"></span> Soutenances</a>
                                        <ul class="dropdown-menu">
                                           <li><a href="{{ url('/soutenance_salle') }}" ><span class="glyphicon glyphicon-cog"></span> gérer les salles</a></li> 
                               
                                            
                                        </ul> 
                                    </li>
                                     <li class="divider"></li>
                                    <li><a href="{{ url('/secteur') }}" ><span class="glyphicon glyphicon-road"></span> Secteur d'activité</a></li> 
                                    <li><a href="{{ url('/filiere') }}" ><i class="fa fa-tags "></i> Filière</a></li>
                                     
                                    
  
                                            
                                         
                                            
                                        </ul> 
                                    </li>
                                   
                                  </ul>
                                    </li>

                                    <li>
                                      <a href="#" >
                                      <span class="glyphicon glyphicon-stats"></span> Statistiques</a>
                                        <ul class="dropdown-menu">
                                    <li>
                                      <a href="#" >
                                      <span class="glyphicon glyphicon-folder-open"></span> Stage</a>
                                        <ul class="dropdown-menu">
                                         <li><a href="#" ><span class="glyphicon glyphicon-stats"></span> graphe</a></li> 
                                         <li><a href="#" ><i class="fa fa-pie-chart"></i> general</a></li>
                                         <li><a href="#" ><span class="glyphicon glyphicon-bookmark"></span> par entreprise</a></li>
                                         <li><a href="#" ><span class="glyphicon glyphicon-user"></span> par enseignant </a></li>
                                         <li><a href="#" ><span class="glyphicon glyphicon-user"></span> par étudiant</a></li>

                                       
                                        </ul> 
                                    </li>
                                    <li>
                                      <a href="#" >
                                      <span class="glyphicon glyphicon-folder-close"></span> Soutenances</a>
                                        <ul class="dropdown-menu">
                                         <li><a href="#" ><span class="glyphicon glyphicon-stats"></span> graphe</a></li> 
                                         <li><a href="#" ><span class="glyphicon glyphicon-stats"></span> general</a></li>
                                         <li><a href="#" ><span class="glyphicon glyphicon-bookmark"></span> par entreprise</a></li>
                                         <li><a href="#" ><span class="glyphicon glyphicon-user"></span> par enseignant </a></li>
                                         <li><a href="#" ><span class="glyphicon glyphicon-user"></span> par étudiant</a></li>
                                          
                                        </ul> 
                                    </li>
                                            
                                        </ul> 
                                    </li>


                                    
                                 
                                 
                                 
                                
                               </ul>
                          </li>
				    </ul>
                 
                      




				
				
			</div>
		</div>
	</nav>



   <br><br> <br><br> 


  <div class="row">
   <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-body">


  

    

   @if(Session::has('message'))
      <div class="alert   alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <i class="fa fa-check-circle fa-lg"></i> <font size="3">{{ Session::get('message') }} </font>
</div>
   @endif
   @if(Session::has('error'))
      <div class="alert    alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <i class="fa fa-exclamation-circle fa-lg"></i> <font size="3">{{ Session::get('error') }} </font>
</div>
   @endif

 


   
    @yield('conten')
    
      
 </div>
</div>
</div>
</div>
<script language="JavaScript" type="text/JavaScript">
        function doPrint() {
         
         
       bdhtml=window.document.body.innerHTML;
           
        sprnstr="<!--startprint-->";
        eprnstr="<!--endprint-->";
        prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);
        prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));
        window.document.body.innerHTML=prnhtml;
        window.document.close();
        window.print();
         window.focus();
         window.close();
        }
</script>

<script language="javascript">
function CallPrint(strid)
{
 var prtContent = document.getElementById(strid);
 var WinPrint = window.open("");
 WinPrint.document.write(prtContent.innerHTML);
 WinPrint.document.close();
 WinPrint.focus();
 WinPrint.print();
 WinPrint.close();
 prtContent.innerHTML=strOldOne;
}
</script>   

<script>
    $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
     

     });

    </script>
    <script type="text/javascript">
     var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"},
      '.chosen-select-no'        : {disable_search_threshold:10,allow_single_deselect:true}

    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
    


  </script>
  <script type="text/javascript">
   $(document).ready(function () {
   $('#datetimepicker2').datetimepicker({
     locale: 'fr',
     viewMode: 'years',
     format: 'DD/MM/YYYY'
     });
     });









$(document).ready(function() {
  $('a[data-confirm]').click(function(ev) {
    var href = $(this).attr('href');
    
    if (!$('#dataConfirmModal').length) {
      $('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Merci de confirmer</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
    }
    $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
    $('#dataConfirmOK').attr('href', href);
    $('#dataConfirmModal').modal({show:true});
    
    return false;
  });

 $(function () { $("[data-toggle='popover']").popover({html : true }); });


});






  </script>

 <script type="text/javascript">
  function imprimer () {
    window.print();
  }

  </script>  





</div>
</div>
 <div class="row">
   <div class="col-md-8 col-md-offset-2">
<i>Stage+</i>&nbsp;© 2014 - 2015 

<em class="pull-right">
  Developed by Anis KCHAOU  <br>
  contact : kchaouanis26@gmail.com <br>
</em>

</div>
</div>

</body>
</html>
