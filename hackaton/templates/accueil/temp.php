{% extends 'base.html.twig' %}

{% block title %}Hackathons
{% endblock %}
{% block body %}
	<link rel="stylesheet" href="{{asset('style.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="icon" type="image/x-icon" href="{{asset('images/logo.png')}}">
	<input type="checkbox" id="active">
	<label for="active" class="menu-btn">
		<span></span>
	</label>
	<label for="active" class="close"></label>
	<div class="wrapper">
		<ul>
			<li><a href="/">Accueil</a></li>
			<li><a href="/presentation">Presentation</a></li>
			<li><a href="/hackathon">Hackathons</a></li>
			<div class="alignement" style="display: table;">
			<li style="padding-left:200px"><a href="/deconnexion"><img src="{{asset('images/deconnexion.png')}}" style="width:50px"></a></li>
			<li><a href="/connexion"><img src="{{asset('images/connexion.png')}}" style="width:50px"></a></li>
			</div>
		</ul>
	</div>
<div style="z-index: -1;position: absolute;">

<h1>Il existe {{ lesHackathons|length() }} Hackathons.</h1>
<input id="searchbar" onkeyup="search_hackathons()" type="text"
        name="search" placeholder="Rechercher un hackathons" style="font-size: 16px;
    line-height: 28px;
    padding: 8px 16px;
    width: 100%;
    min-height: 44px;
    border: unset;
    border-radius: 4px;
    outline-color: rgb(84 105 212 / 0.5);
    background-color: rgb(255, 255, 255);
    box-shadow: rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(60 66 87 / 16%) 0px 0px 0px 1px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 0%) 0px 0px 0px 0px;">

</br></br>
<div class="row">
   {% for hackathon in lesHackathons %}
   <div class="col col-md-3">
   <div class="card" style="margin: 0px auto;
    width: 100%;
    max-width: 448px;
    background: white;
    border-radius: 4px;
	border:none;">
   <ol style="list-style: none" class="ok">
     <div class="col-12">
	 			<div class="hackathon" style="padding: 20px;">
				<li><a href="{{path('app_detailhackathon', {'id' : hackathon.ID}) }}"><img src={{ hackathon.IMAGE }} alt="Aucune image" style="width: 100%"/></a></li></br>
				<li>Thème: {{ hackathon.THEME }}</li></br>
				<li>Ville: {{ hackathon.VILLE }}</li></br>
				<li>Rue: {{ hackathon.RUE }}</li></br>
				<li class="date">Du: {{ hackathon.DATEDEBUT|date('d/m/Y') }}</li></br>
				<li>Au: {{ hackathon.DATEFIN|date('d/m/Y') }}</li></br>
				<li>Places: {{ hackathon.NBPLACES }}</li></br>
				<a href="{{path('app_inscriptionhackathon', {'id' : hackathon.ID}) }}" style="decoration:none"><button style="font-size: 16px;
    line-height: 28px;
    padding: 8px 16px;
    width: 100%;
    min-height: 44px;
    border: unset;
    border-radius: 4px;
    outline-color: rgb(84 105 212 / 0.5);
    background-color: rgb(255, 255, 255);
    box-shadow: rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(60 66 87 / 16%) 0px 0px 0px 1px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 0%) 0px 0px 0px 0px;">S'enregistrer à ce Hackathon</button></a>
				</div>
	</div>
	</ol>
    </br>
	</div>
    {% endfor %} 
</div>
<script>
function search_hackathons() {
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('hackathon');
    let y = document.getElementsByClassName('card');
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="list-item";         
        }
    }
}
</script>

</div>{% endblock %}
